<?php

namespace App\Services;

use App\Services\AapaleSarkarLoginCheckService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use App\Models\Cfc;
use App\Models\ServiceCredential;

class CFCService
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
        $request['service_id'] = "2018";
        $request['application_no'] = "PMC-" . time();
        if ($request->hasFile('upload_prescribed_formats')) {
            $request['gumasta_certificate'] = $request->upload_prescribed_formats->store('cfc');
        }

        if ($request->hasFile('aadhar_pans')) {
            $request['aadhar_pan'] = $request->aadhar_pans->store('cfc');
        }
        if ($request->hasFile('ownership')) {
            $request['land_ownership'] = $request->ownership->store('cfc');
        }

        if ($request->hasFile('water_bills')) {
            $request['water_bill'] = $request->water_bills->store('cfc');
        }

        if ($request->hasFile('society')) {
            $request['no_objection_certificate'] = $request->society->store('cfc');
        }

        if ($request->hasFile('place')) {
            $request['photo_of_place'] = $request->place->store('cfc');
        }

        if ($request->hasFile('property')) {
            $request['property_tax'] = $request->property->store('cfc');
        }

        if ($request->hasFile('tenancy')) {
            $request['tenancy_agreement'] = $request->tenancy->store('cfc');
        }

        if ($request->hasFile('occupancy')) {
            $request['site_occupancy'] = $request->occupancy->store('cfc');
        }

        if ($request->hasFile('medical')) {
            $request['medical_certificate'] = $request->medical->store('cfc');
        }

        if ($request->hasFile('control')) {
            $request['pest_control'] = $request->control->store('cfc');
        }

        if ($request->hasFile('registration')) {
            $request['gst_registration'] = $request->registration->store('cfc');
        }

        if ($request->hasFile('food')) {
            $request['drug_administration'] = $request->food->store('cfc');
        }

        if ($request->hasFile('fire')) {
            $request['fire_rigade'] = $request->fire->store('cfc');
        }

        if ($request->hasFile('liquor')) {
            $request['liquor_license'] = $request->liquor->store('cfc');
        }

        $cfc = CFC::create($request->all());

        if ($cfc) {
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
        return CFC::find($id);
    }

    public function update($request, $id)
    {
        // dd($request->all());
        DB::beginTransaction();
        try {
            // Find the existing record
            $cfc = CFC::find($id);

            // Handle file uploads and update original file names


            if ($request->hasFile('upload_prescribed_formats')) {
                if ($cfc && $cfc->gumasta_certificate && Storage::exists($cfc->gumasta_certificate)) {
                    Storage::delete($cfc->gumasta_certificate);
                }
                $request['gumasta_certificate'] = $request->upload_prescribed_formats->store('cfc');
            }

            if ($request->hasFile('aadhar_pans')) {
                if ($cfc && $cfc->aadhar_pan && Storage::exists($cfc->aadhar_pan)) {
                    Storage::delete($cfc->aadhar_pan);
                }
                $request['aadhar_pan'] = $request->aadhar_pans->store('cfc');
            }

            if ($request->hasFile('ownership')) {
                if ($cfc && $cfc->land_ownership && Storage::exists($cfc->land_ownership)) {
                    Storage::delete($cfc->land_ownership);
                }
                $request['land_ownership'] = $request->ownership->store('cfc');
            }

            if ($request->hasFile('water_bills')) {
                if ($cfc && $cfc->water_bill && Storage::exists($cfc->water_bill)) {
                    Storage::delete($cfc->water_bill);
                }
                $request['water_bill'] = $request->water_bills->store('cfc');
            }


            if ($request->hasFile('society')) {
                if ($cfc && $cfc->no_objection_certificate && Storage::exists($cfc->no_objection_certificate)) {
                    Storage::delete($cfc->no_objection_certificate);
                }
                $request['no_objection_certificate'] = $request->society->store('cfc');
            }

            if ($request->hasFile('place')) {
                if ($cfc && $cfc->photo_of_place && Storage::exists($cfc->photo_of_place)) {
                    Storage::delete($cfc->photo_of_place);
                }
                $request['photo_of_place'] = $request->place->store('cfc');
            }

            if ($request->hasFile('property')) {
                if ($cfc && $cfc->property_tax && Storage::exists($cfc->property_tax)) {
                    Storage::delete($cfc->property_tax);
                }
                $request['property_tax'] = $request->property->store('cfc');
            }

            if ($request->hasFile('tenancy')) {
                if ($cfc && $cfc->tenancy_agreement && Storage::exists($cfc->tenancy_agreement)) {
                    Storage::delete($cfc->tenancy_agreement);
                }
                $request['tenancy_agreement'] = $request->tenancy->store('cfc');
            }

            if ($request->hasFile('occupancy')) {
                if ($cfc && $cfc->site_occupancy && Storage::exists($cfc->site_occupancy)) {
                    Storage::delete($cfc->site_occupancy);
                }
                $request['site_occupancy'] = $request->occupancy->store('cfc');
            }


            if ($request->hasFile('medical')) {
                if ($cfc && $cfc->medical_certificate && Storage::exists($cfc->medical_certificate)) {
                    Storage::delete($cfc->medical_certificate);
                }
                $request['medical_certificate'] = $request->medical->store('cfc');
            }

            if ($request->hasFile('control')) {
                if ($cfc && $cfc->pest_control && Storage::exists($cfc->pest_control)) {
                    Storage::delete($cfc->pest_control);
                }
                $request['pest_control'] = $request->control->store('cfc');
            }

            if ($request->hasFile('registration')) {
                if ($cfc && $cfc->gst_registration && Storage::exists($cfc->gst_registration)) {
                    Storage::delete($cfc->gst_registration);
                }
                $request['gst_registration'] = $request->registration->store('cfc');
            }

            if ($request->hasFile('food')) {
                if ($cfc && $cfc->drug_administration && Storage::exists($cfc->drug_administration)) {
                    Storage::delete($cfc->drug_administration);
                }
                $request['drug_administration'] = $request->food->store('cfc');
            }

            if ($request->hasFile('fire')) {
                if ($cfc && $cfc->fire_rigade && Storage::exists($cfc->fire_rigade)) {
                    Storage::delete($cfc->fire_rigade);
                }
                $request['fire_rigade'] = $request->fire->store('cfc');
            }

            if ($request->hasFile('liquor')) {
                if ($cfc && $cfc->liquor_license && Storage::exists($cfc->liquor_license)) {
                    Storage::delete($cfc->liquor_license);
                }
                $request['liquor_license'] = $request->liquor->store('cfc');
            }



            // Update the rest of the fields
            $cfc->update($request->all());

            DB::commit();
            return [true];
        } catch (\Exception $e) {
            DB::rollback();
            Log::info($e);
            return [false, $e->getMessage()];
        }
    }
}
