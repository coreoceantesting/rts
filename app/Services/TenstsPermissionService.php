<?php

namespace App\Services;

use App\Services\AapaleSarkarLoginCheckService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use App\Models\TentsPermission;
use App\Models\ServiceCredential;

class TenstsPermissionService
{
    protected $aapaleSarkarLoginCheckService;

    public function __construct(AapaleSarkarLoginCheckService $aapaleSarkarLoginCheckService)
    {
        $this->aapaleSarkarLoginCheckService = $aapaleSarkarLoginCheckService;
    }



    public function store($request)
    {
        // DB::beginTransaction();
        // try {
        //     $request['user_id'] = Auth::user()->id;
        //     $request['service_id'] = '241';
        //     $request['application_no'] = "PMC-" . time();

        // Handle file uploads and store original file names
        $request['user_id'] = Auth::user()->id;
        $request['service_id'] = "2010";
        $request['application_no'] = "PMC-" . time();

        if ($request->hasFile('upload_prescribed_formats')) {
            $request['gumasta_certificate'] = $request->upload_prescribed_formats->store('tents-permission');
        }

        if ($request->hasFile('aadhar_pans')) {
            $request['aadhar_pan'] = $request->aadhar_pans->store('tents-permission');
        }
        if ($request->hasFile('ownership')) {
            $request['land_ownership'] = $request->ownership->store('tents-permission');
        }

        if ($request->hasFile('water_bills')) {
            $request['water_bill'] = $request->water_bills->store('tents-permission');
        }

        if ($request->hasFile('society')) {
            $request['no_objection_certificate'] = $request->society->store('tents-permission');
        }

        if ($request->hasFile('place')) {
            $request['photo_of_place'] = $request->place->store('tents-permission');
        }

        if ($request->hasFile('property')) {
            $request['property_tax'] = $request->property->store('tents-permission');
        }

        if ($request->hasFile('tenancy')) {
            $request['tenancy_agreement'] = $request->tenancy->store('tents-permission');
        }

        if ($request->hasFile('occupancy')) {
            $request['site_occupancy'] = $request->occupancy->store('tents-permission');
        }

        if ($request->hasFile('medical')) {
            $request['medical_certificate'] = $request->medical->store('tents-permission');
        }

        if ($request->hasFile('control')) {
            $request['pest_control'] = $request->control->store('tents-permission');
        }

        if ($request->hasFile('registration')) {
            $request['gst_registration'] = $request->registration->store('tents-permission');
        }

        if ($request->hasFile('food')) {
            $request['drug_administration'] = $request->food->store('tents-permission');
        }

        if ($request->hasFile('fire')) {
            $request['fire_rigade'] = $request->fire->store('tents-permission');
        }

        if ($request->hasFile('liquor')) {
            $request['liquor_license'] = $request->liquor->store('tents-permission');
        }
        // dd($request->all());
        $tenstsPermissionService = TentsPermission::create($request->all());

        if ($tenstsPermissionService) {
            $applicationId = $request->application_no;

            if (Auth::user()->is_aapale_sarkar_user) {
                $aapaleSarkarCredential = ServiceCredential::where('dept_service_id', $request->service_id)->first();
                $serviceDay = ($aapaleSarkarCredential->service_day) ? $aapaleSarkarCredential->service_day : 20;

                $send = $this->aapaleSarkarLoginCheckService->encryptAndSendRequestToAapaleSarkar(
                    Auth::user()->trackid,
                    $aapaleSarkarCredential->client_code,
                    Auth::user()->user_id,
                    $aapaleSarkarCredential->service_id,
                    $applicationId,
                    'N',
                    'NA',
                    'N',
                    'NA',
                    $serviceDay,
                    date('Y-m-d', strtotime("+$serviceDay days")),
                    config('rtsapiurl.amount'),
                    config('rtsapiurl.requestFlag'),
                    config('rtsapiurl.applicationStatus'),
                    config('rtsapiurl.applicationPendingStatusTxt'),
                    $aapaleSarkarCredential->ulb_id,
                    $aapaleSarkarCredential->ulb_district,
                    'NA',
                    'NA',
                    'NA',
                    $aapaleSarkarCredential->check_sum_key,
                    $aapaleSarkarCredential->str_key,
                    $aapaleSarkarCredential->str_iv,
                    $aapaleSarkarCredential->soap_end_point_url,
                    $aapaleSarkarCredential->soap_action_app_status_url
                );

                if (!$send) {
                    $this->aapaleSarkarLoginCheckService->savePendingAapaleSarkarData($applicationId, $request->service_id, Auth::user()->user_id);
                    DB::commit();
                    return [true];
                }
            }
        } else {
            DB::rollback();
            return [false, 'Something went wrong, please try again!'];
        }

        DB::commit();
        return [true];

        // } catch (\Exception $e) {
        //     DB::rollback();
        //     Log::error('Error in store method: ' . $e->getMessage());
        //     return [false, $e->getMessage()];
        // }
    }

    public function edit($id)
    {
        return TentsPermission::find($id);
    }

