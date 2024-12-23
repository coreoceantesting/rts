<?php

namespace App\Services;

use App\Services\AapaleSarkarLoginCheckService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use App\Models\MobileTower;
use App\Models\ServiceCredential;

class MobileTowerService
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
        $request['service_id'] = "2014";
        $request['application_no'] = "PMC-" . time();

        if ($request->hasFile('upload_prescribed_formats')) {
            $request['gumasta_certificate'] = $request->upload_prescribed_formats->store('mobile-tower');
        }

        if ($request->hasFile('aadhar_pans')) {
            $request['aadhar_pan'] = $request->aadhar_pans->store('mobile-tower');
        }
        if ($request->hasFile('ownership')) {
            $request['land_ownership'] = $request->ownership->store('mobile-tower');
        }

        if ($request->hasFile('water_bills')) {
            $request['water_bill'] = $request->water_bills->store('mobile-tower');
        }

        if ($request->hasFile('society')) {
            $request['no_objection_certificate'] = $request->society->store('mobile-tower');
        }

        if ($request->hasFile('place')) {
            $request['photo_of_place'] = $request->place->store('mobile-tower');
        }

        if ($request->hasFile('property')) {
            $request['property_tax'] = $request->property->store('mobile-tower');
        }

        if ($request->hasFile('tenancy')) {
            $request['tenancy_agreement'] = $request->tenancy->store('mobile-tower');
        }

        if ($request->hasFile('occupancy')) {
            $request['site_occupancy'] = $request->occupancy->store('mobile-tower');
        }

        if ($request->hasFile('medical')) {
            $request['medical_certificate'] = $request->medical->store('mobile-tower');
        }

        if ($request->hasFile('control')) {
            $request['pest_control'] = $request->control->store('mobile-tower');
        }

        if ($request->hasFile('registration')) {
            $request['gst_registration'] = $request->registration->store('mobile-tower');
        }

        if ($request->hasFile('food')) {
            $request['drug_administration'] = $request->food->store('mobile-tower');
        }

        if ($request->hasFile('fire')) {
            $request['fire_rigade'] = $request->fire->store('mobile-tower');
        }

        if ($request->hasFile('liquor')) {
            $request['liquor_license'] = $request->liquor->store('mobile-tower');
        }
        // dd($request->all());
        $mobiletowerservice = mobileTower::create($request->all());

        if ($mobiletowerservice) {
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
        return mobileTower::find($id);
    }

    public function update($request, $id)
    {
        DB::beginTransaction();
        try {
            // Find the existing record
            $mobiletowerservice = mobileTower::findOrFail($id);

            // Handle file uploads and update original file names

            if ($request->hasFile('upload_prescribed_formats')) {
                if ($mobiletowerservice &&  $mobiletowerservice->gumasta_certificate &&  $mobiletowerservice->gumasta_certificate && Storage::exists($mobiletowerservice->gumasta_certificate)) {
                    Storage::delete($mobiletowerservice->gumasta_certificate);
                }
                $request['gumasta_certificate'] = $request->upload_prescribed_formats->store('mobile-tower');
            }

            if ($request->hasFile('aadhar_pans')) {
                if ($mobiletowerservice &&  $mobiletowerservice->aadhar_pan && Storage::exists($mobiletowerservice->aadhar_pan)) {
                    Storage::delete($mobiletowerservice->aadhar_pan);
                }
                $request['aadhar_pan'] = $request->aadhar_pans->store('mobile-tower');
            }

            if ($request->hasFile('ownership')) {
                if ($mobiletowerservice &&  $mobiletowerservice->land_ownership && Storage::exists($mobiletowerservice->land_ownership)) {
                    Storage::delete($mobiletowerservice->land_ownership);
                }
                $request['land_ownership'] = $request->ownership->store('mobile-tower');
            }


            if ($request->hasFile('water_bills')) {
                if ($mobiletowerservice &&  $mobiletowerservice->water_bill && Storage::exists($mobiletowerservice->water_bill)) {
                    Storage::delete($mobiletowerservice->water_bill);
                }
                $request['water_bill'] = $request->water_bills->store('mobile-tower');
            }


            if ($request->hasFile('society')) {
                if ($mobiletowerservice &&  $mobiletowerservice->no_objection_certificate && Storage::exists($mobiletowerservice->no_objection_certificate)) {
                    Storage::delete($mobiletowerservice->no_objection_certificate);
                }
                $request['no_objection_certificate'] = $request->society->store('mobile-tower');
            }


            if ($request->hasFile('place')) {
                if ($mobiletowerservice &&  $mobiletowerservice->photo_of_place && Storage::exists($mobiletowerservice->photo_of_place)) {
                    Storage::delete($mobiletowerservice->photo_of_place);
                }
                $request['photo_of_place'] = $request->place->store('mobile-tower');
            }

            if ($request->hasFile('property')) {
                if ($mobiletowerservice &&  $mobiletowerservice->property_tax && Storage::exists($mobiletowerservice->property_tax)) {
                    Storage::delete($mobiletowerservice->property_tax);
                }
                $request['property_tax'] = $request->property->store('mobile-tower');
            }

            if ($request->hasFile('tenancy')) {
                if ($mobiletowerservice &&  $mobiletowerservice->tenancy_agreement && Storage::exists($mobiletowerservice->tenancy_agreement)) {
                    Storage::delete($mobiletowerservice->tenancy_agreement);
                }
                $request['tenancy_agreement'] = $request->tenancy->store('mobile-tower');
            }




            if ($request->hasFile('occupancy')) {
                if ($mobiletowerservice &&  $mobiletowerservice->site_occupancy && Storage::exists($mobiletowerservice->site_occupancy)) {
                    Storage::delete($mobiletowerservice->site_occupancy);
                }
                $request['site_occupancy'] = $request->occupancy->store('mobile-tower');
            }

            if ($request->hasFile('medical')) {
                if ($mobiletowerservice &&  $mobiletowerservice->medical_certificate && Storage::exists($mobiletowerservice->medical_certificate)) {
                    Storage::delete($mobiletowerservice->medical_certificate);
                }
                $request['medical_certificate'] = $request->medical->store('mobile-tower');
            }

            if ($request->hasFile('control')) {
                if ($mobiletowerservice &&  $mobiletowerservice->pest_control && Storage::exists($mobiletowerservice->pest_control)) {
                    Storage::delete($mobiletowerservice->pest_control);
                }
                $request['pest_control'] = $request->control->store('mobile-tower');
            }


            if ($request->hasFile('registration')) {
                if ($mobiletowerservice &&  $mobiletowerservice->gst_registration && Storage::exists($mobiletowerservice->gst_registration)) {
                    Storage::delete($mobiletowerservice->gst_registration);
                }
                $request['gst_registration'] = $request->registration->store('mobile-tower');
            }

            if ($request->hasFile('food')) {
                if ($mobiletowerservice &&  $mobiletowerservice->drug_administration && Storage::exists($mobiletowerservice->drug_administration)) {
                    Storage::delete($mobiletowerservice->drug_administration);
                }
                $request['drug_administration'] = $request->food->store('mobile-tower');
            }


            if ($request->hasFile('fire')) {
                if ($mobiletowerservice &&  $mobiletowerservice->fire_rigade && Storage::exists($mobiletowerservice->fire_rigade)) {
                    Storage::delete($mobiletowerservice->fire_rigade);
                }
                $request['fire_rigade'] = $request->fire->store('mobile-tower');
            }


            if ($request->hasFile('liquor')) {
                if ($mobiletowerservice &&  $mobiletowerservice->liquor_license && Storage::exists($mobiletowerservice->liquor_license)) {
                    Storage::delete($mobiletowerservice->liquor_license);
                }
                $request['liquor_license'] = $request->liquor->store('mobile-tower');
            }


            // Update the rest of the fields
            $mobiletowerservice->update($request->all());

            DB::commit();
            return [true];
        } catch (\Exception $e) {
            DB::rollback();
            Log::error('Error in update method: ' . $e->getMessage());
            return [false, $e->getMessage()];
        }
    }
}
