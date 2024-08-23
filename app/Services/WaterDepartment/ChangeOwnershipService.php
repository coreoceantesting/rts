<?php

namespace App\Services\WaterDepartment;

use App\Models\WaterDepartment\WaterChangeOwnership;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use App\Models\ServiceCredential;
use App\Services\CurlAPiService;
use App\Services\AapaleSarkarLoginCheckService;

class ChangeOwnershipService
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
            $request['service_id'] = "23";
            // Handle file uploads and store original file names
            if ($request->hasFile('application_documents')) {
                $request['application_document'] = $request->application_documents->store('WaterDepartment/ChangeOwnership');
            }
            if ($request->hasFile('ownership_documents')) {
                $request['ownership_document'] = $request->ownership_documents->store('WaterDepartment/ChangeOwnership');
            }
            if ($request->hasFile('nodues_documents')) {
                $request['nodues_document'] = $request->nodues_documents->store('WaterDepartment/ChangeOwnership');
            }
            $waterChangeOwnership = WaterChangeOwnership::create($request->all());


            // code to send data to department
            if ($request->hasFile('application_documents')) {
                $request['application_document'] = $this->curlAPiService->convertFileInBase64($request->file('application_documents'));
            } else {
                $request['application_document'] = "";
            }
            if ($request->hasFile('ownership_documents')) {
                $request['ownership_document'] = $this->curlAPiService->convertFileInBase64($request->file('ownership_documents'));
            } else {
                $request['ownership_document'] = "";
            }
            if ($request->hasFile('nodues_documents')) {
                $request['nodues_document'] = $this->curlAPiService->convertFileInBase64($request->file('nodues_documents'));
            } else {
                $request['nodues_document'] = "";
            }
            $request['user_id'] = (Auth::user()->user_id && Auth::user()->user_id != "") ? Auth::user()->user_id : Auth::user()->id;
            $newData = $request->except(['_token', 'application_documents', 'ownership_documents', 'nodues_documents']);
            $data = $this->curlAPiService->sendPostRequestInObject($newData, config('rtsapiurl.water') . 'WaterBillMicroService/WaterbillApi/ApleSarkarService/RequestForChangeInOwnerShip', '');

            // Decode JSON string to PHP array
            $data = json_decode($data, true);
            if ($data['status'] == "200") {
                // Access the application_no
                $applicationId = $data['applicationId'];
                WaterChangeOwnership::where('id', $waterChangeOwnership->id)->update([
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
        return WaterChangeOwnership::find($id);
    }

    public function update($request, $id)
    {
        DB::beginTransaction();
        try {
            // Find the existing record
            $waterChangeOwnership = WaterChangeOwnership::findOrFail($id);
            // Handle file uploads and update original file names
            if ($request->hasFile('application_documents')) {
                if ($waterChangeOwnership && Storage::exists($waterChangeOwnership->application_document)) {
                    Storage::delete($waterChangeOwnership->application_document);
                }
                $request['application_document'] = $request->application_documents->store('WaterDepartment/ChangeOwnership');
            }
            if ($request->hasFile('ownership_documents')) {
                if ($waterChangeOwnership && Storage::exists($waterChangeOwnership->ownership_document)) {
                    Storage::delete($waterChangeOwnership->ownership_document);
                }
                $request['ownership_document'] = $request->ownership_documents->store('WaterDepartment/ChangeOwnership');
            }
            if ($request->hasFile('nodues_documents')) {
                if ($waterChangeOwnership && Storage::exists($waterChangeOwnership->nodues_document)) {
                    Storage::delete($waterChangeOwnership->nodues_document);
                }
                $request['nodues_document'] = $request->nodues_documents->store('WaterDepartment/ChangeOwnership');
            }
            // Update the rest of the fields
            $waterChangeOwnership->update($request->all());


            // code to send data to department
            if ($request->hasFile('nodues_documents')) {
                $request['nodues_document'] = $this->curlAPiService->convertFileInBase64($request->file('nodues_documents'));
            } else {
                $request['nodues_document'] = "";
            }
            if ($request->hasFile('ownership_documents')) {
                $request['ownership_document'] = $this->curlAPiService->convertFileInBase64($request->file('ownership_documents'));
            } else {
                $request['ownership_document'] = "";
            }
            if ($request->hasFile('nodues_documents')) {
                $request['nodues_document'] = $this->curlAPiService->convertFileInBase64($request->file('nodues_documents'));
            } else {
                $request['nodues_document'] = "";
            }
            $request['application_no'] = $waterChangeOwnership->application_no;
            $request['user_id'] = (Auth::user()->user_id && Auth::user()->user_id != "") ? Auth::user()->user_id : Auth::user()->id;
            $newData = $request->except(['_token', 'id', 'application_documents', 'ownership_documents', 'nodues_documents']);
            $data = $this->curlAPiService->sendPostRequestInObject($newData, config('rtsapiurl.water') . 'WaterBillMicroService/WaterbillApi/ApleSarkarService/RequestForUpdateChangeInOwnership', '');

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
