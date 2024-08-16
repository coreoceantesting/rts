<?php

namespace App\Services\Trade;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use App\Models\WaterDepartment\WaterRenewalOfPlumber;
use App\Models\ServiceCredential;
use App\Services\CurlAPiService;
use App\Services\AapaleSarkarLoginCheckService;

class RenewalPlumberService
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
            $request['service_id'] = "29";
            // Handle file uploads and store original file names
            if ($request->hasFile('application_documents')) {
                $request['application_document'] = $request->application_documents->store('water-department/renewal-plumber');
            }
            if ($request->hasFile('nodues_documents')) {
                $request['nodues_document'] = $request->nodues_documents->store('water-department/renewal-plumber');
            }
            if ($request->hasFile('educational_certificate_documents')) {
                $request['educational_certificate_document'] = $request->educational_certificate_documents->store('water-department/renewal-plumber');
            }
            $waterRenewalOfPlumber = WaterRenewalOfPlumber::create($request->all());


            // code to send data to department
            if ($request->hasFile('application_documents')) {
                $request['application_document'] = $this->curlAPiService->convertFileInBase64($request->file('application_documents'));
            } else {
                $request['application_document'] = "";
            }
            if ($request->hasFile('nodues_documents')) {
                $request['nodues_document'] = $this->curlAPiService->convertFileInBase64($request->file('nodues_documents'));
            } else {
                $request['nodues_document'] = "";
            }
            if ($request->hasFile('educational_certificate_documents')) {
                $request['educational_certificate_document'] = $this->curlAPiService->convertFileInBase64($request->file('educational_certificate_documents'));
            } else {
                $request['educational_certificate_document'] = "";
            }
            $request['user_id'] = (Auth::user()->user_id && Auth::user()->user_id != "") ? Auth::user()->user_id : Auth::user()->id;
            $newData = $request->except(['_token', 'application_documents', 'nodues_documents', 'educational_certificate_documents']);
            $data = $this->curlAPiService->sendPostRequestInObject($newData, config('rtsapiurl.trade') . 'SHELMicroService/SHELApi/ApleSarkarService/AddForRenewTradeLicensePermission ', '');

            // Decode JSON string to PHP array
            $data = json_decode($data, true);
            if ($data['status'] == "200") {
                // Access the application_no
                $applicationId = $data['applicationId'];
                WaterRenewalOfPlumber::where('id', $waterRenewalOfPlumber->id)->update([
                    'application_no' => $applicationId
                ]);

                if (Auth::user()->is_aapale_sarkar_user) {
                    $aapaleSarkarCredential = ServiceCredential::where('dept_service_id', $request->service_id)->first();
                    $send = $this->aapaleSarkarLoginCheckService->encryptAndSendRequestToAapaleSarkar(Auth::user()->trackid, $aapaleSarkarCredential->client_code, Auth::user()->user_id, $aapaleSarkarCredential->service_id, $applicationId, 'N', 'NA', 'N', 'NA', "20", date('Y-m-d', strtotime("+$aapaleSarkarCredential->service_day days")), config('rtsapiurl.amount'), config('rtsapiurl.requestFlag'),  config('rtsapiurl.applicationStatus'), 'Payment Pending', $aapaleSarkarCredential->ulb_id, $aapaleSarkarCredential->ulb_district, 'NA', 'NA', 'NA', $aapaleSarkarCredential->check_sum_key, $aapaleSarkarCredential->str_key, $aapaleSarkarCredential->str_iv, $aapaleSarkarCredential->soap_end_point_url, $aapaleSarkarCredential->soap_action_app_status_url);

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
        return WaterRenewalOfPlumber::find($id);
    }

    public function update($request, $id)
    {
        DB::beginTransaction();
        try {
            // Find the existing record
            $waterRenewalOfPlumber = WaterRenewalOfPlumber::findOrFail($id);
            // Handle file uploads and update original file names
            if ($request->hasFile('application_documents')) {
                if ($waterRenewalOfPlumber && Storage::exists($waterRenewalOfPlumber->application_document)) {
                    Storage::delete($waterRenewalOfPlumber->application_document);
                }
                $request['application_document'] = $request->application_documents->store('water-department/renewal-plumber');
            }
            if ($request->hasFile('nodues_documents')) {
                if ($waterRenewalOfPlumber && Storage::exists($waterRenewalOfPlumber->nodues_document)) {
                    Storage::delete($waterRenewalOfPlumber->nodues_document);
                }
                $request['nodues_document'] = $request->nodues_documents->store('water-department/renewal-plumber');
            }
            if ($request->hasFile('educational_certificate_documents')) {
                if ($waterRenewalOfPlumber && Storage::exists($waterRenewalOfPlumber->educational_certificate_document)) {
                    Storage::delete($waterRenewalOfPlumber->educational_certificate_document);
                }
                $request['educational_certificate_document'] = $request->educational_certificate_documents->store('water-department/renewal-plumber');
            }
            $waterRenewalOfPlumber->update($request->all());


            // code to send data to department
            if ($request->hasFile('application_documents')) {
                $request['application_document'] = $this->curlAPiService->convertFileInBase64($request->file('application_documents'));
            } else {
                $request['application_document'] = "";
            }
            if ($request->hasFile('nodues_documents')) {
                $request['nodues_document'] = $this->curlAPiService->convertFileInBase64($request->file('nodues_documents'));
            } else {
                $request['nodues_document'] = "";
            }
            if ($request->hasFile('educational_certificate_documents')) {
                $request['educational_certificate_document'] = $this->curlAPiService->convertFileInBase64($request->file('educational_certificate_documents'));
            } else {
                $request['educational_certificate_document'] = "";
            }
            $request['application_no'] = $waterRenewalOfPlumber->application_no;
            $request['user_id'] = (Auth::user()->user_id && Auth::user()->user_id != "") ? Auth::user()->user_id : Auth::user()->id;
            $newData = $request->except(['_token', 'id', 'application_documents', 'nodues_documents', 'educational_certificate_documents']);
            $data = $this->curlAPiService->sendPostRequestInObject($newData, config('rtsapiurl.trade') . 'SHELMicroService/SHELApi/ApleSarkarService/UpdateForRenewTradeLicensePermission', '');

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
