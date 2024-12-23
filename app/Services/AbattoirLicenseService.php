<?php

namespace App\Services;

use App\Services\AapaleSarkarLoginCheckService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Models\ServiceCredential;
use App\Models\AbattoirLicense;
use Illuminate\Support\Facades\Storage;

class AbattoirLicenseService
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
        $request['service_id'] = "2001";
        $request['application_no'] = "PMC-" . time();
        if ($request->hasFile('gumasta_certificates')) {
            $request['gumasta_certificate'] = $request->gumasta_certificates->store('abattoir-license');
        }

        if ($request->hasFile('aadhar_pans')) {
            $request['aadhar_pan'] = $request->aadhar_pans->store('abattoir-license');
        }
        if ($request->hasFile('land_ownerships')) {
            $request['land_ownership'] = $request->land_ownerships->store('abattoir-license');
        }

        if ($request->hasFile('water_bills')) {
            $request['water_bill'] = $request->water_bills->store('abattoir-license');
        }

        if ($request->hasFile('no_objection_certificates')) {
            $request['no_objection_certificate'] = $request->no_objection_certificates->store('abattoir-license');
        }

        if ($request->hasFile('photo_of_places')) {
            $request['photo_of_place'] = $request->photo_of_places->store('abattoir-license');
        }

        if ($request->hasFile('property_taxs')) {
            $request['property_tax'] = $request->property_taxs->store('abattoir-license');
        }

        if ($request->hasFile('tenancy_agreements')) {
            $request['tenancy_agreement'] = $request->tenancy_agreements->store('abattoir-license');
        }

        if ($request->hasFile('site_occupancys')) {
            $request['site_occupancy'] = $request->site_occupancys->store('abattoir-license');
        }

        if ($request->hasFile('medical_certificates')) {
            $request['medical_certificate'] = $request->medical_certificates->store('abattoir-license');
        }

        if ($request->hasFile('pest_controls')) {
            $request['pest_control'] = $request->pest_controls->store('abattoir-license');
        }

        if ($request->hasFile('gst_registrations')) {
            $request['gst_registration'] = $request->gst_registrations->store('abattoir-license');
        }

        if ($request->hasFile('drug_administrations')) {
            $request['drug_administration'] = $request->drug_administrations->store('abattoir-license');
        }

        if ($request->hasFile('fire_rigades')) {
            $request['fire_rigade'] = $request->fire_rigades->store('abattoir-license');
        }

        if ($request->hasFile('liquor_licenses')) {
            $request['liquor_license'] = $request->liquor_licenses->store('abattoir-license');
        }

        $abattoirLicenseService = abattoirLicense::create($request->all());

        if ($abattoirLicenseService) {
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
        return abattoirLicense::findOrFail($id);
    }

    public function update($request, $id)
    {
        DB::beginTransaction();
        try {
            // Find the existing record
            $abattoirLicenseService = abattoirLicense::find($id);

            // Handle file uploads and update original file names

            if ($request->hasFile('upload_prescribed_formats')) {
                if ($abattoirLicenseService && Storage::exists($abattoirLicenseService->gumasta_certificate)) {
                    Storage::delete($abattoirLicenseService->gumasta_certificate);
                }
                $request['gumasta_certificate'] = $request->upload_prescribed_formats->store('stallboard-license');
            }

            if ($request->hasFile('aadhar_pans')) {
                if ($abattoirLicenseService && Storage::exists($abattoirLicenseService->aadhar_pan)) {
                    Storage::delete($abattoirLicenseService->aadhar_pan);
                }
                $request['aadhar_pan'] = $request->aadhar_pans->store('stallboard-license');
            }

            if ($request->hasFile('ownership')) {
                if ($abattoirLicenseService && Storage::exists($abattoirLicenseService->land_ownership)) {
                    Storage::delete($abattoirLicenseService->land_ownership);
                }
                $request['land_ownership'] = $request->ownership->store('stallboard-license');
            }


            if ($request->hasFile('water_bills')) {
                if ($abattoirLicenseService && Storage::exists($abattoirLicenseService->water_bill)) {
                    Storage::delete($abattoirLicenseService->water_bill);
                }
                $request['water_bill'] = $request->water_bills->store('stallboard-license');
            }


            if ($request->hasFile('society')) {
                if ($abattoirLicenseService && Storage::exists($abattoirLicenseService->no_objection_certificate)) {
                    Storage::delete($abattoirLicenseService->no_objection_certificate);
                }
                $request['no_objection_certificate'] = $request->society->store('stallboard-license');
            }


            if ($request->hasFile('place')) {
                if ($abattoirLicenseService && Storage::exists($abattoirLicenseService->photo_of_place)) {
                    Storage::delete($abattoirLicenseService->photo_of_place);
                }
                $request['photo_of_place'] = $request->place->store('stallboard-license');
            }

            if ($request->hasFile('property')) {
                if ($abattoirLicenseService && Storage::exists($abattoirLicenseService->property_tax)) {
                    Storage::delete($abattoirLicenseService->property_tax);
                }
                $request['property_tax'] = $request->property->store('stallboard-license');
            }

            if ($request->hasFile('tenancy')) {
                if ($abattoirLicenseService && Storage::exists($abattoirLicenseService->tenancy_agreement)) {
                    Storage::delete($abattoirLicenseService->tenancy_agreement);
                }
                $request['tenancy_agreement'] = $request->tenancy->store('stallboard-license');
            }




            if ($request->hasFile('occupancy')) {
                if ($abattoirLicenseService && Storage::exists($abattoirLicenseService->site_occupancy)) {
                    Storage::delete($abattoirLicenseService->site_occupancy);
                }
                $request['site_occupancy'] = $request->occupancy->store('stallboard-license');
            }

            if ($request->hasFile('medical')) {
                if ($abattoirLicenseService && Storage::exists($abattoirLicenseService->medical_certificate)) {
                    Storage::delete($abattoirLicenseService->medical_certificate);
                }
                $request['medical_certificate'] = $request->medical->store('stallboard-license');
            }

            if ($request->hasFile('control')) {
                if ($abattoirLicenseService && Storage::exists($abattoirLicenseService->pest_control)) {
                    Storage::delete($abattoirLicenseService->pest_control);
                }
                $request['pest_control'] = $request->control->store('stallboard-license');
            }


            if ($request->hasFile('registration')) {
                if ($abattoirLicenseService && Storage::exists($abattoirLicenseService->gst_registration)) {
                    Storage::delete($abattoirLicenseService->gst_registration);
                }
                $request['gst_registration'] = $request->registration->store('stallboard-license');
            }

            if ($request->hasFile('food')) {
                if ($abattoirLicenseService && Storage::exists($abattoirLicenseService->drug_administration)) {
                    Storage::delete($abattoirLicenseService->drug_administration);
                }
                $request['drug_administration'] = $request->food->store('stallboard-license');
            }


            if ($request->hasFile('fire')) {
                if ($abattoirLicenseService && Storage::exists($abattoirLicenseService->fire_rigade)) {
                    Storage::delete($abattoirLicenseService->fire_rigade);
                }
                $request['fire_rigade'] = $request->fire->store('stallboard-license');
            }


            if ($request->hasFile('liquor')) {
                if ($abattoirLicenseService && Storage::exists($abattoirLicenseService->liquor_license)) {
                    Storage::delete($abattoirLicenseService->liquor_license);
                }
                $request['liquor_license'] = $request->liquor->store('stallboard-license');
            }


            // Update the rest of the fields
            $abattoirLicenseService->update($request->all());

            DB::commit();
            return [true];
        } catch (\Exception $e) {
            DB::rollback();
            Log::error('Error in update method: ' . $e->getMessage());
            return [false, $e->getMessage()];
        }
    }
}
