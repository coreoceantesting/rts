<?php

namespace App\Services;

use App\Services\AapaleSarkarLoginCheckService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use App\Models\GardensFilming;
use App\Models\ServiceCredential;

class GardensFilmingService
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
        $request['service_id'] = "2003";
        $request['application_no'] = "PMC-" . time();
        if ($request->hasFile('upload_prescribed_formats')) {
            $request['gumasta_certificate'] = $request->upload_prescribed_formats->store('gardens-filming');
        }

        if ($request->hasFile('aadhar_pans')) {
            $request['aadhar_pan'] = $request->aadhar_pans->store('gardens-filming');
        }
        if ($request->hasFile('ownership')) {
            $request['land_ownership'] = $request->ownership->store('gardens-filming');
        }

        if ($request->hasFile('water_bills')) {
            $request['water_bill'] = $request->water_bills->store('gardens-filming');
        }

        if ($request->hasFile('society')) {
            $request['no_objection_certificate'] = $request->society->store('gardens-filming');
        }

        if ($request->hasFile('place')) {
            $request['photo_of_place'] = $request->place->store('gardens-filming');
        }

        if ($request->hasFile('property')) {
            $request['property_tax'] = $request->property->store('gardens-filming');
        }

        if ($request->hasFile('tenancy')) {
            $request['tenancy_agreement'] = $request->tenancy->store('gardens-filming');
        }

        if ($request->hasFile('occupancy')) {
            $request['site_occupancy'] = $request->occupancy->store('gardens-filming');
        }

        if ($request->hasFile('medical')) {
            $request['medical_certificate'] = $request->medical->store('gardens-filming');
        }

        if ($request->hasFile('control')) {
            $request['pest_control'] = $request->control->store('gardens-filming');
        }

        if ($request->hasFile('registration')) {
            $request['gst_registration'] = $request->registration->store('gardens-filming');
        }

        if ($request->hasFile('food')) {
            $request['drug_administration'] = $request->food->store('gardens-filming');
        }

        if ($request->hasFile('fire')) {
            $request['fire_rigade'] = $request->fire->store('gardens-filming');
        }

        if ($request->hasFile('liquor')) {
            $request['liquor_license'] = $request->liquor->store('gardens-filming');
        }
        // dd($request->all());
        $gardnesfilmings = GardensFilming::create($request->all());

        if ($gardnesfilmings) {
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
        return GardensFilming::find($id);
    }

    public function update($request, $id)
    {
        DB::beginTransaction();
        try {
            // Find the existing record
            $PermissionShootingService = GardensFilming::findOrFail($id);

            // Handle file uploads and update original file names

            if ($request->hasFile('upload_prescribed_formats')) {
                if ($PermissionShootingService && Storage::exists($PermissionShootingService->gumasta_certificate)) {
                    Storage::delete($PermissionShootingService->gumasta_certificate);
                }
                $request['gumasta_certificate'] = $request->upload_prescribed_formats->store('gardens-filming');
            }

            if ($request->hasFile('aadhar_pans')) {
                if ($PermissionShootingService && Storage::exists($PermissionShootingService->aadhar_pan)) {
                    Storage::delete($PermissionShootingService->aadhar_pan);
                }
                $request['aadhar_pan'] = $request->aadhar_pans->store('gardens-filming');
            }

            if ($request->hasFile('ownership')) {
                if ($PermissionShootingService && Storage::exists($PermissionShootingService->land_ownership)) {
                    Storage::delete($PermissionShootingService->land_ownership);
                }
                $request['land_ownership'] = $request->ownership->store('gardens-filming');
            }


            if ($request->hasFile('water_bills')) {
                if ($PermissionShootingService && Storage::exists($PermissionShootingService->water_bill)) {
                    Storage::delete($PermissionShootingService->water_bill);
                }
                $request['water_bill'] = $request->water_bills->store('gardens-filming');
            }


            if ($request->hasFile('society')) {
                if ($PermissionShootingService && Storage::exists($PermissionShootingService->no_objection_certificate)) {
                    Storage::delete($PermissionShootingService->no_objection_certificate);
                }
                $request['no_objection_certificate'] = $request->society->store('gardens-filming');
            }


            if ($request->hasFile('place')) {
                if ($PermissionShootingService && Storage::exists($PermissionShootingService->photo_of_place)) {
                    Storage::delete($PermissionShootingService->photo_of_place);
                }
                $request['photo_of_place'] = $request->place->store('gardens-filming');
            }

            if ($request->hasFile('property')) {
                if ($PermissionShootingService && Storage::exists($PermissionShootingService->property_tax)) {
                    Storage::delete($PermissionShootingService->property_tax);
                }
                $request['property_tax'] = $request->property->store('gardens-filming');
            }

            if ($request->hasFile('tenancy')) {
                if ($PermissionShootingService && Storage::exists($PermissionShootingService->tenancy_agreement)) {
                    Storage::delete($PermissionShootingService->tenancy_agreement);
                }
                $request['tenancy_agreement'] = $request->tenancy->store('gardens-filming');
            }




            if ($request->hasFile('occupancy')) {
                if ($PermissionShootingService && Storage::exists($PermissionShootingService->site_occupancy)) {
                    Storage::delete($PermissionShootingService->site_occupancy);
                }
                $request['site_occupancy'] = $request->occupancy->store('gardens-filming');
            }

            if ($request->hasFile('medical')) {
                if ($PermissionShootingService && Storage::exists($PermissionShootingService->medical_certificate)) {
                    Storage::delete($PermissionShootingService->medical_certificate);
                }
                $request['medical_certificate'] = $request->medical->store('gardens-filming');
            }

            if ($request->hasFile('control')) {
                if ($PermissionShootingService && Storage::exists($PermissionShootingService->pest_control)) {
                    Storage::delete($PermissionShootingService->pest_control);
                }
                $request['pest_control'] = $request->control->store('gardens-filming');
            }


            if ($request->hasFile('registration')) {
                if ($PermissionShootingService && Storage::exists($PermissionShootingService->gst_registration)) {
                    Storage::delete($PermissionShootingService->gst_registration);
                }
                $request['gst_registration'] = $request->registration->store('gardens-filming');
            }

            if ($request->hasFile('food')) {
                if ($PermissionShootingService && Storage::exists($PermissionShootingService->drug_administration)) {
                    Storage::delete($PermissionShootingService->drug_administration);
                }
                $request['drug_administration'] = $request->food->store('gardens-filming');
            }


            if ($request->hasFile('fire')) {
                if ($PermissionShootingService && Storage::exists($PermissionShootingService->fire_rigade)) {
                    Storage::delete($PermissionShootingService->fire_rigade);
                }
                $request['fire_rigade'] = $request->fire->store('gardens-filming');
            }


            if ($request->hasFile('liquor')) {
                if ($PermissionShootingService && Storage::exists($PermissionShootingService->liquor_license)) {
                    Storage::delete($PermissionShootingService->liquor_license);
                }
                $request['liquor_license'] = $request->liquor->store('gardens-filming');
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
