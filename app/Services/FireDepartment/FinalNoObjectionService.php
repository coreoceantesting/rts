<?php

namespace App\Services\FireDepartment;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use App\Models\FireDepartment\FireFinalNoObjection;
use App\Models\ServiceCredential;
use App\Services\CurlAPiService;
use App\Services\AapaleSarkarLoginCheckService;

class FinalNoObjectionService
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
            $request['service_id'] = "184";
            // Handle file uploads and store original file names
            if ($request->hasFile('uploaded_applications')) {
                $request['uploaded_application'] = $request->uploaded_applications->store('FireDepartment/FinalNoObjection');
            }
            if ($request->hasFile('no_dues_documents')) {
                $request['no_dues_document'] = $request->no_dues_documents->store('FireDepartment/FinalNoObjection');
            }
            if ($request->hasFile('architect_application_documents')) {
                $request['architect_application_document'] = $request->architect_application_documents->store('FireDepartment/FinalNoObjection');
            }
            if ($request->hasFile('erection_of_fire_documents')) {
                $request['erection_of_fire_document'] = $request->erection_of_fire_documents->store('FireDepartment/FinalNoObjection');
            }
            if ($request->hasFile('licensing_agency_documents')) {
                $request['licensing_agency_document'] = $request->licensing_agency_documents->store('FireDepartment/FinalNoObjection');
            }
            if ($request->hasFile('guarantee_of_developer_documents')) {
                $request['guarantee_of_developer_document'] = $request->guarantee_of_developer_documents->store('FireDepartment/FinalNoObjection');
            }
            $fireFinalNoObjection = FireFinalNoObjection::create($request->all());

            $applicationId = "PMCFR-" . time();
            FireFinalNoObjection::where('id', $fireFinalNoObjection->id)->update([
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
            //     DB::rollback();
            //     return false;
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
        return FireFinalNoObjection::find($id);
    }

    public function update($request, $id)
    {
        DB::beginTransaction();
        try {
            // Find the existing record
            $fireFinalNoObjection = FireFinalNoObjection::findOrFail($id);
            // Handle file uploads and update original file names
            if ($request->hasFile('uploaded_applications')) {
                if ($fireFinalNoObjection && Storage::exists($fireFinalNoObjection->uploaded_application)) {
                    Storage::delete($fireFinalNoObjection->uploaded_application);
                }
                $request['uploaded_application'] = $request->uploaded_applications->store('FireDepartment/FinalNoObjection');
            }
            if ($request->hasFile('no_dues_documents')) {
                if ($fireFinalNoObjection && Storage::exists($fireFinalNoObjection->no_dues_document)) {
                    Storage::delete($fireFinalNoObjection->no_dues_document);
                }
                $request['no_dues_document'] = $request->no_dues_documents->store('FireDepartment/FinalNoObjection');
            }
            if ($request->hasFile('architect_application_documents')) {
                if ($fireFinalNoObjection && Storage::exists($fireFinalNoObjection->architect_application_document)) {
                    Storage::delete($fireFinalNoObjection->architect_application_document);
                }
                $request['architect_application_document'] = $request->architect_application_documents->store('FireDepartment/FinalNoObjection');
            }
            if ($request->hasFile('erection_of_fire_documents')) {
                if ($fireFinalNoObjection && Storage::exists($fireFinalNoObjection->erection_of_fire_document)) {
                    Storage::delete($fireFinalNoObjection->erection_of_fire_document);
                }
                $request['erection_of_fire_document'] = $request->erection_of_fire_documents->store('FireDepartment/FinalNoObjection');
            }
            if ($request->hasFile('licensing_agency_documents')) {
                if ($fireFinalNoObjection && Storage::exists($fireFinalNoObjection->licensing_agency_document)) {
                    Storage::delete($fireFinalNoObjection->licensing_agency_document);
                }
                $request['licensing_agency_document'] = $request->licensing_agency_documents->store('FireDepartment/FinalNoObjection');
            }
            if ($request->hasFile('guarantee_of_developer_documents')) {
                if ($fireFinalNoObjection && Storage::exists($fireFinalNoObjection->guarantee_of_developer_document)) {
                    Storage::delete($fireFinalNoObjection->guarantee_of_developer_document);
                }
                $request['guarantee_of_developer_document'] = $request->guarantee_of_developer_documents->store('FireDepartment/FinalNoObjection');
            }
            $fireFinalNoObjection->update($request->all());

            // Access the application_no
            DB::commit();
            return true;

            // end of code to send data to department
        } catch (\Exception $e) {
            DB::rollback();
            Log::info($e);
            return false;
        }
    }
}
