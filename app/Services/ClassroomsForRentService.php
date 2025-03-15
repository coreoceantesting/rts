<?php

namespace App\Services;

use App\Services\AapaleSarkarLoginCheckService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use App\Models\ClassroomsForRent;
use App\Models\ServiceCredential;

class ClassroomsForRentService
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
        $request['service_id'] = "2011";
        $request['application_no'] = "PMC-" . time();

        if ($request->hasFile('upload_prescribed_formats')) {
            $request['gumasta_certificate'] = $request->upload_prescribed_formats->store('classroom-rent');
        }

        if ($request->hasFile('aadhar_pans')) {
            $request['aadhar_pan'] = $request->aadhar_pans->store('classroom-rent');
        }
        if ($request->hasFile('ownership')) {
            $request['land_ownership'] = $request->ownership->store('classroom-rent');
        }

        if ($request->hasFile('water_bills')) {
            $request['water_bill'] = $request->water_bills->store('classroom-rent');
        }

        if ($request->hasFile('society')) {
            $request['no_objection_certificate'] = $request->society->store('classroom-rent');
        }

        if ($request->hasFile('place')) {
            $request['photo_of_place'] = $request->place->store('classroom-rent');
        }

        if ($request->hasFile('property')) {
            $request['property_tax'] = $request->property->store('classroom-rent');
        }

        if ($request->hasFile('tenancy')) {
            $request['tenancy_agreement'] = $request->tenancy->store('classroom-rent');
        }

        if ($request->hasFile('occupancy')) {
            $request['site_occupancy'] = $request->occupancy->store('classroom-rent');
        }

        if ($request->hasFile('medical')) {
            $request['medical_certificate'] = $request->medical->store('classroom-rent');
        }

        if ($request->hasFile('control')) {
            $request['pest_control'] = $request->control->store('classroom-rent');
        }

        if ($request->hasFile('registration')) {
            $request['gst_registration'] = $request->registration->store('classroom-rent');
        }

        if ($request->hasFile('food')) {
            $request['drug_administration'] = $request->food->store('classroom-rent');
        }

        if ($request->hasFile('fire')) {
            $request['fire_rigade'] = $request->fire->store('classroom-rent');
        }

        if ($request->hasFile('liquor')) {
            $request['liquor_license'] = $request->liquor->store('classroom-rent');
        }
        // dd($request->all());
        $classroomService = ClassroomsForRent::create($request->all());

        if ($classroomService) {
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
        return ClassroomsForRent::find($id);
    }

    public function update($request, $id)
    {
        DB::beginTransaction();
        try {
            // Find the existing record
            $classroomService = ClassroomsForRent::findOrFail($id);

            // Handle file uploads and update original file names

            if ($request->hasFile('upload_prescribed_formats')) {
                if ($classroomService &&  $classroomService->gumasta_certificate &&  $classroomService->gumasta_certificate && Storage::exists($classroomService->gumasta_certificate)) {
                    Storage::delete($classroomService->gumasta_certificate);
                }
                $request['gumasta_certificate'] = $request->upload_prescribed_formats->store('classroom-rent');
            }

            if ($request->hasFile('aadhar_pans')) {
                if ($classroomService &&  $classroomService->aadhar_pan && Storage::exists($classroomService->aadhar_pan)) {
                    Storage::delete($classroomService->aadhar_pan);
                }
                $request['aadhar_pan'] = $request->aadhar_pans->store('classroom-rent');
            }

            if ($request->hasFile('ownership')) {
                if ($classroomService &&  $classroomService->land_ownership && Storage::exists($classroomService->land_ownership)) {
                    Storage::delete($classroomService->land_ownership);
                }
                $request['land_ownership'] = $request->ownership->store('classroom-rent');
            }


            if ($request->hasFile('water_bills')) {
                if ($classroomService &&  $classroomService->water_bill && Storage::exists($classroomService->water_bill)) {
                    Storage::delete($classroomService->water_bill);
                }
                $request['water_bill'] = $request->water_bills->store('classroom-rent');
            }


            if ($request->hasFile('society')) {
                if ($classroomService &&  $classroomService->no_objection_certificate && Storage::exists($classroomService->no_objection_certificate)) {
                    Storage::delete($classroomService->no_objection_certificate);
                }
                $request['no_objection_certificate'] = $request->society->store('classroom-rent');
            }


            if ($request->hasFile('place')) {
                if ($classroomService &&  $classroomService->photo_of_place && Storage::exists($classroomService->photo_of_place)) {
                    Storage::delete($classroomService->photo_of_place);
                }
                $request['photo_of_place'] = $request->place->store('classroom-rent');
            }

            if ($request->hasFile('property')) {
                if ($classroomService &&  $classroomService->property_tax && Storage::exists($classroomService->property_tax)) {
                    Storage::delete($classroomService->property_tax);
                }
                $request['property_tax'] = $request->property->store('classroom-rent');
            }

            if ($request->hasFile('tenancy')) {
                if ($classroomService &&  $classroomService->tenancy_agreement && Storage::exists($classroomService->tenancy_agreement)) {
                    Storage::delete($classroomService->tenancy_agreement);
                }
                $request['tenancy_agreement'] = $request->tenancy->store('classroom-rent');
            }




            if ($request->hasFile('occupancy')) {
                if ($classroomService &&  $classroomService->site_occupancy && Storage::exists($classroomService->site_occupancy)) {
                    Storage::delete($classroomService->site_occupancy);
                }
                $request['site_occupancy'] = $request->occupancy->store('classroom-rent');
            }

            if ($request->hasFile('medical')) {
                if ($classroomService &&  $classroomService->medical_certificate && Storage::exists($classroomService->medical_certificate)) {
                    Storage::delete($classroomService->medical_certificate);
                }
                $request['medical_certificate'] = $request->medical->store('classroom-rent');
            }

            if ($request->hasFile('control')) {
                if ($classroomService &&  $classroomService->pest_control && Storage::exists($classroomService->pest_control)) {
                    Storage::delete($classroomService->pest_control);
                }
                $request['pest_control'] = $request->control->store('classroom-rent');
            }


            if ($request->hasFile('registration')) {
                if ($classroomService &&  $classroomService->gst_registration && Storage::exists($classroomService->gst_registration)) {
                    Storage::delete($classroomService->gst_registration);
                }
                $request['gst_registration'] = $request->registration->store('classroom-rent');
            }

            if ($request->hasFile('food')) {
                if ($classroomService &&  $classroomService->drug_administration && Storage::exists($classroomService->drug_administration)) {
                    Storage::delete($classroomService->drug_administration);
                }
                $request['drug_administration'] = $request->food->store('classroom-rent');
            }


            if ($request->hasFile('fire')) {
                if ($classroomService &&  $classroomService->fire_rigade && Storage::exists($classroomService->fire_rigade)) {
                    Storage::delete($classroomService->fire_rigade);
                }
                $request['fire_rigade'] = $request->fire->store('classroom-rent');
            }


            if ($request->hasFile('liquor')) {
                if ($classroomService &&  $classroomService->liquor_license && Storage::exists($classroomService->liquor_license)) {
                    Storage::delete($classroomService->liquor_license);
                }
                $request['liquor_license'] = $request->liquor->store('classroom-rent');
            }


            // Update the rest of the fields
            $classroomService->update($request->all());

            DB::commit();
            return [true];
        } catch (\Exception $e) {
            DB::rollback();
            Log::error('Error in update method: ' . $e->getMessage());
            return [false, $e->getMessage()];
        }
    }
}
