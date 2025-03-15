<?php

namespace App\Services;

use App\Services\AapaleSarkarLoginCheckService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use App\Models\RecordObjections;
use App\Models\ServiceCredential;

class RecordObjectionService
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
        $request['service_id'] = "2013";
        $request['application_no'] = "PMC-" . time();

        if ($request->hasFile('upload_prescribed_formats')) {
            $request['gumasta_certificate'] = $request->upload_prescribed_formats->store('record-objections');
        }

        if ($request->hasFile('aadhar_pans')) {
            $request['aadhar_pan'] = $request->aadhar_pans->store('record-objections');
        }
        if ($request->hasFile('ownership')) {
            $request['land_ownership'] = $request->ownership->store('record-objections');
        }

        if ($request->hasFile('water_bills')) {
            $request['water_bill'] = $request->water_bills->store('record-objections');
        }

        if ($request->hasFile('society')) {
            $request['no_objection_certificate'] = $request->society->store('record-objections');
        }

        if ($request->hasFile('place')) {
            $request['photo_of_place'] = $request->place->store('record-objections');
        }

        if ($request->hasFile('property')) {
            $request['property_tax'] = $request->property->store('record-objections');
        }

        if ($request->hasFile('tenancy')) {
            $request['tenancy_agreement'] = $request->tenancy->store('record-objections');
        }

        if ($request->hasFile('occupancy')) {
            $request['site_occupancy'] = $request->occupancy->store('record-objections');
        }

        if ($request->hasFile('medical')) {
            $request['medical_certificate'] = $request->medical->store('record-objections');
        }

        if ($request->hasFile('control')) {
            $request['pest_control'] = $request->control->store('record-objections');
        }

        if ($request->hasFile('registration')) {
            $request['gst_registration'] = $request->registration->store('record-objections');
        }

        if ($request->hasFile('food')) {
            $request['drug_administration'] = $request->food->store('record-objections');
        }

        if ($request->hasFile('fire')) {
            $request['fire_rigade'] = $request->fire->store('record-objections');
        }

        if ($request->hasFile('liquor')) {
            $request['liquor_license'] = $request->liquor->store('record-objections');
        }
        // dd($request->all());
        $record = RecordObjections::create($request->all());

        if ($record) {
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
        return RecordObjections::find($id);
    }

    public function update($request, $id)
    {
        DB::beginTransaction();
        try {
            // Find the existing record
            $record = RecordObjections::findOrFail($id);

            // Handle file uploads and update original file names

            if ($request->hasFile('upload_prescribed_formats')) {
                if ($record &&  $record->gumasta_certificate &&  $record->gumasta_certificate && Storage::exists($record->gumasta_certificate)) {
                    Storage::delete($record->gumasta_certificate);
                }
                $request['gumasta_certificate'] = $request->upload_prescribed_formats->store('record-objections');
            }

            if ($request->hasFile('aadhar_pans')) {
                if ($record &&  $record->aadhar_pan && Storage::exists($record->aadhar_pan)) {
                    Storage::delete($record->aadhar_pan);
                }
                $request['aadhar_pan'] = $request->aadhar_pans->store('record-objections');
            }

            if ($request->hasFile('ownership')) {
                if ($record &&  $record->land_ownership && Storage::exists($record->land_ownership)) {
                    Storage::delete($record->land_ownership);
                }
                $request['land_ownership'] = $request->ownership->store('record-objections');
            }


            if ($request->hasFile('water_bills')) {
                if ($record &&  $record->water_bill && Storage::exists($record->water_bill)) {
                    Storage::delete($record->water_bill);
                }
                $request['water_bill'] = $request->water_bills->store('record-objections');
            }


            if ($request->hasFile('society')) {
                if ($record &&  $record->no_objection_certificate && Storage::exists($record->no_objection_certificate)) {
                    Storage::delete($record->no_objection_certificate);
                }
                $request['no_objection_certificate'] = $request->society->store('record-objections');
            }


            if ($request->hasFile('place')) {
                if ($record &&  $record->photo_of_place && Storage::exists($record->photo_of_place)) {
                    Storage::delete($record->photo_of_place);
                }
                $request['photo_of_place'] = $request->place->store('record-objections');
            }

            if ($request->hasFile('property')) {
                if ($record &&  $record->property_tax && Storage::exists($record->property_tax)) {
                    Storage::delete($record->property_tax);
                }
                $request['property_tax'] = $request->property->store('record-objections');
            }

            if ($request->hasFile('tenancy')) {
                if ($record &&  $record->tenancy_agreement && Storage::exists($record->tenancy_agreement)) {
                    Storage::delete($record->tenancy_agreement);
                }
                $request['tenancy_agreement'] = $request->tenancy->store('record-objections');
            }




            if ($request->hasFile('occupancy')) {
                if ($record &&  $record->site_occupancy && Storage::exists($record->site_occupancy)) {
                    Storage::delete($record->site_occupancy);
                }
                $request['site_occupancy'] = $request->occupancy->store('record-objections');
            }

            if ($request->hasFile('medical')) {
                if ($record &&  $record->medical_certificate && Storage::exists($record->medical_certificate)) {
                    Storage::delete($record->medical_certificate);
                }
                $request['medical_certificate'] = $request->medical->store('record-objections');
            }

            if ($request->hasFile('control')) {
                if ($record &&  $record->pest_control && Storage::exists($record->pest_control)) {
                    Storage::delete($record->pest_control);
                }
                $request['pest_control'] = $request->control->store('record-objections');
            }


            if ($request->hasFile('registration')) {
                if ($record &&  $record->gst_registration && Storage::exists($record->gst_registration)) {
                    Storage::delete($record->gst_registration);
                }
                $request['gst_registration'] = $request->registration->store('record-objections');
            }

            if ($request->hasFile('food')) {
                if ($record &&  $record->drug_administration && Storage::exists($record->drug_administration)) {
                    Storage::delete($record->drug_administration);
                }
                $request['drug_administration'] = $request->food->store('record-objections');
            }


            if ($request->hasFile('fire')) {
                if ($record &&  $record->fire_rigade && Storage::exists($record->fire_rigade)) {
                    Storage::delete($record->fire_rigade);
                }
                $request['fire_rigade'] = $request->fire->store('record-objections');
            }


            if ($request->hasFile('liquor')) {
                if ($record &&  $record->liquor_license && Storage::exists($record->liquor_license)) {
                    Storage::delete($record->liquor_license);
                }
                $request['liquor_license'] = $request->liquor->store('record-objections');
            }


            // Update the rest of the fields
            $record->update($request->all());

            DB::commit();
            return [true];
        } catch (\Exception $e) {
            DB::rollback();
            Log::error('Error in update method: ' . $e->getMessage());
            return [false, $e->getMessage()];
        }
    }
}
