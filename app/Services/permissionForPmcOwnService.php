<?php

namespace App\Services;

use App\Services\AapaleSarkarLoginCheckService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use App\Models\ServiceCredential;
use App\models\permissionForPmcOwn;

class permissionForPmcOwnService
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
        $request['service_id'] = "2007";
        $request['application_no'] = "PMC-" . time();

        if ($request->hasFile('upload_prescribed_formats')) {
            $request['gumasta_certificate'] = $request->upload_prescribed_formats->store('pmc-owned');
        }

        if ($request->hasFile('aadhar_pans')) {
            $request['aadhar_pan'] = $request->aadhar_pans->store('pmc-owned');
        }
        if ($request->hasFile('ownership')) {
            $request['land_ownership'] = $request->ownership->store('pmc-owned');
        }

        if ($request->hasFile('water_bills')) {
            $request['water_bill'] = $request->water_bills->store('pmc-owned');
        }

        if ($request->hasFile('society')) {
            $request['no_objection_certificate'] = $request->society->store('pmc-owned');
        }

        if ($request->hasFile('place')) {
            $request['photo_of_place'] = $request->place->store('pmc-owned');
        }

        if ($request->hasFile('property')) {
            $request['property_tax'] = $request->property->store('pmc-owned');
        }

        if ($request->hasFile('tenancy')) {
            $request['tenancy_agreement'] = $request->tenancy->store('pmc-owned');
        }

        if ($request->hasFile('occupancy')) {
            $request['site_occupancy'] = $request->occupancy->store('pmc-owned');
        }

        if ($request->hasFile('medical')) {
            $request['medical_certificate'] = $request->medical->store('pmc-owned');
        }

        if ($request->hasFile('control')) {
            $request['pest_control'] = $request->control->store('pmc-owned');
        }

        if ($request->hasFile('registration')) {
            $request['gst_registration'] = $request->registration->store('pmc-owned');
        }

        if ($request->hasFile('food')) {
            $request['drug_administration'] = $request->food->store('pmc-owned');
        }

        if ($request->hasFile('fire')) {
            $request['fire_rigade'] = $request->fire->store('pmc-owned');
        }

        if ($request->hasFile('liquor')) {
            $request['liquor_license'] = $request->liquor->store('pmc-owned');
        }
        // dd($request->all());
        $permissionforpmcown = permissionForPmcOwn::create($request->all());

        if ($permissionforpmcown) {
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
        return permissionForPmcOwn::find($id);
    }

    public function update($request, $id)
    {
        DB::beginTransaction();
        try {
            // Find the existing record
            $permissionforpmcown = permissionForPmcOwn::findOrFail($id);

            // Handle file uploads and update original file names

            if ($request->hasFile('upload_prescribed_formats')) {
                if ($permissionforpmcown && $permissionforpmcown->gumasta_certificate && $permissionforpmcown->gumasta_certificate && Storage::exists($permissionforpmcown->gumasta_certificate)) {
                    Storage::delete($permissionforpmcown->gumasta_certificate);
                }
                $request['gumasta_certificate'] = $request->upload_prescribed_formats->store('pmc-owned');
            }

            if ($request->hasFile('aadhar_pans')) {
                if ($permissionforpmcown && $permissionforpmcown->aadhar_pan && Storage::exists($permissionforpmcown->aadhar_pan)) {
                    Storage::delete($permissionforpmcown->aadhar_pan);
                }
                $request['aadhar_pan'] = $request->aadhar_pans->store('pmc-owned');
            }

            if ($request->hasFile('ownership')) {
                if ($permissionforpmcown && $permissionforpmcown->land_ownership && Storage::exists($permissionforpmcown->land_ownership)) {
                    Storage::delete($permissionforpmcown->land_ownership);
                }
                $request['land_ownership'] = $request->ownership->store('pmc-owned');
            }


            if ($request->hasFile('water_bills')) {
                if ($permissionforpmcown && $permissionforpmcown->water_bill && Storage::exists($permissionforpmcown->water_bill)) {
                    Storage::delete($permissionforpmcown->water_bill);
                }
                $request['water_bill'] = $request->water_bills->store('pmc-owned');
            }


            if ($request->hasFile('society')) {
                if ($permissionforpmcown && $permissionforpmcown->no_objection_certificate && Storage::exists($permissionforpmcown->no_objection_certificate)) {
                    Storage::delete($permissionforpmcown->no_objection_certificate);
                }
                $request['no_objection_certificate'] = $request->society->store('pmc-owned');
            }


            if ($request->hasFile('place')) {
                if ($permissionforpmcown && $permissionforpmcown->photo_of_place && Storage::exists($permissionforpmcown->photo_of_place)) {
                    Storage::delete($permissionforpmcown->photo_of_place);
                }
                $request['photo_of_place'] = $request->place->store('pmc-owned');
            }

            if ($request->hasFile('property')) {
                if ($permissionforpmcown && $permissionforpmcown->property_tax && Storage::exists($permissionforpmcown->property_tax)) {
                    Storage::delete($permissionforpmcown->property_tax);
                }
                $request['property_tax'] = $request->property->store('pmc-owned');
            }

            if ($request->hasFile('tenancy')) {
                if ($permissionforpmcown && $permissionforpmcown->tenancy_agreement && Storage::exists($permissionforpmcown->tenancy_agreement)) {
                    Storage::delete($permissionforpmcown->tenancy_agreement);
                }
                $request['tenancy_agreement'] = $request->tenancy->store('pmc-owned');
            }




            if ($request->hasFile('occupancy')) {
                if ($permissionforpmcown && $permissionforpmcown->site_occupancy && Storage::exists($permissionforpmcown->site_occupancy)) {
                    Storage::delete($permissionforpmcown->site_occupancy);
                }
                $request['site_occupancy'] = $request->occupancy->store('pmc-owned');
            }

            if ($request->hasFile('medical')) {
                if ($permissionforpmcown && $permissionforpmcown->medical_certificate && Storage::exists($permissionforpmcown->medical_certificate)) {
                    Storage::delete($permissionforpmcown->medical_certificate);
                }
                $request['medical_certificate'] = $request->medical->store('pmc-owned');
            }

            if ($request->hasFile('control')) {
                if ($permissionforpmcown && $permissionforpmcown->pest_control && Storage::exists($permissionforpmcown->pest_control)) {
                    Storage::delete($permissionforpmcown->pest_control);
                }
                $request['pest_control'] = $request->control->store('pmc-owned');
            }


            if ($request->hasFile('registration')) {
                if ($permissionforpmcown && $permissionforpmcown->gst_registration && Storage::exists($permissionforpmcown->gst_registration)) {
                    Storage::delete($permissionforpmcown->gst_registration);
                }
                $request['gst_registration'] = $request->registration->store('pmc-owned');
            }

            if ($request->hasFile('food')) {
                if ($permissionforpmcown && $permissionforpmcown->drug_administration && Storage::exists($permissionforpmcown->drug_administration)) {
                    Storage::delete($permissionforpmcown->drug_administration);
                }
                $request['drug_administration'] = $request->food->store('pmc-owned');
            }


            if ($request->hasFile('fire')) {
                if ($permissionforpmcown && $permissionforpmcown->fire_rigade && Storage::exists($permissionforpmcown->fire_rigade)) {
                    Storage::delete($permissionforpmcown->fire_rigade);
                }
                $request['fire_rigade'] = $request->fire->store('pmc-owned');
            }


            if ($request->hasFile('liquor')) {
                if ($permissionforpmcown && $permissionforpmcown->liquor_license && Storage::exists($permissionforpmcown->liquor_license)) {
                    Storage::delete($permissionforpmcown->liquor_license);
                }
                $request['liquor_license'] = $request->liquor->store('pmc-owned');
            }


            // Update the rest of the fields
            $permissionforpmcown->update($request->all());

            DB::commit();
            return [true];
        } catch (\Exception $e) {
            DB::rollback();
            Log::error('Error in update method: ' . $e->getMessage());
            return [false, $e->getMessage()];
        }
    }
}
