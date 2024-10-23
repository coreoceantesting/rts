<?php

namespace App\Services\FireDepartment;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use App\Models\FireDepartment\FireNoObjection;
use App\Models\ServiceCredential;
use App\Services\CurlAPiService;
use App\Services\AapaleSarkarLoginCheckService;

class NoObjectionService
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
            $request['service_id'] = "183";
            // Handle file uploads and store original file names
            if ($request->hasFile('uploaded_applications')) {
                $request['uploaded_application'] = $request->uploaded_applications->store('fire-department/no-objection');
            }
            if ($request->hasFile('no_dues_documents')) {
                $request['no_dues_document'] = $request->no_dues_documents->store('fire-department/no-objection');
            }
            if ($request->hasFile('architect_application_documents')) {
                $request['architect_application_document'] = $request->architect_application_documents->store('fire-department/no-objection');
            }
            if ($request->hasFile('fire_prevention_documents')) {
                $request['fire_prevention_document'] = $request->fire_prevention_documents->store('fire-department/no-objection');
            }
            if ($request->hasFile('capitation_fee_documents')) {
                $request['capitation_fee_document'] = $request->capitation_fee_documents->store('fire-department/no-objection');
            }
            $fireNoObjection = FireNoObjection::create($request->all());



            // code to send data to department
            // if ($request->hasFile('uploaded_applications')) {
            //     $request['uploaded_application'] = $this->curlAPiService->convertFileInBase64($request->file('uploaded_applications'));
            // } else {
            //     $request['uploaded_application'] = "";
            // }
            // if ($request->hasFile('no_dues_documents')) {
            //     $request['no_dues_document'] = $this->curlAPiService->convertFileInBase64($request->file('no_dues_documents'));
            // } else {
            //     $request['no_dues_document'] = "";
            // }
            // if ($request->hasFile('architect_application_documents')) {
            //     $request['architect_application_document'] = $this->curlAPiService->convertFileInBase64($request->file('architect_application_documents'));
            // } else {
            //     $request['architect_application_document'] = "";
            // }
            // if ($request->hasFile('fire_prevention_documents')) {
            //     $request['fire_prevention_document'] = $this->curlAPiService->convertFileInBase64($request->file('fire_prevention_documents'));
            // } else {
            //     $request['fire_prevention_document'] = "";
            // }
            // if ($request->hasFile('capitation_fee_documents')) {
            //     $request['capitation_fee_document'] = $this->curlAPiService->convertFileInBase64($request->file('capitation_fee_documents'));
            // } else {
            //     $request['capitation_fee_document'] = "";
            // }
            // $request['user_id'] = (Auth::user()->user_id && Auth::user()->user_id != "") ? Auth::user()->user_id : Auth::user()->id;
            // $newData = $request->except(['_token', 'uploaded_applications', 'no_dues_documents', 'architect_application_documents', 'fire_prevention_documents', 'capitation_fee_documents']);
            // $data = $this->curlAPiService->sendPostRequestInObject($newData, config('rtsapiurl.water') . 'AapaleSarkarAPI/NewTaxation.asmx/RequestForNewTaxation', 'NewTaxation');

            // // Decode JSON string to PHP array
            // $data = json_decode($data, true);
            // if ($data['d']['Status'] == "200") {
            // Access the application_no
            // $applicationId = $data['d']['application_no'];
            $applicationId = "PMCFR-" . time();
            FireNoObjection::where('id', $fireNoObjection->id)->update([
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
            // } else {
            // DB::rollback();
            // return false;
            // }
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
        return FireNoObjection::find($id);
    }

    public function update($request, $id)
    {
        DB::beginTransaction();

        try {
            // Find the existing record
            $fireNoObjection = FireNoObjection::findOrFail($id);
            // Handle file uploads and update original file names
            if ($request->hasFile('uploaded_applications')) {
                if ($fireNoObjection && Storage::exists($fireNoObjection->uploaded_application)) {
                    Storage::delete($fireNoObjection->uploaded_application);
                }
                $request['uploaded_application'] = $request->uploaded_applications->store('fire-department/no-objection');
            }
            if ($request->hasFile('no_dues_documents')) {
                if ($fireNoObjection && Storage::exists($fireNoObjection->no_dues_document)) {
                    Storage::delete($fireNoObjection->no_dues_document);
                }
                $request['no_dues_document'] = $request->no_dues_documents->store('fire-department/no-objection');
            }
            if ($request->hasFile('architect_application_documents')) {
                if ($fireNoObjection && Storage::exists($fireNoObjection->architect_application_document)) {
                    Storage::delete($fireNoObjection->architect_application_document);
                }
                $request['architect_application_document'] = $request->architect_application_documents->store('fire-department/no-objection');
            }
            if ($request->hasFile('fire_prevention_documents')) {
                if ($fireNoObjection && Storage::exists($fireNoObjection->fire_prevention_document)) {
                    Storage::delete($fireNoObjection->fire_prevention_document);
                }
                $request['fire_prevention_document'] = $request->fire_prevention_documents->store('fire-department/no-objection');
            }
            if ($request->hasFile('capitation_fee_documents')) {
                if ($fireNoObjection && Storage::exists($fireNoObjection->capitation_fee_document)) {
                    Storage::delete($fireNoObjection->capitation_fee_document);
                }
                $request['capitation_fee_document'] = $request->capitation_fee_documents->store('fire-department/no-objection');
            }
            $fireNoObjection->update($request->all());



            // code to send data to department
            // if ($request->hasFile('uploaded_applications')) {
            //     $request['uploaded_application'] = $this->curlAPiService->convertFileInBase64($request->file('uploaded_applications'));
            // } else {
            //     $request['uploaded_application'] = "";
            // }
            // if ($request->hasFile('no_dues_documents')) {
            //     $request['no_dues_document'] = $this->curlAPiService->convertFileInBase64($request->file('no_dues_documents'));
            // } else {
            //     $request['no_dues_document'] = "";
            // }
            // if ($request->hasFile('architect_application_documents')) {
            //     $request['architect_application_document'] = $this->curlAPiService->convertFileInBase64($request->file('architect_application_documents'));
            // } else {
            //     $request['architect_application_document'] = "";
            // }
            // if ($request->hasFile('fire_prevention_documents')) {
            //     $request['fire_prevention_document'] = $this->curlAPiService->convertFileInBase64($request->file('fire_prevention_documents'));
            // } else {
            //     $request['fire_prevention_document'] = "";
            // }
            // if ($request->hasFile('capitation_fee_documents')) {
            //     $request['capitation_fee_document'] = $this->curlAPiService->convertFileInBase64($request->file('capitation_fee_documents'));
            // } else {
            //     $request['capitation_fee_document'] = "";
            // }
            // $request['application_no'] = $fireNoObjection->application_no;
            // $request['user_id'] = (Auth::user()->user_id && Auth::user()->user_id != "") ? Auth::user()->user_id : Auth::user()->id;
            // $newData = $request->except(['_token', 'id', 'application_documents', 'nodues_documents']);
            // $data = $this->curlAPiService->sendPostRequestInObject($newData, config('rtsapiurl.water') . 'AapaleSarkarAPI/NewTaxation.asmx/RequestForUpdateNewTaxation', 'NewTaxation');

            // Decode JSON string to PHP array
            // $data = json_decode($data, true);

            // if ($data['d']['Status'] == "200") {
            // Access the application_no
            DB::commit();
            return true;
            // } else {
            //     DB::rollback();
            //     return false;
            // }
            // end of code to send data to department
        } catch (\Exception $e) {
            DB::rollback();
            Log::info($e);
            return false;
        }
    }
}
