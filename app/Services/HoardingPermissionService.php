<?php

namespace App\Services;

use App\Services\AapaleSarkarLoginCheckService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use App\Models\HoardingPermission;
use App\Models\ServiceCredential;

class HoardingPermissionService
{
    protected $aapaleSarkarLoginCheckService;

    public function __construct(AapaleSarkarLoginCheckService $aapaleSarkarLoginCheckService)
    {
        $this->aapaleSarkarLoginCheckService = $aapaleSarkarLoginCheckService;
    }

    public function store($request)
    {
        $request['user_id'] = Auth::user()->id;
        $request['service_id'] = "2005";
        $request['application_no'] = "PMC-" . time();

        if ($request->hasFile('detail_property_images')) {
            $request['detail_property_image'] = $request->detail_property_images->store('hoarding-permission');
        }

        if ($request->hasFile('consent_letters')) {
            $request['consent_letter'] = $request->consent_letters->store('hoarding-permission');
        }

        if ($request->hasFile('upload_prescribed_formats')) {
            $request['building_permission'] = $request->upload_prescribed_formats->store('hoarding-permission');
        }

        if ($request->hasFile('aadhar_pans')) {
            $request['paid_receipt'] = $request->aadhar_pans->store('hoarding-permission');
        }
        if ($request->hasFile('ownership')) {
            $request['structural_engineer'] = $request->ownership->store('hoarding-permission');
        }

        if ($request->hasFile('water_bills')) {
            $request['certificate_of_structural'] = $request->water_bills->store('hoarding-permission');
        }

        if ($request->hasFile('society')) {
            $request['no_objection_certificate'] = $request->society->store('hoarding-permission');
        }

        if ($request->hasFile('place')) {
            $request['sightseeing'] = $request->place->store('hoarding-permission');
        }

        if ($request->hasFile('property')) {
            $request['drawing_provided'] = $request->property->store('hoarding-permission');
        }

        if ($request->hasFile('tenancy')) {
            $request['pr_card'] = $request->tenancy->store('hoarding-permission');
        }

        if ($request->hasFile('occupancy')) {
            $request['site_occupancy'] = $request->occupancy->store('hoarding-permission');
        }

        if ($request->hasFile('medical')) {
            $request['medical_certificate'] = $request->medical->store('hoarding-permission');
        }

        if ($request->hasFile('control')) {
            $request['pest_control'] = $request->control->store('hoarding-permission');
        }

        if ($request->hasFile('registration')) {
            $request['gst_registration'] = $request->registration->store('hoarding-permission');
        }

        if ($request->hasFile('food')) {
            $request['drug_administration'] = $request->food->store('hoarding-permission');
        }

        if ($request->hasFile('fire')) {
            $request['fire_rigade'] = $request->fire->store('hoarding-permission');
        }

        if ($request->hasFile('liquor')) {
            $request['liquor_license'] = $request->liquor->store('hoarding-permission');
        }

        $HoardingPermission = HoardingPermission::create($request->all());

        if ($HoardingPermission) {
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
        return HoardingPermission::find($id);
    }

    public function update($request, $id)
    {
        DB::beginTransaction();
        try {
            // Find the existing record
            $HoardingPermission = HoardingPermission::find($id);

            // Handle file uploads and update original file names


            if ($request->hasFile('upload_prescribed_formats')) {
                if ($HoardingPermission && $HoardingPermission->gumasta_certificate && Storage::exists($HoardingPermission->gumasta_certificate)) {
                    Storage::delete($HoardingPermission->gumasta_certificate);
                }
                $request['gumasta_certificate'] = $request->upload_prescribed_formats->store('hoarding-permission');
            }

            if ($request->hasFile('aadhar_pans')) {
                if ($HoardingPermission && $HoardingPermission->aadhar_pan && $HoardingPermission->gumasta_certificate && Storage::exists($HoardingPermission->aadhar_pan)) {
                    Storage::delete($HoardingPermission->aadhar_pan);
                }
                $request['aadhar_pan'] = $request->aadhar_pans->store('hoarding-permission');
            }

            if ($request->hasFile('ownership')) {
                if ($HoardingPermission && $HoardingPermission->gumasta_certificate && Storage::exists($HoardingPermission->land_ownership)) {
                    Storage::delete($HoardingPermission->land_ownership);
                }
                $request['land_ownership'] = $request->ownership->store('hoarding-permission');
            }
            log::info(1);
            if ($request->hasFile('water_bills')) {
                if ($HoardingPermission && $HoardingPermission->water_bill && Storage::exists($HoardingPermission->water_bill)) {
                    Storage::delete($HoardingPermission->water_bill);
                }
                $request['water_bill'] = $request->water_bills->store('hoarding-permission');
            }


            if ($request->hasFile('society')) {
                if ($HoardingPermission && $HoardingPermission->no_objection_certificate && Storage::exists($HoardingPermission->no_objection_certificate)) {
                    Storage::delete($HoardingPermission->no_objection_certificate);
                }
                $request['no_objection_certificate'] = $request->society->store('hoarding-permission');
            }


            if ($request->hasFile('place')) {
                if ($HoardingPermission && $HoardingPermission->photo_of_place && Storage::exists($HoardingPermission->photo_of_place)) {
                    Storage::delete($HoardingPermission->photo_of_place);
                }
                $request['photo_of_place'] = $request->place->store('hoarding-permission');
            }


            if ($request->hasFile('property')) {
                if ($HoardingPermission && $HoardingPermission->property_tax && Storage::exists($HoardingPermission->property_tax)) {
                    Storage::delete($HoardingPermission->property_tax);
                }
                $request['property_tax'] = $request->property->store('hoarding-permission');
            }

            if ($request->hasFile('tenancy')) {
                if ($HoardingPermission && $HoardingPermission->tenancy_agreement && Storage::exists($HoardingPermission->tenancy_agreement)) {
                    Storage::delete($HoardingPermission->tenancy_agreement);
                }
                $request['tenancy_agreement'] = $request->tenancy->store('hoarding-permission');
            }


            if ($request->hasFile('occupancy')) {
                if ($HoardingPermission && $HoardingPermission->site_occupancy && Storage::exists($HoardingPermission->site_occupancy)) {
                    Storage::delete($HoardingPermission->site_occupancy);
                }
                $request['site_occupancy'] = $request->occupancy->store('hoarding-permission');
            }

            if ($request->hasFile('medical')) {
                if ($HoardingPermission && $HoardingPermission->medical_certificate && Storage::exists($HoardingPermission->medical_certificate)) {
                    Storage::delete($HoardingPermission->medical_certificate);
                }
                $request['medical_certificate'] = $request->medical->store('hoarding-permission');
            }

            if ($request->hasFile('control')) {
                if ($HoardingPermission && $HoardingPermission->pest_control && Storage::exists($HoardingPermission->pest_control)) {
                    Storage::delete($HoardingPermission->pest_control);
                }
                $request['pest_control'] = $request->control->store('hoarding-permission');
            }


            if ($request->hasFile('registration')) {
                if ($HoardingPermission && $HoardingPermission->gst_registration && Storage::exists($HoardingPermission->gst_registration)) {
                    Storage::delete($HoardingPermission->gst_registration);
                }
                $request['gst_registration'] = $request->registration->store('hoarding-permission');
            }

            if ($request->hasFile('food')) {
                if ($HoardingPermission && $HoardingPermission->drug_administration && Storage::exists($HoardingPermission->drug_administration)) {
                    Storage::delete($HoardingPermission->drug_administration);
                }
                $request['drug_administration'] = $request->food->store('hoarding-permission');
            }

            if ($request->hasFile('fire')) {
                if ($HoardingPermission && $HoardingPermission->fire_rigade && Storage::exists($HoardingPermission->fire_rigade)) {
                    Storage::delete($HoardingPermission->fire_rigade);
                }
                $request['fire_rigade'] = $request->fire->store('hoarding-permission');
            }

            if ($request->hasFile('liquor')) {
                if ($HoardingPermission && $HoardingPermission->liquor_license && Storage::exists($HoardingPermission->liquor_license)) {
                    Storage::delete($HoardingPermission->liquor_license);
                }
                $request['liquor_license'] = $request->liquor->store('hoarding-permission');
            }

            // Update the rest of the fields
            $HoardingPermission->update($request->all());

            DB::commit();
            return [true];
        } catch (\Exception $e) {
            DB::rollback();
            Log::error('Error in update method: ' . $e->getMessage());
            return [false, $e->getMessage()];
        }
    }
}
