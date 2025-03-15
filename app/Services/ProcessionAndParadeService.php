<?php

namespace App\Services;

use App\Services\AapaleSarkarLoginCheckService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use App\Models\ProcessionAndParade;
use App\Models\ServiceCredential;

class ProcessionAndParadeService
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
        $request['service_id'] = "2012";
        $request['application_no'] = "PMC-" . time();

        if ($request->hasFile('upload_prescribed_formats')) {
            $request['gumasta_certificate'] = $request->upload_prescribed_formats->store('procession-parade');
        }

        if ($request->hasFile('aadhar_pans')) {
            $request['aadhar_pan'] = $request->aadhar_pans->store('procession-parade');
        }
        if ($request->hasFile('ownership')) {
            $request['land_ownership'] = $request->ownership->store('procession-parade');
        }

        if ($request->hasFile('water_bills')) {
            $request['water_bill'] = $request->water_bills->store('procession-parade');
        }

        if ($request->hasFile('society')) {
            $request['no_objection_certificate'] = $request->society->store('procession-parade');
        }

        if ($request->hasFile('place')) {
            $request['photo_of_place'] = $request->place->store('procession-parade');
        }

        if ($request->hasFile('property')) {
            $request['property_tax'] = $request->property->store('procession-parade');
        }

        if ($request->hasFile('tenancy')) {
            $request['tenancy_agreement'] = $request->tenancy->store('procession-parade');
        }

        if ($request->hasFile('occupancy')) {
            $request['site_occupancy'] = $request->occupancy->store('procession-parade');
        }

        if ($request->hasFile('medical')) {
            $request['medical_certificate'] = $request->medical->store('procession-parade');
        }

        if ($request->hasFile('control')) {
            $request['pest_control'] = $request->control->store('procession-parade');
        }

        if ($request->hasFile('registration')) {
            $request['gst_registration'] = $request->registration->store('procession-parade');
        }

        if ($request->hasFile('food')) {
            $request['drug_administration'] = $request->food->store('procession-parade');
        }

        if ($request->hasFile('fire')) {
            $request['fire_rigade'] = $request->fire->store('procession-parade');
        }

        if ($request->hasFile('liquor')) {
            $request['liquor_license'] = $request->liquor->store('procession-parade');
        }
        // dd($request->all());
        $Procession = ProcessionAndParade::create($request->all());

        if ($Procession) {
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
        return ProcessionAndParade::find($id);
    }

    public function update($request, $id)
    {
        DB::beginTransaction();
        try {
            // Find the existing record
            $Procession = ProcessionAndParade::findOrFail($id);

            // Handle file uploads and update original file names

            if ($request->hasFile('upload_prescribed_formats')) {
                if ($Procession &&  $Procession->gumasta_certificate &&  $Procession->gumasta_certificate && Storage::exists($Procession->gumasta_certificate)) {
                    Storage::delete($Procession->gumasta_certificate);
                }
                $request['gumasta_certificate'] = $request->upload_prescribed_formats->store('procession-parade');
            }

            if ($request->hasFile('aadhar_pans')) {
                if ($Procession &&  $Procession->aadhar_pan && Storage::exists($Procession->aadhar_pan)) {
                    Storage::delete($Procession->aadhar_pan);
                }
                $request['aadhar_pan'] = $request->aadhar_pans->store('procession-parade');
            }

            if ($request->hasFile('ownership')) {
                if ($Procession &&  $Procession->land_ownership && Storage::exists($Procession->land_ownership)) {
                    Storage::delete($Procession->land_ownership);
                }
                $request['land_ownership'] = $request->ownership->store('procession-parade');
            }


            if ($request->hasFile('water_bills')) {
                if ($Procession &&  $Procession->water_bill && Storage::exists($Procession->water_bill)) {
                    Storage::delete($Procession->water_bill);
                }
                $request['water_bill'] = $request->water_bills->store('procession-parade');
            }


            if ($request->hasFile('society')) {
                if ($Procession &&  $Procession->no_objection_certificate && Storage::exists($Procession->no_objection_certificate)) {
                    Storage::delete($Procession->no_objection_certificate);
                }
                $request['no_objection_certificate'] = $request->society->store('procession-parade');
            }


            if ($request->hasFile('place')) {
                if ($Procession &&  $Procession->photo_of_place && Storage::exists($Procession->photo_of_place)) {
                    Storage::delete($Procession->photo_of_place);
                }
                $request['photo_of_place'] = $request->place->store('procession-parade');
            }

            if ($request->hasFile('property')) {
                if ($Procession &&  $Procession->property_tax && Storage::exists($Procession->property_tax)) {
                    Storage::delete($Procession->property_tax);
                }
                $request['property_tax'] = $request->property->store('procession-parade');
            }

            if ($request->hasFile('tenancy')) {
                if ($Procession &&  $Procession->tenancy_agreement && Storage::exists($Procession->tenancy_agreement)) {
                    Storage::delete($Procession->tenancy_agreement);
                }
                $request['tenancy_agreement'] = $request->tenancy->store('procession-parade');
            }




            if ($request->hasFile('occupancy')) {
                if ($Procession &&  $Procession->site_occupancy && Storage::exists($Procession->site_occupancy)) {
                    Storage::delete($Procession->site_occupancy);
                }
                $request['site_occupancy'] = $request->occupancy->store('procession-parade');
            }

            if ($request->hasFile('medical')) {
                if ($Procession &&  $Procession->medical_certificate && Storage::exists($Procession->medical_certificate)) {
                    Storage::delete($Procession->medical_certificate);
                }
                $request['medical_certificate'] = $request->medical->store('procession-parade');
            }

            if ($request->hasFile('control')) {
                if ($Procession &&  $Procession->pest_control && Storage::exists($Procession->pest_control)) {
                    Storage::delete($Procession->pest_control);
                }
                $request['pest_control'] = $request->control->store('procession-parade');
            }


            if ($request->hasFile('registration')) {
                if ($Procession &&  $Procession->gst_registration && Storage::exists($Procession->gst_registration)) {
                    Storage::delete($Procession->gst_registration);
                }
                $request['gst_registration'] = $request->registration->store('procession-parade');
            }

            if ($request->hasFile('food')) {
                if ($Procession &&  $Procession->drug_administration && Storage::exists($Procession->drug_administration)) {
                    Storage::delete($Procession->drug_administration);
                }
                $request['drug_administration'] = $request->food->store('procession-parade');
            }


            if ($request->hasFile('fire')) {
                if ($Procession &&  $Procession->fire_rigade && Storage::exists($Procession->fire_rigade)) {
                    Storage::delete($Procession->fire_rigade);
                }
                $request['fire_rigade'] = $request->fire->store('procession-parade');
            }


            if ($request->hasFile('liquor')) {
                if ($Procession &&  $Procession->liquor_license && Storage::exists($Procession->liquor_license)) {
                    Storage::delete($Procession->liquor_license);
                }
                $request['liquor_license'] = $request->liquor->store('procession-parade');
            }


            // Update the rest of the fields
            $Procession->update($request->all());

            DB::commit();
            return [true];
        } catch (\Exception $e) {
            DB::rollback();
            Log::error('Error in update method: ' . $e->getMessage());
            return [false, $e->getMessage()];
        }
    }
}
