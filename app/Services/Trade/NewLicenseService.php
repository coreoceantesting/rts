<?php

namespace App\Services\Trade;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use App\Models\Trade\TradeNewLicensePermission;
use App\Models\ServiceCredential;
use App\Services\CurlAPiService;
use App\Services\AapaleSarkarLoginCheckService;

class NewLicenseService
{
    protected $curlAPiService;
    protected $aapaleSarkarLoginCheckService;

    public function __construct(CurlAPiService $curlAPiService, AapaleSarkarLoginCheckService $aapaleSarkarLoginCheckService)
    {
        $this->curlAPiService = $curlAPiService;
        $this->aapaleSarkarLoginCheckService = $aapaleSarkarLoginCheckService;
    }

    public function store($request)
    {
        DB::beginTransaction();

        try {
            $request['user_id'] = Auth::user()->id;
            $request['service_id'] = "28";
            // Handle file uploads and store original file names
            if ($request->hasFile('application_documents')) {
                $request['application_document'] = $request->application_documents->store('trade/new-license');
            }
            if ($request->hasFile('no_dues_documents')) {
                $request['no_dues_document'] = $request->no_dues_documents->store('trade/new-license');
            }
            $tradeNewLicensePermission = TradeNewLicensePermission::create($request->all());

            // code to send data to department
            if ($request->hasFile('application_documents')) {
                $request['application_document'] = $this->curlAPiService->convertFileInBase64($request->file('application_documents'));
            } else {
                $request['application_document'] = "";
            }
            if ($request->hasFile('no_dues_documents')) {
                $request['no_dues_document'] = $this->curlAPiService->convertFileInBase64($request->file('no_dues_documents'));
            } else {
                $request['no_dues_document'] = "";
            }
            $request['user_id'] = (Auth::user()->user_id && Auth::user()->user_id != "") ? Auth::user()->user_id : Auth::user()->id;
            $newData = $request->except(['_token', 'application_documents', 'no_dues_documents']);
            $data = $this->curlAPiService->sendPostRequestInObject($newData, config('rtsapiurl.trade') . 'SHELMicroService/SHELApi/ApleSarkarService/AddForTradeLicensePermission', '');

            // Decode JSON string to PHP array
            $data = json_decode($data, true);
            if ($data['status'] == "200") {
                // Access the application_no
                $applicationId = $data['applicationId'];
                TradeNewLicensePermission::where('id', $tradeNewLicensePermission->id)->update([
                    'application_no' => $applicationId
                ]);

                if (Auth::user()->is_aapale_sarkar_user) {
                    $aapaleSarkarCredential = ServiceCredential::where('dept_service_id', $request->service_id)->first();
                    $send = $this->aapaleSarkarLoginCheckService->encryptAndSendRequestToAapaleSarkar(Auth::user()->trackid, $aapaleSarkarCredential->client_code, Auth::user()->user_id, $aapaleSarkarCredential->service_id, $applicationId, 'N', 'NA', 'N', 'NA', "20", date('Y-m-d', strtotime("+$aapaleSarkarCredential->service_day days")), 23.60, 1, 2, 'Payment Pending', $aapaleSarkarCredential->ulb_id, $aapaleSarkarCredential->ulb_district, 'NA', 'NA', 'NA', $aapaleSarkarCredential->check_sum_key, $aapaleSarkarCredential->str_key, $aapaleSarkarCredential->str_iv, $aapaleSarkarCredential->soap_end_point_url, $aapaleSarkarCredential->soap_action_app_status_url);

                    if (!$send) {
                        return false;
                    }
                }
            } else {
                DB::rollback();
                return false;
            }
            // end of code to send data to department

            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollback();
            Log::error('Error in store method: ' . $e->getMessage());
            return false;
        }
    }


    public function edit($id)
    {
        return TradeNewLicensePermission::find($id);
    }

    public function update($request, $id)
    {
        DB::beginTransaction();
        try {
            // Find the existing record
            $tradeNewLicensePermission = TradeNewLicensePermission::findOrFail($id);
            // Handle file uploads and update original file names
            if ($request->hasFile('application_documents')) {
                if ($tradeNewLicensePermission && Storage::exists($tradeNewLicensePermission->application_document)) {
                    Storage::delete($tradeNewLicensePermission->application_document);
                }
                $request['application_document'] = $request->application_documents->store('trade/new-license');
            }
            if ($request->hasFile('no_dues_documents')) {
                if ($tradeNewLicensePermission && Storage::exists($tradeNewLicensePermission->no_dues_document)) {
                    Storage::delete($tradeNewLicensePermission->no_dues_document);
                }
                $request['no_dues_document'] = $request->no_dues_documents->store('trade/new-license');
            }
            $tradeNewLicensePermission->update($request->all());

            // code to send data to department
            if ($request->hasFile('application_documents')) {
                $request['application_document'] = $this->curlAPiService->convertFileInBase64($request->file('application_documents'));
            } else {
                $request['application_document'] = "";
            }
            if ($request->hasFile('no_dues_documents')) {
                $request['no_dues_document'] = $this->curlAPiService->convertFileInBase64($request->file('no_dues_documents'));
            } else {
                $request['no_dues_document'] = "";
            }
            $request['application_no'] = $tradeNewLicensePermission->application_no;
            $request['user_id'] = (Auth::user()->user_id && Auth::user()->user_id != "") ? Auth::user()->user_id : Auth::user()->id;
            $newData = $request->except(['_token', 'id', 'application_documents', 'no_dues_documents']);
            $data = $this->curlAPiService->sendPostRequestInObject($newData, config('rtsapiurl.trade') . 'SHELMicroService/SHELApi/ApleSarkarService/UpdateForTradeLicensePermission', '');

            // Decode JSON string to PHP array
            $data = json_decode($data, true);

            if ($data['status'] == "200") {
                // Access the application_no
                DB::commit();
                return true;
            } else {
                DB::rollback();
                return false;
            }
            // end of code to send data to department
        } catch (\Exception $e) {
            DB::rollback();
            Log::info($e);
            return false;
        }
    }
}