    public function update($request, $id)
    {
        DB::beginTransaction();
        try {
            // Find the existing record
            $tenstsPermissionService = TentsPermission::findOrFail($id);

            // Handle file uploads and update original file names

            if ($request->hasFile('upload_prescribed_formats')) {
                if ($tenstsPermissionService &&  $tenstsPermissionService->gumasta_certificate &&  $tenstsPermissionService->gumasta_certificate && Storage::exists($tenstsPermissionService->gumasta_certificate)) {
                    Storage::delete($tenstsPermissionService->gumasta_certificate);
                }
                $request['gumasta_certificate'] = $request->upload_prescribed_formats->store('tents-permission');
            }

            if ($request->hasFile('aadhar_pans')) {
                if ($tenstsPermissionService &&  $tenstsPermissionService->aadhar_pan && Storage::exists($tenstsPermissionService->aadhar_pan)) {
                    Storage::delete($tenstsPermissionService->aadhar_pan);
                }
                $request['aadhar_pan'] = $request->aadhar_pans->store('tents-permission');
            }

            if ($request->hasFile('ownership')) {
                if ($tenstsPermissionService &&  $tenstsPermissionService->land_ownership && Storage::exists($tenstsPermissionService->land_ownership)) {
                    Storage::delete($tenstsPermissionService->land_ownership);
                }
                $request['land_ownership'] = $request->ownership->store('tents-permission');
            }


            if ($request->hasFile('water_bills')) {
                if ($tenstsPermissionService &&  $tenstsPermissionService->water_bill && Storage::exists($tenstsPermissionService->water_bill)) {
                    Storage::delete($tenstsPermissionService->water_bill);
                }
                $request['water_bill'] = $request->water_bills->store('tents-permission');
            }


            if ($request->hasFile('society')) {
                if ($tenstsPermissionService &&  $tenstsPermissionService->no_objection_certificate && Storage::exists($tenstsPermissionService->no_objection_certificate)) {
                    Storage::delete($tenstsPermissionService->no_objection_certificate);
                }
                $request['no_objection_certificate'] = $request->society->store('tents-permission');
            }


            if ($request->hasFile('place')) {
                if ($tenstsPermissionService &&  $tenstsPermissionService->photo_of_place && Storage::exists($tenstsPermissionService->photo_of_place)) {
                    Storage::delete($tenstsPermissionService->photo_of_place);
                }
                $request['photo_of_place'] = $request->place->store('tents-permission');
            }

            if ($request->hasFile('property')) {
                if ($tenstsPermissionService &&  $tenstsPermissionService->property_tax && Storage::exists($tenstsPermissionService->property_tax)) {
                    Storage::delete($tenstsPermissionService->property_tax);
                }
                $request['property_tax'] = $request->property->store('tents-permission');
            }

            if ($request->hasFile('tenancy')) {
                if ($tenstsPermissionService &&  $tenstsPermissionService->tenancy_agreement && Storage::exists($tenstsPermissionService->tenancy_agreement)) {
                    Storage::delete($tenstsPermissionService->tenancy_agreement);
                }
                $request['tenancy_agreement'] = $request->tenancy->store('tents-permission');
            }




            if ($request->hasFile('occupancy')) {
                if ($tenstsPermissionService &&  $tenstsPermissionService->site_occupancy && Storage::exists($tenstsPermissionService->site_occupancy)) {
                    Storage::delete($tenstsPermissionService->site_occupancy);
                }
                $request['site_occupancy'] = $request->occupancy->store('tents-permission');
            }

            if ($request->hasFile('medical')) {
                if ($tenstsPermissionService &&  $tenstsPermissionService->medical_certificate && Storage::exists($tenstsPermissionService->medical_certificate)) {
                    Storage::delete($tenstsPermissionService->medical_certificate);
                }
                $request['medical_certificate'] = $request->medical->store('tents-permission');
            }

            if ($request->hasFile('control')) {
                if ($tenstsPermissionService &&  $tenstsPermissionService->pest_control && Storage::exists($tenstsPermissionService->pest_control)) {
                    Storage::delete($tenstsPermissionService->pest_control);
                }
                $request['pest_control'] = $request->control->store('tents-permission');
            }


            if ($request->hasFile('registration')) {
                if ($tenstsPermissionService &&  $tenstsPermissionService->gst_registration && Storage::exists($tenstsPermissionService->gst_registration)) {
                    Storage::delete($tenstsPermissionService->gst_registration);
                }
                $request['gst_registration'] = $request->registration->store('tents-permission');
            }

            if ($request->hasFile('food')) {
                if ($tenstsPermissionService &&  $tenstsPermissionService->drug_administration && Storage::exists($tenstsPermissionService->drug_administration)) {
                    Storage::delete($tenstsPermissionService->drug_administration);
                }
                $request['drug_administration'] = $request->food->store('tents-permission');
            }


            if ($request->hasFile('fire')) {
                if ($tenstsPermissionService &&  $tenstsPermissionService->fire_rigade && Storage::exists($tenstsPermissionService->fire_rigade)) {
                    Storage::delete($tenstsPermissionService->fire_rigade);
                }
                $request['fire_rigade'] = $request->fire->store('tents-permission');
            }


            if ($request->hasFile('liquor')) {
                if ($tenstsPermissionService &&  $tenstsPermissionService->liquor_license && Storage::exists($tenstsPermissionService->liquor_license)) {
                    Storage::delete($tenstsPermissionService->liquor_license);
                }
                $request['liquor_license'] = $request->liquor->store('tents-permission');
            }


            // Update the rest of the fields
            $tenstsPermissionService->update($request->all());

            DB::commit();
            return [true];
        } catch (\Exception $e) {
            DB::rollback();
            Log::error('Error in update method: ' . $e->getMessage());
            return [false, $e->getMessage()];
        }
    }
}
