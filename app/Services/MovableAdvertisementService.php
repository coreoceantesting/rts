<?php

namespace App\Services;

use App\Services\AapaleSarkarLoginCheckService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use App\Models\MovableAdvertisementPermission;
use App\Models\ServiceCredential;

class MovableAdvertisementService
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
        $request['service_id'] = "2017";
        $request['application_no'] = "PMC-" . time();

        if ($request->hasFile('upload_prescribed_formats')) {
            $request['gumasta_certificate'] = $request->upload_prescribed_formats->store('movable-advertisement');
        }

        if ($request->hasFile('aadhar_pans')) {
            $request['aadhar_pan'] = $request->aadhar_pans->store('movable-advertisement');
        }
        if ($request->hasFile('ownership')) {
            $request['land_ownership'] = $request->ownership->store('movable-advertisement');
        }

        if ($request->hasFile('water_bills')) {
            $request['water_bill'] = $request->water_bills->store('movable-advertisement');
        }

        if ($request->hasFile('society')) {
            $request['no_objection_certificate'] = $request->society->store('movable-advertisement');
        }

        if ($request->hasFile('place')) {
            $request['photo_of_place'] = $request->place->store('movable-advertisement');
        }

        if ($request->hasFile('property')) {
            $request['property_tax'] = $request->property->store('movable-advertisement');
        }

        if ($request->hasFile('tenancy')) {
            $request['tenancy_agreement'] = $request->tenancy->store('movable-advertisement');
        }

        if ($request->hasFile('occupancy')) {
            $request['site_occupancy'] = $request->occupancy->store('movable-advertisement');
        }

        if ($request->hasFile('medical')) {
            $request['medical_certificate'] = $request->medical->store('movable-advertisement');
        }

        if ($request->hasFile('control')) {
            $request['pest_control'] = $request->control->store('movable-advertisement');
        }

        if ($request->hasFile('registration')) {
            $request['gst_registration'] = $request->registration->store('movable-advertisement');
        }

        if ($request->hasFile('food')) {
            $request['drug_administration'] = $request->food->store('movable-advertisement');
        }

        if ($request->hasFile('fire')) {
            $request['fire_rigade'] = $request->fire->store('movable-advertisement');
        }

        if ($request->hasFile('liquor')) {
            $request['liquor_license'] = $request->liquor->store('movable-advertisement');
        }
        // dd($request->all());
        $movableadver = MovableAdvertisementPermission::create($request->all());

        if ($movableadver) {
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
        return MovableAdvertisementPermission::find($id);
    }

    public function update($request, $id)
    {
        DB::beginTransaction();
        try {
            // Find the existing record
            $movableadver = MovableAdvertisementPermission::findOrFail($id);

            // Handle file uploads and update original file names

            if ($request->hasFile('upload_prescribed_formats')) {
                if ($movableadver &&  $movableadver->gumasta_certificate &&  $movableadver->gumasta_certificate && Storage::exists($movableadver->gumasta_certificate)) {
                    Storage::delete($movableadver->gumasta_certificate);
                }
                $request['gumasta_certificate'] = $request->upload_prescribed_formats->store('movable-advertisement');
            }

            if ($request->hasFile('aadhar_pans')) {
                if ($movableadver &&  $movableadver->aadhar_pan && Storage::exists($movableadver->aadhar_pan)) {
                    Storage::delete($movableadver->aadhar_pan);
                }
                $request['aadhar_pan'] = $request->aadhar_pans->store('movable-advertisement');
            }

            if ($request->hasFile('ownership')) {
                if ($movableadver &&  $movableadver->land_ownership && Storage::exists($movableadver->land_ownership)) {
                    Storage::delete($movableadver->land_ownership);
                }
                $request['land_ownership'] = $request->ownership->store('movable-advertisement');
            }


            if ($request->hasFile('water_bills')) {
                if ($movableadver &&  $movableadver->water_bill && Storage::exists($movableadver->water_bill)) {
                    Storage::delete($movableadver->water_bill);
                }
                $request['water_bill'] = $request->water_bills->store('movable-advertisement');
            }


            if ($request->hasFile('society')) {
                if ($movableadver &&  $movableadver->no_objection_certificate && Storage::exists($movableadver->no_objection_certificate)) {
                    Storage::delete($movableadver->no_objection_certificate);
                }
                $request['no_objection_certificate'] = $request->society->store('movable-advertisement');
            }


            if ($request->hasFile('place')) {
                if ($movableadver &&  $movableadver->photo_of_place && Storage::exists($movableadver->photo_of_place)) {
                    Storage::delete($movableadver->photo_of_place);
                }
                $request['photo_of_place'] = $request->place->store('movable-advertisement');
            }

            if ($request->hasFile('property')) {
                if ($movableadver &&  $movableadver->property_tax && Storage::exists($movableadver->property_tax)) {
                    Storage::delete($movableadver->property_tax);
                }
                $request['property_tax'] = $request->property->store('movable-advertisement');
            }

            if ($request->hasFile('tenancy')) {
                if ($movableadver &&  $movableadver->tenancy_agreement && Storage::exists($movableadver->tenancy_agreement)) {
                    Storage::delete($movableadver->tenancy_agreement);
                }
                $request['tenancy_agreement'] = $request->tenancy->store('movable-advertisement');
            }




            if ($request->hasFile('occupancy')) {
                if ($movableadver &&  $movableadver->site_occupancy && Storage::exists($movableadver->site_occupancy)) {
                    Storage::delete($movableadver->site_occupancy);
                }
                $request['site_occupancy'] = $request->occupancy->store('movable-advertisement');
            }

            if ($request->hasFile('medical')) {
                if ($movableadver &&  $movableadver->medical_certificate && Storage::exists($movableadver->medical_certificate)) {
                    Storage::delete($movableadver->medical_certificate);
                }
                $request['medical_certificate'] = $request->medical->store('movable-advertisement');
            }

            if ($request->hasFile('control')) {
                if ($movableadver &&  $movableadver->pest_control && Storage::exists($movableadver->pest_control)) {
                    Storage::delete($movableadver->pest_control);
                }
                $request['pest_control'] = $request->control->store('movable-advertisement');
            }


            if ($request->hasFile('registration')) {
                if ($movableadver &&  $movableadver->gst_registration && Storage::exists($movableadver->gst_registration)) {
                    Storage::delete($movableadver->gst_registration);
                }
                $request['gst_registration'] = $request->registration->store('movable-advertisement');
            }

            if ($request->hasFile('food')) {
                if ($movableadver &&  $movableadver->drug_administration && Storage::exists($movableadver->drug_administration)) {
                    Storage::delete($movableadver->drug_administration);
                }
                $request['drug_administration'] = $request->food->store('movable-advertisement');
            }


            if ($request->hasFile('fire')) {
                if ($movableadver &&  $movableadver->fire_rigade && Storage::exists($movableadver->fire_rigade)) {
                    Storage::delete($movableadver->fire_rigade);
                }
                $request['fire_rigade'] = $request->fire->store('movable-advertisement');
            }


            if ($request->hasFile('liquor')) {
                if ($movableadver &&  $movableadver->liquor_license && Storage::exists($movableadver->liquor_license)) {
                    Storage::delete($movableadver->liquor_license);
                }
                $request['liquor_license'] = $request->liquor->store('movable-advertisement');
            }


            // Update the rest of the fields
            $movableadver->update($request->all());

            DB::commit();
            return [true];
        } catch (\Exception $e) {
            DB::rollback();
            Log::error('Error in update method: ' . $e->getMessage());
            return [false, $e->getMessage()];
        }
    }
}
