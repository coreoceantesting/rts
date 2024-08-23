<?php

namespace App\Services\Trade;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use App\Models\Trade\TradeChangeLicenseName;
use App\Models\ServiceCredential;
use App\Services\CurlAPiService;
use App\Services\AapaleSarkarLoginCheckService;

class ChangeLicenseNameService
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
            $request['service_id'] = "34";
            // Handle file uploads and store original file names
            if ($request->hasFile('no_dues_documents')) {
                $request['no_dues_document'] = $request->no_dues_documents->store('trade/change-license-name');
            }
            if ($request->hasFile('application_documents')) {
                $request['application_document'] = $request->application_documents->store('trade/change-license-name');
            }
            $tradeChangeLicenseName = TradeChangeLicenseName::create($request->all());

            // code to send data to department
            if ($request->hasFile('no_dues_documents')) {
                $request['no_dues_document'] = $this->curlAPiService->convertFileInBase64($request->file('no_dues_documents'));
            } else {
                $request['no_dues_document'] = "";
            }
            if ($request->hasFile('application_documents')) {
                $request['application_document'] = $this->curlAPiService->convertFileInBase64($request->file('application_documents'));
            } else {
                $request['application_document'] = "";
            }
            $request['user_id'] = (Auth::user()->user_id && Auth::user()->user_id != "") ? Auth::user()->user_id : Auth::user()->id;
            $newData = $request->except(['_token', 'no_dues_documents', 'application_documents']);
            $data = $this->curlAPiService->sendPostRequestInObject($newData, config('rtsapiurl.trade') . 'SHELMicroService/SHELApi/ApleSarkarService/AddLicenseNameChangeFORPMC', '');

            // Decode JSON string to PHP array
            $data = json_decode($data, true);
            if ($data['status'] == "200") {
                // Access the application_no
                $applicationId = $data['applicationId'];
                TradeChangeLicenseName::where('id', $tradeChangeLicenseName->id)->update([
                    'application_no' => $applicationId
                ]);

                if (Auth::user()->is_aapale_sarkar_user) {
                    $aapaleSarkarCredential = ServiceCredential::where('dept_service_id', $request->service_id)->first();
                    $serviceDay = ($aapaleSarkarCredential->service_day) ? $aapaleSarkarCredential->service_day : 20;

                    $send = $this->aapaleSarkarLoginCheckService->encryptAndSendRequestToAapaleSarkar(Auth::user()->trackid, $aapaleSarkarCredential->client_code, Auth::user()->user_id, $aapaleSarkarCredential->service_id, $applicationId, 'N', 'NA', 'N', 'NA', $serviceDay, date('Y-m-d', strtotime("+$serviceDay days")), config('rtsapiurl.amount'), config('rtsapiurl.requestFlag'), config('rtsapiurl.applicationStatus'), config('rtsapiurl.applicationPendingStatusTxt'), $aapaleSarkarCredential->ulb_id, $aapaleSarkarCredential->ulb_district, 'NA', 'NA', 'NA', $aapaleSarkarCredential->check_sum_key, $aapaleSarkarCredential->str_key, $aapaleSarkarCredential->str_iv, $aapaleSarkarCredential->soap_end_point_url, $aapaleSarkarCredential->soap_action_app_status_url);

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
        return TradeChangeLicenseName::find($id);
    }

    public function update($request, $id)
    {
        DB::beginTransaction();
        try {
            // Find the existing record
            $tradeChangeLicenseName = TradeChangeLicenseName::findOrFail($id);
            // Handle file uploads and update original file names
            if ($request->hasFile('no_dues_documents')) {
                if ($tradeChangeLicenseName && Storage::exists($tradeChangeLicenseName->no_dues_document)) {
                    Storage::delete($tradeChangeLicenseName->no_dues_document);
                }
                $request['no_dues_document'] = $request->no_dues_documents->store('trade/change-license-name');
            }
            if ($request->hasFile('application_documents')) {
                if ($tradeChangeLicenseName && Storage::exists($tradeChangeLicenseName->application_document)) {
                    Storage::delete($tradeChangeLicenseName->application_document);
                }
                $request['application_document'] = $request->application_documents->store('trade/change-license-name');
            }
            $tradeChangeLicenseName->update($request->all());


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
            $request['application_no'] = $tradeChangeLicenseName->application_no;
            $request['user_id'] = (Auth::user()->user_id && Auth::user()->user_id != "") ? Auth::user()->user_id : Auth::user()->id;
            $newData = $request->except(['_token', 'id', 'application_documents', 'no_dues_documents']);
            $data = $this->curlAPiService->sendPostRequestInObject($newData, config('rtsapiurl.trade') . 'SHELMicroService/SHELApi/ApleSarkarService/UpdateLicenseNameChangeFORPMC', '');

            // Decode JSON string to PHP array
            $data = json_decode($data, true);

            if ($data['Status'] == "200") {
                // Access the application_no
                DB::commit();
                return true;
            } else {
                DB::rollback();
                return false;
            }
            // end of code to send data to department

            // Commit the transaction
            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollback();
            Log::info($e);
            return false;
        }
    }
}
