<?php

namespace App\Services;

use App\Services\AapaleSarkarLoginCheckService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use App\Models\StallBoardLicense;
use App\Models\ServiceCredential;

class StallBoardLicenseService
{
    protected $aapaleSarkarLoginCheckService;

    public function __construct(AapaleSarkarLoginCheckService $aapaleSarkarLoginCheckService)
    {
        $this->aapaleSarkarLoginCheckService = $aapaleSarkarLoginCheckService;
    }

    public function store($request)
    {

        $request['user_id'] = Auth::user()->id;
        $request['service_id'] = '2009';
        $request['application_no'] = "PMC-" . time();

        if ($request->hasFile('upload_prescribed_formats')) {
            $request['gumasta_certificate'] = $request->upload_prescribed_formats->store('stallboard-license');
        }

        if ($request->hasFile('aadhar_pans')) {
            $request['aadhar_pan'] = $request->aadhar_pans->store('stallboard-license');
        }
        if ($request->hasFile('ownership')) {
            $request['land_ownership'] = $request->ownership->store('stallboard-license');
        }

        if ($request->hasFile('water_bills')) {
            $request['water_bill'] = $request->water_bills->store('stallboard-license');
        }

        if ($request->hasFile('society')) {
            $request['no_objection_certificate'] = $request->society->store('stallboard-license');
        }

        if ($request->hasFile('place')) {
            $request['photo_of_place'] = $request->place->store('stallboard-license');
        }

        if ($request->hasFile('property')) {
            $request['property_tax'] = $request->property->store('stallboard-license');
        }

        if ($request->hasFile('tenancy')) {
            $request['tenancy_agreement'] = $request->tenancy->store('stallboard-license');
        }

        if ($request->hasFile('occupancy')) {
            $request['site_occupancy'] = $request->occupancy->store('stallboard-license');
        }

        if ($request->hasFile('medical')) {
            $request['medical_certificate'] = $request->medical->store('stallboard-license');
        }

        if ($request->hasFile('control')) {
            $request['pest_control'] = $request->control->store('stallboard-license');
        }

        if ($request->hasFile('registration')) {
            $request['gst_registration'] = $request->registration->store('stallboard-license');
        }

        if ($request->hasFile('food')) {
            $request['drug_administration'] = $request->food->store('stallboard-license');
        }

        if ($request->hasFile('fire')) {
            $request['fire_rigade'] = $request->fire->store('stallboard-license');
        }

        if ($request->hasFile('liquor')) {
            $request['liquor_license'] = $request->liquor->store('stallboard-license');
        }

        $stallboard = StallBoardLicense::create($request->all());

        if ($stallboard) {
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
        return StallBoardLicense::findOrFail($id);
    }

    public function update($request, $id)
    {
        DB::beginTransaction();
        try {
            // Find the existing record
            $StallBoardLicenseService = StallBoardLicense::find($id);

            // Handle file uploads and update original file names

            if ($request->hasFile('upload_prescribed_formats')) {
                if ($StallBoardLicenseService &&  $StallBoardLicenseService->gumasta_certificate && Storage::exists($StallBoardLicenseService->gumasta_certificate)) {
                    Storage::delete($StallBoardLicenseService->gumasta_certificate);
                }
                $request['gumasta_certificate'] = $request->upload_prescribed_formats->store('stallboard-license');
            }

            if ($request->hasFile('aadhar_pans')) {
                if ($StallBoardLicenseService &&  $StallBoardLicenseService->aadhar_pan && Storage::exists($StallBoardLicenseService->aadhar_pan)) {
                    Storage::delete($StallBoardLicenseService->aadhar_pan);
                }
                $request['aadhar_pan'] = $request->aadhar_pans->store('stallboard-license');
            }

            if ($request->hasFile('ownership')) {
                if ($StallBoardLicenseService &&  $StallBoardLicenseService->land_ownership && Storage::exists($StallBoardLicenseService->land_ownership)) {
                    Storage::delete($StallBoardLicenseService->land_ownership);
                }
                $request['land_ownership'] = $request->ownership->store('stallboard-license');
            }


            if ($request->hasFile('water_bills')) {
                if ($StallBoardLicenseService &&  $StallBoardLicenseService->water_bill && Storage::exists($StallBoardLicenseService->water_bill)) {
                    Storage::delete($StallBoardLicenseService->water_bill);
                }
                $request['water_bill'] = $request->water_bills->store('stallboard-license');
            }


            if ($request->hasFile('society')) {
                if ($StallBoardLicenseService &&  $StallBoardLicenseService->no_objection_certificate && Storage::exists($StallBoardLicenseService->no_objection_certificate)) {
                    Storage::delete($StallBoardLicenseService->no_objection_certificate);
                }
                $request['no_objection_certificate'] = $request->society->store('stallboard-license');
            }


            if ($request->hasFile('place')) {
                if ($StallBoardLicenseService &&  $StallBoardLicenseService->photo_of_place && Storage::exists($StallBoardLicenseService->photo_of_place)) {
                    Storage::delete($StallBoardLicenseService->photo_of_place);
                }
                $request['photo_of_place'] = $request->place->store('stallboard-license');
            }

            if ($request->hasFile('property')) {
                if ($StallBoardLicenseService &&  $StallBoardLicenseService->property_tax && Storage::exists($StallBoardLicenseService->property_tax)) {
                    Storage::delete($StallBoardLicenseService->property_tax);
                }
                $request['property_tax'] = $request->property->store('stallboard-license');
            }

            if ($request->hasFile('tenancy')) {
                if ($StallBoardLicenseService &&  $StallBoardLicenseService->tenancy_agreement && Storage::exists($StallBoardLicenseService->tenancy_agreement)) {
                    Storage::delete($StallBoardLicenseService->tenancy_agreement);
                }
                $request['tenancy_agreement'] = $request->tenancy->store('stallboard-license');
            }




            if ($request->hasFile('occupancy')) {
                if ($StallBoardLicenseService &&  $StallBoardLicenseService->site_occupancy && Storage::exists($StallBoardLicenseService->site_occupancy)) {
                    Storage::delete($StallBoardLicenseService->site_occupancy);
                }
                $request['site_occupancy'] = $request->occupancy->store('stallboard-license');
            }

            if ($request->hasFile('medical')) {
                if ($StallBoardLicenseService &&  $StallBoardLicenseService->medical_certificate && Storage::exists($StallBoardLicenseService->medical_certificate)) {
                    Storage::delete($StallBoardLicenseService->medical_certificate);
                }
                $request['medical_certificate'] = $request->medical->store('stallboard-license');
            }

            if ($request->hasFile('control')) {
                if ($StallBoardLicenseService &&  $StallBoardLicenseService->pest_control && Storage::exists($StallBoardLicenseService->pest_control)) {
                    Storage::delete($StallBoardLicenseService->pest_control);
                }
                $request['pest_control'] = $request->control->store('stallboard-license');
            }


            if ($request->hasFile('registration')) {
                if ($StallBoardLicenseService &&  $StallBoardLicenseService->gst_registration && Storage::exists($StallBoardLicenseService->gst_registration)) {
                    Storage::delete($StallBoardLicenseService->gst_registration);
                }
                $request['gst_registration'] = $request->registration->store('stallboard-license');
            }

            if ($request->hasFile('food')) {
                if ($StallBoardLicenseService &&  $StallBoardLicenseService->drug_administration && Storage::exists($StallBoardLicenseService->drug_administration)) {
                    Storage::delete($StallBoardLicenseService->drug_administration);
                }
                $request['drug_administration'] = $request->food->store('stallboard-license');
            }


            if ($request->hasFile('fire')) {
                if ($StallBoardLicenseService &&  $StallBoardLicenseService->fire_rigade && Storage::exists($StallBoardLicenseService->fire_rigade)) {
                    Storage::delete($StallBoardLicenseService->fire_rigade);
                }
                $request['fire_rigade'] = $request->fire->store('stallboard-license');
            }


            if ($request->hasFile('liquor')) {
                if ($StallBoardLicenseService &&  $StallBoardLicenseService->liquor_license && Storage::exists($StallBoardLicenseService->liquor_license)) {
                    Storage::delete($StallBoardLicenseService->liquor_license);
                }
                $request['liquor_license'] = $request->liquor->store('stallboard-license');
            }


            // Update the rest of the fields
            $StallBoardLicenseService->update($request->all());

            DB::commit();
            return [true];
        } catch (\Exception $e) {
            DB::rollback();
            Log::error('Error in update method: ' . $e->getMessage());
            return [false, $e->getMessage()];
        }
    }
}
