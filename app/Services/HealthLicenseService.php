<?php

namespace App\Services;

use App\Services\AapaleSarkarLoginCheckService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use App\Models\HealthLicense;
use App\Models\ServiceCredential;

class HealthLicenseService
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
        $request['service_id'] = "2004";
        $request['application_no'] = "PMC-" . time();
        if ($request->hasFile('upload_prescribed_formats')) {
            $request['gumasta_certificate'] = $request->upload_prescribed_formats->store('health-license');
        }

        if ($request->hasFile('aadhar_pans')) {
            $request['aadhar_pan'] = $request->aadhar_pans->store('health-license');
        }
        if ($request->hasFile('ownership')) {
            $request['land_ownership'] = $request->ownership->store('health-license');
        }

        if ($request->hasFile('water_bills')) {
            $request['water_bill'] = $request->water_bills->store('health-license');
        }

        if ($request->hasFile('society')) {
            $request['no_objection_certificate'] = $request->society->store('health-license');
        }

        if ($request->hasFile('place')) {
            $request['photo_of_place'] = $request->place->store('health-license');
        }

        if ($request->hasFile('property')) {
            $request['property_tax'] = $request->property->store('health-license');
        }

        if ($request->hasFile('tenancy')) {
            $request['tenancy_agreement'] = $request->tenancy->store('health-license');
        }

        if ($request->hasFile('occupancy')) {
            $request['site_occupancy'] = $request->occupancy->store('health-license');
        }

        if ($request->hasFile('medical')) {
            $request['medical_certificate'] = $request->medical->store('health-license');
        }

        if ($request->hasFile('control')) {
            $request['pest_control'] = $request->control->store('health-license');
        }

        if ($request->hasFile('registration')) {
            $request['gst_registration'] = $request->registration->store('health-license');
        }

        if ($request->hasFile('food')) {
            $request['drug_administration'] = $request->food->store('health-license');
        }

        if ($request->hasFile('fire')) {
            $request['fire_rigade'] = $request->fire->store('health-license');
        }

        if ($request->hasFile('liquor')) {
            $request['liquor_license'] = $request->liquor->store('health-license');
        }

        $HealthLicense = HealthLicense::create($request->all());

        if ($HealthLicense) {
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
        return HealthLicense::find($id);
    }

    public function update($request, $id)
    {
        // dd($request->all());
        DB::beginTransaction();
        try {
            // Find the existing record
            $HealthLicense = HealthLicense::find($id);

            // Handle file uploads and update original file names


            if ($request->hasFile('upload_prescribed_formats')) {
                if ($HealthLicense && $HealthLicense->gumasta_certificate && Storage::exists($HealthLicense->gumasta_certificate)) {
                    Storage::delete($HealthLicense->gumasta_certificate);
                }
                $request['gumasta_certificate'] = $request->upload_prescribed_formats->store('health-license');
            }

            if ($request->hasFile('aadhar_pans')) {
                if ($HealthLicense && $HealthLicense->aadhar_pan && Storage::exists($HealthLicense->aadhar_pan)) {
                    Storage::delete($HealthLicense->aadhar_pan);
                }
                $request['aadhar_pan'] = $request->aadhar_pans->store('health-license');
            }

            if ($request->hasFile('ownership')) {
                if ($HealthLicense && $HealthLicense->land_ownership && Storage::exists($HealthLicense->land_ownership)) {
                    Storage::delete($HealthLicense->land_ownership);
                }
                $request['land_ownership'] = $request->ownership->store('health-license');
            }

            if ($request->hasFile('water_bills')) {
                if ($HealthLicense && $HealthLicense->water_bill && Storage::exists($HealthLicense->water_bill)) {
                    Storage::delete($HealthLicense->water_bill);
                }
                $request['water_bill'] = $request->water_bills->store('health-license');
            }


            if ($request->hasFile('society')) {
                if ($HealthLicense && $HealthLicense->no_objection_certificate && Storage::exists($HealthLicense->no_objection_certificate)) {
                    Storage::delete($HealthLicense->no_objection_certificate);
                }
                $request['no_objection_certificate'] = $request->society->store('health-license');
            }

            if ($request->hasFile('place')) {
                if ($HealthLicense && $HealthLicense->photo_of_place && Storage::exists($HealthLicense->photo_of_place)) {
                    Storage::delete($HealthLicense->photo_of_place);
                }
                $request['photo_of_place'] = $request->place->store('health-license');
            }

            if ($request->hasFile('property')) {
                if ($HealthLicense && $HealthLicense->property_tax && Storage::exists($HealthLicense->property_tax)) {
                    Storage::delete($HealthLicense->property_tax);
                }
                $request['property_tax'] = $request->property->store('health-license');
            }

            if ($request->hasFile('tenancy')) {
                if ($HealthLicense && $HealthLicense->tenancy_agreement && Storage::exists($HealthLicense->tenancy_agreement)) {
                    Storage::delete($HealthLicense->tenancy_agreement);
                }
                $request['tenancy_agreement'] = $request->tenancy->store('health-license');
            }

            if ($request->hasFile('occupancy')) {
                if ($HealthLicense && $HealthLicense->site_occupancy && Storage::exists($HealthLicense->site_occupancy)) {
                    Storage::delete($HealthLicense->site_occupancy);
                }
                $request['site_occupancy'] = $request->occupancy->store('health-license');
            }


            if ($request->hasFile('medical')) {
                if ($HealthLicense && $HealthLicense->medical_certificate && Storage::exists($HealthLicense->medical_certificate)) {
                    Storage::delete($HealthLicense->medical_certificate);
                }
                $request['medical_certificate'] = $request->medical->store('health-license');
            }

            if ($request->hasFile('control')) {
                if ($HealthLicense && $HealthLicense->pest_control && Storage::exists($HealthLicense->pest_control)) {
                    Storage::delete($HealthLicense->pest_control);
                }
                $request['pest_control'] = $request->control->store('health-license');
            }

            if ($request->hasFile('registration')) {
                if ($HealthLicense && $HealthLicense->gst_registration && Storage::exists($HealthLicense->gst_registration)) {
                    Storage::delete($HealthLicense->gst_registration);
                }
                $request['gst_registration'] = $request->registration->store('health-license');
            }

            if ($request->hasFile('food')) {
                if ($HealthLicense && $HealthLicense->drug_administration && Storage::exists($HealthLicense->drug_administration)) {
                    Storage::delete($HealthLicense->drug_administration);
                }
                $request['drug_administration'] = $request->food->store('health-license');
            }

            if ($request->hasFile('fire')) {
                if ($HealthLicense && $HealthLicense->fire_rigade && Storage::exists($HealthLicense->fire_rigade)) {
                    Storage::delete($HealthLicense->fire_rigade);
                }
                $request['fire_rigade'] = $request->fire->store('health-license');
            }

            if ($request->hasFile('liquor')) {
                if ($HealthLicense && $HealthLicense->liquor_license && Storage::exists($HealthLicense->liquor_license)) {
                    Storage::delete($HealthLicense->liquor_license);
                }
                $request['liquor_license'] = $request->liquor->store('health-license');
            }



            // Update the rest of the fields
            $HealthLicense->update($request->all());

            DB::commit();
            return [true];
        } catch (\Exception $e) {
            DB::rollback();
            Log::info($e);
            return [false, $e->getMessage()];
        }
    }
}
