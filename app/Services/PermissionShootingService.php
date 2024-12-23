<?php

namespace App\Services;

use App\Services\AapaleSarkarLoginCheckService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use App\Models\PermissionShooting;
use App\Models\ServiceCredential;

class PermissionShootingService
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
        $request['service_id'] = "2008";
        $request['application_no'] = "PMC-" . time();
        if ($request->hasFile('upload_prescribed_formats')) {
            $request['gumasta_certificate'] = $request->upload_prescribed_formats->store('permission-shooting');
        }

        if ($request->hasFile('aadhar_pans')) {
            $request['aadhar_pan'] = $request->aadhar_pans->store('permission-shooting');
        }
        if ($request->hasFile('ownership')) {
            $request['land_ownership'] = $request->ownership->store('permission-shooting');
        }

        if ($request->hasFile('water_bills')) {
            $request['water_bill'] = $request->water_bills->store('permission-shooting');
        }

        if ($request->hasFile('society')) {
            $request['no_objection_certificate'] = $request->society->store('permission-shooting');
        }

        if ($request->hasFile('place')) {
            $request['photo_of_place'] = $request->place->store('permission-shooting');
        }

        if ($request->hasFile('property')) {
            $request['property_tax'] = $request->property->store('permission-shooting');
        }

        if ($request->hasFile('tenancy')) {
            $request['tenancy_agreement'] = $request->tenancy->store('permission-shooting');
        }

        if ($request->hasFile('occupancy')) {
            $request['site_occupancy'] = $request->occupancy->store('permission-shooting');
        }

        if ($request->hasFile('medical')) {
            $request['medical_certificate'] = $request->medical->store('permission-shooting');
        }

        if ($request->hasFile('control')) {
            $request['pest_control'] = $request->control->store('permission-shooting');
        }

        if ($request->hasFile('registration')) {
            $request['gst_registration'] = $request->registration->store('permission-shooting');
        }

        if ($request->hasFile('food')) {
            $request['drug_administration'] = $request->food->store('permission-shooting');
        }

        if ($request->hasFile('fire')) {
            $request['fire_rigade'] = $request->fire->store('permission-shooting');
        }

        if ($request->hasFile('liquor')) {
            $request['liquor_license'] = $request->liquor->store('permission-shooting');
        }
        // dd($request->all());
        $permissionshooting = PermissionShooting::create($request->all());

        if ($permissionshooting) {
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
        return PermissionShooting::find($id);
    }

    public function update($request, $id)
    {
        DB::beginTransaction();
        try {
            // Find the existing record
            $PermissionShootingService = PermissionShooting::findOrFail($id);

            // Handle file uploads and update original file names

            if ($request->hasFile('upload_prescribed_formats')) {
                if ($PermissionShootingService && $PermissionShootingService->gumasta_certificate && $PermissionShootingService->gumasta_certificate && Storage::exists($PermissionShootingService->gumasta_certificate)) {
                    Storage::delete($PermissionShootingService->gumasta_certificate);
                }
                $request['gumasta_certificate'] = $request->upload_prescribed_formats->store('permission-shooting');
            }

            if ($request->hasFile('aadhar_pans')) {
                if ($PermissionShootingService && $PermissionShootingService->aadhar_pan && Storage::exists($PermissionShootingService->aadhar_pan)) {
                    Storage::delete($PermissionShootingService->aadhar_pan);
                }
                $request['aadhar_pan'] = $request->aadhar_pans->store('permission-shooting');
            }

            if ($request->hasFile('ownership')) {
                if ($PermissionShootingService && $PermissionShootingService->land_ownership && Storage::exists($PermissionShootingService->land_ownership)) {
                    Storage::delete($PermissionShootingService->land_ownership);
                }
                $request['land_ownership'] = $request->ownership->store('permission-shooting');
            }


            if ($request->hasFile('water_bills')) {
                if ($PermissionShootingService && $PermissionShootingService->water_bill && Storage::exists($PermissionShootingService->water_bill)) {
                    Storage::delete($PermissionShootingService->water_bill);
                }
                $request['water_bill'] = $request->water_bills->store('permission-shooting');
            }


            if ($request->hasFile('society')) {
                if ($PermissionShootingService && $PermissionShootingService->no_objection_certificate && Storage::exists($PermissionShootingService->no_objection_certificate)) {
                    Storage::delete($PermissionShootingService->no_objection_certificate);
                }
                $request['no_objection_certificate'] = $request->society->store('permission-shooting');
            }


            if ($request->hasFile('place')) {
                if ($PermissionShootingService && $PermissionShootingService->photo_of_place && Storage::exists($PermissionShootingService->photo_of_place)) {
                    Storage::delete($PermissionShootingService->photo_of_place);
                }
                $request['photo_of_place'] = $request->place->store('permission-shooting');
            }

            if ($request->hasFile('property')) {
                if ($PermissionShootingService && $PermissionShootingService->property_tax && Storage::exists($PermissionShootingService->property_tax)) {
                    Storage::delete($PermissionShootingService->property_tax);
                }
                $request['property_tax'] = $request->property->store('permission-shooting');
            }

            if ($request->hasFile('tenancy')) {
                if ($PermissionShootingService && $PermissionShootingService->tenancy_agreement && Storage::exists($PermissionShootingService->tenancy_agreement)) {
                    Storage::delete($PermissionShootingService->tenancy_agreement);
                }
                $request['tenancy_agreement'] = $request->tenancy->store('permission-shooting');
            }




            if ($request->hasFile('occupancy')) {
                if ($PermissionShootingService && $PermissionShootingService->site_occupancy && Storage::exists($PermissionShootingService->site_occupancy)) {
                    Storage::delete($PermissionShootingService->site_occupancy);
                }
                $request['site_occupancy'] = $request->occupancy->store('permission-shooting');
            }

            if ($request->hasFile('medical')) {
                if ($PermissionShootingService && $PermissionShootingService->medical_certificate && Storage::exists($PermissionShootingService->medical_certificate)) {
                    Storage::delete($PermissionShootingService->medical_certificate);
                }
                $request['medical_certificate'] = $request->medical->store('permission-shooting');
            }

            if ($request->hasFile('control')) {
                if ($PermissionShootingService && $PermissionShootingService->pest_control && Storage::exists($PermissionShootingService->pest_control)) {
                    Storage::delete($PermissionShootingService->pest_control);
                }
                $request['pest_control'] = $request->control->store('permission-shooting');
            }


            if ($request->hasFile('registration')) {
                if ($PermissionShootingService && $PermissionShootingService->gst_registration && Storage::exists($PermissionShootingService->gst_registration)) {
                    Storage::delete($PermissionShootingService->gst_registration);
                }
                $request['gst_registration'] = $request->registration->store('permission-shooting');
            }

            if ($request->hasFile('food')) {
                if ($PermissionShootingService && $PermissionShootingService->drug_administration && Storage::exists($PermissionShootingService->drug_administration)) {
                    Storage::delete($PermissionShootingService->drug_administration);
                }
                $request['drug_administration'] = $request->food->store('permission-shooting');
            }


            if ($request->hasFile('fire')) {
                if ($PermissionShootingService && $PermissionShootingService->fire_rigade && Storage::exists($PermissionShootingService->fire_rigade)) {
                    Storage::delete($PermissionShootingService->fire_rigade);
                }
                $request['fire_rigade'] = $request->fire->store('permission-shooting');
            }


            if ($request->hasFile('liquor')) {
                if ($PermissionShootingService && $PermissionShootingService->liquor_license && Storage::exists($PermissionShootingService->liquor_license)) {
                    Storage::delete($PermissionShootingService->liquor_license);
                }
                $request['liquor_license'] = $request->liquor->store('permission-shooting');
            }


            // Update the rest of the fields
            $PermissionShootingService->update($request->all());

            DB::commit();
            return [true];
        } catch (\Exception $e) {
            DB::rollback();
            Log::error('Error in update method: ' . $e->getMessage());
            return [false, $e->getMessage()];
        }
    }
}
