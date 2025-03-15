<?php

namespace App\Services;

use App\Services\AapaleSarkarLoginCheckService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use App\Models\HealthNocMunci;
use App\Models\ServiceCredential;

class HealthNocMuniciService
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
        $request['service_id'] = "2016";
        $request['application_no'] = "PMC-" . time();
        if ($request->hasFile('upload_prescribed_formats')) {
            $request['gumasta_certificate'] = $request->upload_prescribed_formats->store('healthnoc-munici');
        }

        if ($request->hasFile('aadhar_pans')) {
            $request['aadhar_pan'] = $request->aadhar_pans->store('healthnoc-munici');
        }
        if ($request->hasFile('ownership')) {
            $request['land_ownership'] = $request->ownership->store('healthnoc-munici');
        }

        if ($request->hasFile('water_bills')) {
            $request['water_bill'] = $request->water_bills->store('healthnoc-munici');
        }

        if ($request->hasFile('society')) {
            $request['no_objection_certificate'] = $request->society->store('healthnoc-munici');
        }

        if ($request->hasFile('place')) {
            $request['photo_of_place'] = $request->place->store('healthnoc-munici');
        }

        if ($request->hasFile('property')) {
            $request['property_tax'] = $request->property->store('healthnoc-munici');
        }

        if ($request->hasFile('tenancy')) {
            $request['tenancy_agreement'] = $request->tenancy->store('healthnoc-munici');
        }

        if ($request->hasFile('occupancy')) {
            $request['site_occupancy'] = $request->occupancy->store('healthnoc-munici');
        }

        if ($request->hasFile('medical')) {
            $request['medical_certificate'] = $request->medical->store('healthnoc-munici');
        }

        if ($request->hasFile('control')) {
            $request['pest_control'] = $request->control->store('healthnoc-munici');
        }

        if ($request->hasFile('registration')) {
            $request['gst_registration'] = $request->registration->store('healthnoc-munici');
        }

        if ($request->hasFile('food')) {
            $request['drug_administration'] = $request->food->store('healthnoc-munici');
        }

        if ($request->hasFile('fire')) {
            $request['fire_rigade'] = $request->fire->store('healthnoc-munici');
        }

        if ($request->hasFile('liquor')) {
            $request['liquor_license'] = $request->liquor->store('healthnoc-munici');
        }

        $healthliciensemunici = HealthNocMunci::create($request->all());

        if ($healthliciensemunici) {
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
        return HealthNocMunci::find($id);
    }

    public function update($request, $id)
    {
        // dd($request->all());
        DB::beginTransaction();
        try {
            // Find the existing record
            $healthliciensemunici = HealthNocMunci::find($id);

            // Handle file uploads and update original file names


            if ($request->hasFile('upload_prescribed_formats')) {
                if ($healthliciensemunici && $healthliciensemunici->gumasta_certificate && Storage::exists($healthliciensemunici->gumasta_certificate)) {
                    Storage::delete($healthliciensemunici->gumasta_certificate);
                }
                $request['gumasta_certificate'] = $request->upload_prescribed_formats->store('healthnoc-munici');
            }

            if ($request->hasFile('aadhar_pans')) {
                if ($healthliciensemunici && $healthliciensemunici->aadhar_pan && Storage::exists($healthliciensemunici->aadhar_pan)) {
                    Storage::delete($healthliciensemunici->aadhar_pan);
                }
                $request['aadhar_pan'] = $request->aadhar_pans->store('healthnoc-munici');
            }

            if ($request->hasFile('ownership')) {
                if ($healthliciensemunici && $healthliciensemunici->land_ownership && Storage::exists($healthliciensemunici->land_ownership)) {
                    Storage::delete($healthliciensemunici->land_ownership);
                }
                $request['land_ownership'] = $request->ownership->store('healthnoc-munici');
            }

            if ($request->hasFile('water_bills')) {
                if ($healthliciensemunici && $healthliciensemunici->water_bill && Storage::exists($healthliciensemunici->water_bill)) {
                    Storage::delete($healthliciensemunici->water_bill);
                }
                $request['water_bill'] = $request->water_bills->store('healthnoc-munici');
            }


            if ($request->hasFile('society')) {
                if ($healthliciensemunici && $healthliciensemunici->no_objection_certificate && Storage::exists($healthliciensemunici->no_objection_certificate)) {
                    Storage::delete($healthliciensemunici->no_objection_certificate);
                }
                $request['no_objection_certificate'] = $request->society->store('healthnoc-munici');
            }

            if ($request->hasFile('place')) {
                if ($healthliciensemunici && $healthliciensemunici->photo_of_place && Storage::exists($healthliciensemunici->photo_of_place)) {
                    Storage::delete($healthliciensemunici->photo_of_place);
                }
                $request['photo_of_place'] = $request->place->store('healthnoc-munici');
            }

            if ($request->hasFile('property')) {
                if ($healthliciensemunici && $healthliciensemunici->property_tax && Storage::exists($healthliciensemunici->property_tax)) {
                    Storage::delete($healthliciensemunici->property_tax);
                }
                $request['property_tax'] = $request->property->store('healthnoc-munici');
            }

            if ($request->hasFile('tenancy')) {
                if ($healthliciensemunici && $healthliciensemunici->tenancy_agreement && Storage::exists($healthliciensemunici->tenancy_agreement)) {
                    Storage::delete($healthliciensemunici->tenancy_agreement);
                }
                $request['tenancy_agreement'] = $request->tenancy->store('healthnoc-munici');
            }

            if ($request->hasFile('occupancy')) {
                if ($healthliciensemunici && $healthliciensemunici->site_occupancy && Storage::exists($healthliciensemunici->site_occupancy)) {
                    Storage::delete($healthliciensemunici->site_occupancy);
                }
                $request['site_occupancy'] = $request->occupancy->store('healthnoc-munici');
            }


            if ($request->hasFile('medical')) {
                if ($healthliciensemunici && $healthliciensemunici->medical_certificate && Storage::exists($healthliciensemunici->medical_certificate)) {
                    Storage::delete($healthliciensemunici->medical_certificate);
                }
                $request['medical_certificate'] = $request->medical->store('healthnoc-munici');
            }

            if ($request->hasFile('control')) {
                if ($healthliciensemunici && $healthliciensemunici->pest_control && Storage::exists($healthliciensemunici->pest_control)) {
                    Storage::delete($healthliciensemunici->pest_control);
                }
                $request['pest_control'] = $request->control->store('healthnoc-munici');
            }

            if ($request->hasFile('registration')) {
                if ($healthliciensemunici && $healthliciensemunici->gst_registration && Storage::exists($healthliciensemunici->gst_registration)) {
                    Storage::delete($healthliciensemunici->gst_registration);
                }
                $request['gst_registration'] = $request->registration->store('healthnoc-munici');
            }

            if ($request->hasFile('food')) {
                if ($healthliciensemunici && $healthliciensemunici->drug_administration && Storage::exists($healthliciensemunici->drug_administration)) {
                    Storage::delete($healthliciensemunici->drug_administration);
                }
                $request['drug_administration'] = $request->food->store('healthnoc-munici');
            }

            if ($request->hasFile('fire')) {
                if ($healthliciensemunici && $healthliciensemunici->fire_rigade && Storage::exists($healthliciensemunici->fire_rigade)) {
                    Storage::delete($healthliciensemunici->fire_rigade);
                }
                $request['fire_rigade'] = $request->fire->store('healthnoc-munici');
            }

            if ($request->hasFile('liquor')) {
                if ($healthliciensemunici && $healthliciensemunici->liquor_license && Storage::exists($healthliciensemunici->liquor_license)) {
                    Storage::delete($healthliciensemunici->liquor_license);
                }
                $request['liquor_license'] = $request->liquor->store('healthnoc-munici');
            }



            // Update the rest of the fields
            $healthliciensemunici->update($request->all());

            DB::commit();
            return [true];
        } catch (\Exception $e) {
            DB::rollback();
            Log::info($e);
            return [false, $e->getMessage()];
        }
    }
}
