<?php

namespace App\Services;

use App\Services\AapaleSarkarLoginCheckService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use App\Models\ParkCulturePermission;
use App\Models\ServiceCredential;

class ParkCultureService
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
        $request['service_id'] = "2006";
        $request['application_no'] = "PMC-" . time();

        if ($request->hasFile('upload_prescribed_formats')) {
            $request['gumasta_certificate'] = $request->upload_prescribed_formats->store('park-culture');
        }

        if ($request->hasFile('aadhar_pans')) {
            $request['aadhar_pan'] = $request->aadhar_pans->store('park-culture');
        }
        if ($request->hasFile('ownership')) {
            $request['land_ownership'] = $request->ownership->store('park-culture');
        }

        if ($request->hasFile('water_bills')) {
            $request['water_bill'] = $request->water_bills->store('park-culture');
        }

        if ($request->hasFile('society')) {
            $request['no_objection_certificate'] = $request->society->store('park-culture');
        }

        if ($request->hasFile('place')) {
            $request['photo_of_place'] = $request->place->store('park-culture');
        }

        if ($request->hasFile('property')) {
            $request['property_tax'] = $request->property->store('park-culture');
        }

        if ($request->hasFile('tenancy')) {
            $request['tenancy_agreement'] = $request->tenancy->store('park-culture');
        }

        if ($request->hasFile('occupancy')) {
            $request['site_occupancy'] = $request->occupancy->store('park-culture');
        }

        if ($request->hasFile('medical')) {
            $request['medical_certificate'] = $request->medical->store('park-culture');
        }

        if ($request->hasFile('control')) {
            $request['pest_control'] = $request->control->store('park-culture');
        }

        if ($request->hasFile('registration')) {
            $request['gst_registration'] = $request->registration->store('park-culture');
        }

        if ($request->hasFile('food')) {
            $request['drug_administration'] = $request->food->store('park-culture');
        }

        if ($request->hasFile('fire')) {
            $request['fire_rigade'] = $request->fire->store('park-culture');
        }

        if ($request->hasFile('liquor')) {
            $request['liquor_license'] = $request->liquor->store('park-culture');
        }
        // dd($request->all());
        $ParkCultureService = ParkCulturePermission::create($request->all());

        if ($ParkCultureService) {
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
        return ParkCulturePermission::find($id);
    }

    public function update($request, $id)
    {
        DB::beginTransaction();
        try {
            // Find the existing record
            $ParkCultureService = ParkCulturePermission::findOrFail($id);

            // Handle file uploads and update original file names

            if ($request->hasFile('upload_prescribed_formats')) {
                if ($ParkCultureService &&  $ParkCultureService->gumasta_certificate &&  $ParkCultureService->gumasta_certificate && Storage::exists($ParkCultureService->gumasta_certificate)) {
                    Storage::delete($ParkCultureService->gumasta_certificate);
                }
                $request['gumasta_certificate'] = $request->upload_prescribed_formats->store('park-culture');
            }

            if ($request->hasFile('aadhar_pans')) {
                if ($ParkCultureService &&  $ParkCultureService->aadhar_pan && Storage::exists($ParkCultureService->aadhar_pan)) {
                    Storage::delete($ParkCultureService->aadhar_pan);
                }
                $request['aadhar_pan'] = $request->aadhar_pans->store('park-culture');
            }

            if ($request->hasFile('ownership')) {
                if ($ParkCultureService &&  $ParkCultureService->land_ownership && Storage::exists($ParkCultureService->land_ownership)) {
                    Storage::delete($ParkCultureService->land_ownership);
                }
                $request['land_ownership'] = $request->ownership->store('park-culture');
            }


            if ($request->hasFile('water_bills')) {
                if ($ParkCultureService &&  $ParkCultureService->water_bill && Storage::exists($ParkCultureService->water_bill)) {
                    Storage::delete($ParkCultureService->water_bill);
                }
                $request['water_bill'] = $request->water_bills->store('park-culture');
            }


            if ($request->hasFile('society')) {
                if ($ParkCultureService &&  $ParkCultureService->no_objection_certificate && Storage::exists($ParkCultureService->no_objection_certificate)) {
                    Storage::delete($ParkCultureService->no_objection_certificate);
                }
                $request['no_objection_certificate'] = $request->society->store('park-culture');
            }


            if ($request->hasFile('place')) {
                if ($ParkCultureService &&  $ParkCultureService->photo_of_place && Storage::exists($ParkCultureService->photo_of_place)) {
                    Storage::delete($ParkCultureService->photo_of_place);
                }
                $request['photo_of_place'] = $request->place->store('park-culture');
            }

            if ($request->hasFile('property')) {
                if ($ParkCultureService &&  $ParkCultureService->property_tax && Storage::exists($ParkCultureService->property_tax)) {
                    Storage::delete($ParkCultureService->property_tax);
                }
                $request['property_tax'] = $request->property->store('park-culture');
            }

            if ($request->hasFile('tenancy')) {
                if ($ParkCultureService &&  $ParkCultureService->tenancy_agreement && Storage::exists($ParkCultureService->tenancy_agreement)) {
                    Storage::delete($ParkCultureService->tenancy_agreement);
                }
                $request['tenancy_agreement'] = $request->tenancy->store('park-culture');
            }




            if ($request->hasFile('occupancy')) {
                if ($ParkCultureService &&  $ParkCultureService->site_occupancy && Storage::exists($ParkCultureService->site_occupancy)) {
                    Storage::delete($ParkCultureService->site_occupancy);
                }
                $request['site_occupancy'] = $request->occupancy->store('park-culture');
            }

            if ($request->hasFile('medical')) {
                if ($ParkCultureService &&  $ParkCultureService->medical_certificate && Storage::exists($ParkCultureService->medical_certificate)) {
                    Storage::delete($ParkCultureService->medical_certificate);
                }
                $request['medical_certificate'] = $request->medical->store('park-culture');
            }

            if ($request->hasFile('control')) {
                if ($ParkCultureService &&  $ParkCultureService->pest_control && Storage::exists($ParkCultureService->pest_control)) {
                    Storage::delete($ParkCultureService->pest_control);
                }
                $request['pest_control'] = $request->control->store('park-culture');
            }


            if ($request->hasFile('registration')) {
                if ($ParkCultureService &&  $ParkCultureService->gst_registration && Storage::exists($ParkCultureService->gst_registration)) {
                    Storage::delete($ParkCultureService->gst_registration);
                }
                $request['gst_registration'] = $request->registration->store('park-culture');
            }

            if ($request->hasFile('food')) {
                if ($ParkCultureService &&  $ParkCultureService->drug_administration && Storage::exists($ParkCultureService->drug_administration)) {
                    Storage::delete($ParkCultureService->drug_administration);
                }
                $request['drug_administration'] = $request->food->store('park-culture');
            }


            if ($request->hasFile('fire')) {
                if ($ParkCultureService &&  $ParkCultureService->fire_rigade && Storage::exists($ParkCultureService->fire_rigade)) {
                    Storage::delete($ParkCultureService->fire_rigade);
                }
                $request['fire_rigade'] = $request->fire->store('park-culture');
            }


            if ($request->hasFile('liquor')) {
                if ($ParkCultureService &&  $ParkCultureService->liquor_license && Storage::exists($ParkCultureService->liquor_license)) {
                    Storage::delete($ParkCultureService->liquor_license);
                }
                $request['liquor_license'] = $request->liquor->store('park-culture');
            }


            // Update the rest of the fields
            $ParkCultureService->update($request->all());

            DB::commit();
            return [true];
        } catch (\Exception $e) {
            DB::rollback();
            Log::error('Error in update method: ' . $e->getMessage());
            return [false, $e->getMessage()];
        }
    }
}
