<?php

namespace App\Services;

use App\Services\AapaleSarkarLoginCheckService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use App\Models\StateLicense;
use App\Models\ServiceCredential;

class StateLicenseService
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
        $request['service_id'] = "2015";
        $request['application_no'] = "PMC-" . time();

        if ($request->hasFile('upload_prescribed_formats')) {
            $request['gumasta_certificate'] = $request->upload_prescribed_formats->store('state-license');
        }

        if ($request->hasFile('aadhar_pans')) {
            $request['aadhar_pan'] = $request->aadhar_pans->store('state-license');
        }
        if ($request->hasFile('ownership')) {
            $request['land_ownership'] = $request->ownership->store('state-license');
        }

        if ($request->hasFile('water_bills')) {
            $request['water_bill'] = $request->water_bills->store('state-license');
        }

        if ($request->hasFile('society')) {
            $request['no_objection_certificate'] = $request->society->store('state-license');
        }

        if ($request->hasFile('place')) {
            $request['photo_of_place'] = $request->place->store('state-license');
        }

        if ($request->hasFile('property')) {
            $request['property_tax'] = $request->property->store('state-license');
        }

        if ($request->hasFile('tenancy')) {
            $request['tenancy_agreement'] = $request->tenancy->store('state-license');
        }

        if ($request->hasFile('occupancy')) {
            $request['site_occupancy'] = $request->occupancy->store('state-license');
        }

        if ($request->hasFile('medical')) {
            $request['medical_certificate'] = $request->medical->store('state-license');
        }

        if ($request->hasFile('control')) {
            $request['pest_control'] = $request->control->store('state-license');
        }

        if ($request->hasFile('registration')) {
            $request['gst_registration'] = $request->registration->store('state-license');
        }

        if ($request->hasFile('food')) {
            $request['drug_administration'] = $request->food->store('state-license');
        }

        if ($request->hasFile('fire')) {
            $request['fire_rigade'] = $request->fire->store('state-license');
        }

        if ($request->hasFile('liquor')) {
            $request['liquor_license'] = $request->liquor->store('state-license');
        }
        // dd($request->all());
        $statelicenseservice = StateLicense::create($request->all());

        if ($statelicenseservice) {
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
        return StateLicense::find($id);
    }

    public function update($request, $id)
    {
        DB::beginTransaction();
        try {
            // Find the existing record
            $statelicenseservice = StateLicense::findOrFail($id);

            // Handle file uploads and update original file names

            if ($request->hasFile('upload_prescribed_formats')) {
                if ($statelicenseservice &&  $statelicenseservice->gumasta_certificate &&  $statelicenseservice->gumasta_certificate && Storage::exists($statelicenseservice->gumasta_certificate)) {
                    Storage::delete($statelicenseservice->gumasta_certificate);
                }
                $request['gumasta_certificate'] = $request->upload_prescribed_formats->store('state-license');
            }

            if ($request->hasFile('aadhar_pans')) {
                if ($statelicenseservice &&  $statelicenseservice->aadhar_pan && Storage::exists($statelicenseservice->aadhar_pan)) {
                    Storage::delete($statelicenseservice->aadhar_pan);
                }
                $request['aadhar_pan'] = $request->aadhar_pans->store('state-license');
            }

            if ($request->hasFile('ownership')) {
                if ($statelicenseservice &&  $statelicenseservice->land_ownership && Storage::exists($statelicenseservice->land_ownership)) {
                    Storage::delete($statelicenseservice->land_ownership);
                }
                $request['land_ownership'] = $request->ownership->store('state-license');
            }


            if ($request->hasFile('water_bills')) {
                if ($statelicenseservice &&  $statelicenseservice->water_bill && Storage::exists($statelicenseservice->water_bill)) {
                    Storage::delete($statelicenseservice->water_bill);
                }
                $request['water_bill'] = $request->water_bills->store('state-license');
            }


            if ($request->hasFile('society')) {
                if ($statelicenseservice &&  $statelicenseservice->no_objection_certificate && Storage::exists($statelicenseservice->no_objection_certificate)) {
                    Storage::delete($statelicenseservice->no_objection_certificate);
                }
                $request['no_objection_certificate'] = $request->society->store('state-license');
            }


            if ($request->hasFile('place')) {
                if ($statelicenseservice &&  $statelicenseservice->photo_of_place && Storage::exists($statelicenseservice->photo_of_place)) {
                    Storage::delete($statelicenseservice->photo_of_place);
                }
                $request['photo_of_place'] = $request->place->store('state-license');
            }

            if ($request->hasFile('property')) {
                if ($statelicenseservice &&  $statelicenseservice->property_tax && Storage::exists($statelicenseservice->property_tax)) {
                    Storage::delete($statelicenseservice->property_tax);
                }
                $request['property_tax'] = $request->property->store('state-license');
            }

            if ($request->hasFile('tenancy')) {
                if ($statelicenseservice &&  $statelicenseservice->tenancy_agreement && Storage::exists($statelicenseservice->tenancy_agreement)) {
                    Storage::delete($statelicenseservice->tenancy_agreement);
                }
                $request['tenancy_agreement'] = $request->tenancy->store('state-license');
            }




            if ($request->hasFile('occupancy')) {
                if ($statelicenseservice &&  $statelicenseservice->site_occupancy && Storage::exists($statelicenseservice->site_occupancy)) {
                    Storage::delete($statelicenseservice->site_occupancy);
                }
                $request['site_occupancy'] = $request->occupancy->store('state-license');
            }

            if ($request->hasFile('medical')) {
                if ($statelicenseservice &&  $statelicenseservice->medical_certificate && Storage::exists($statelicenseservice->medical_certificate)) {
                    Storage::delete($statelicenseservice->medical_certificate);
                }
                $request['medical_certificate'] = $request->medical->store('state-license');
            }

            if ($request->hasFile('control')) {
                if ($statelicenseservice &&  $statelicenseservice->pest_control && Storage::exists($statelicenseservice->pest_control)) {
                    Storage::delete($statelicenseservice->pest_control);
                }
                $request['pest_control'] = $request->control->store('state-license');
            }


            if ($request->hasFile('registration')) {
                if ($statelicenseservice &&  $statelicenseservice->gst_registration && Storage::exists($statelicenseservice->gst_registration)) {
                    Storage::delete($statelicenseservice->gst_registration);
                }
                $request['gst_registration'] = $request->registration->store('state-license');
            }

            if ($request->hasFile('food')) {
                if ($statelicenseservice &&  $statelicenseservice->drug_administration && Storage::exists($statelicenseservice->drug_administration)) {
                    Storage::delete($statelicenseservice->drug_administration);
                }
                $request['drug_administration'] = $request->food->store('state-license');
            }


            if ($request->hasFile('fire')) {
                if ($statelicenseservice &&  $statelicenseservice->fire_rigade && Storage::exists($statelicenseservice->fire_rigade)) {
                    Storage::delete($statelicenseservice->fire_rigade);
                }
                $request['fire_rigade'] = $request->fire->store('state-license');
            }


            if ($request->hasFile('liquor')) {
                if ($statelicenseservice &&  $statelicenseservice->liquor_license && Storage::exists($statelicenseservice->liquor_license)) {
                    Storage::delete($statelicenseservice->liquor_license);
                }
                $request['liquor_license'] = $request->liquor->store('state-license');
            }


            // Update the rest of the fields
            $statelicenseservice->update($request->all());

            DB::commit();
            return [true];
        } catch (\Exception $e) {
            DB::rollback();
            Log::error('Error in update method: ' . $e->getMessage());
            return [false, $e->getMessage()];
        }
    }
}
