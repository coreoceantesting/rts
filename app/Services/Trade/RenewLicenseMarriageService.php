<?php

namespace App\Services\Trade;

use App\Services\AapaleSarkarLoginCheckService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use App\Models\ServiceCredential;
use App\Models\Trade\RenewMarriageLicense;

class RenewLicenseMarriageService
{
    protected $aapaleSarkarLoginCheckService;

    public function __construct(AapaleSarkarLoginCheckService $aapaleSarkarLoginCheckService)
    {
        $this->aapaleSarkarLoginCheckService = $aapaleSarkarLoginCheckService;
    }


    public function store($request)
    {

        $request['user_id'] = Auth::user()->id;
        $request['service_id'] = "2030";
        $request['application_no'] = "RMHL-" . time();

        if ($request->hasFile('director_photos')) {
            $request['director_image'] = $request->director_photos->store('mobile-tower');
        }

        if ($request->hasFile('upload_prescribed_formats')) {
            $request['other_documents'] = $request->upload_prescribed_formats->store('mobile-tower');
        }

        if ($request->hasFile('ownership')) {
            $request['market_license'] = $request->ownership->store('mobile-tower');
        }

        if ($request->hasFile('water_bills')) {
            $request['food_drug_img'] = $request->water_bills->store('mobile-tower');
        }

        if ($request->hasFile('society')) {
            $request['shop_act'] = $request->society->store('mobile-tower');
        }

        if ($request->hasFile('place')) {
            $request['fire_certificate'] = $request->place->store('mobile-tower');
        }

        if ($request->hasFile('aadhar_pans')) {
            $request['pancard_image'] = $request->aadhar_pans->store('mobile-tower');
        }
        if ($request->hasFile('property')) {
            $request['aadharcard_image'] = $request->property->store('mobile-tower');
        }

        if ($request->hasFile('tenancy')) {
            $request['tax_receipt_img'] = $request->tenancy->store('mobile-tower');
        }

        if ($request->hasFile('occupancy')) {
            $request['interior_photo'] = $request->occupancy->store('mobile-tower');
        }

        if ($request->hasFile('medical')) {
            $request['exterior_photo'] = $request->medical->store('mobile-tower');
        }


        $renewLicenseMarriage = RenewMarriageLicense::create($request->all());

        if ($renewLicenseMarriage) {
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
        return RenewMarriageLicense::find($id);
    }

    public function update($request, $id)
    {
        // dd($request->all());
        DB::beginTransaction();
        try {
            // Find the existing record
            $renewLicenseMarriage = RenewMarriageLicense::find($id);

            // Handle file uploads and update original file names
            if ($request->hasFile('director_photos')) {
                if ($renewLicenseMarriage &&  $renewLicenseMarriage->director_image &&  $renewLicenseMarriage->director_image && Storage::exists($renewLicenseMarriage->director_image)) {
                    Storage::delete($renewLicenseMarriage->director_image);
                }
                $request['director_image'] = $request->director_photos->store('mobile-tower');
            }


            if ($request->hasFile('upload_prescribed_formats')) {
                if ($renewLicenseMarriage &&  $renewLicenseMarriage->other_documents &&  $renewLicenseMarriage->other_documents && Storage::exists($renewLicenseMarriage->other_documents)) {
                    Storage::delete($renewLicenseMarriage->other_documents);
                }
                $request['other_documents'] = $request->upload_prescribed_formats->store('mobile-tower');
            }

            if ($request->hasFile('aadhar_pans')) {
                if ($renewLicenseMarriage &&  $renewLicenseMarriage->pancard_image && Storage::exists($renewLicenseMarriage->pancard_image)) {
                    Storage::delete($renewLicenseMarriage->pancard_image);
                }
                $request['pancard_image'] = $request->aadhar_pans->store('mobile-tower');
            }

            if ($request->hasFile('ownership')) {
                if ($renewLicenseMarriage &&  $renewLicenseMarriage->market_license && Storage::exists($renewLicenseMarriage->market_license)) {
                    Storage::delete($renewLicenseMarriage->market_license);
                }
                $request['market_license'] = $request->ownership->store('mobile-tower');
            }


            if ($request->hasFile('water_bills')) {
                if ($renewLicenseMarriage &&  $renewLicenseMarriage->food_drug_img && Storage::exists($renewLicenseMarriage->food_drug_img)) {
                    Storage::delete($renewLicenseMarriage->food_drug_img);
                }
                $request['food_drug_img'] = $request->water_bills->store('mobile-tower');
            }


            if ($request->hasFile('society')) {
                if ($renewLicenseMarriage &&  $renewLicenseMarriage->shop_act && Storage::exists($renewLicenseMarriage->shop_act)) {
                    Storage::delete($renewLicenseMarriage->shop_act);
                }
                $request['shop_act'] = $request->society->store('mobile-tower');
            }


            if ($request->hasFile('place')) {
                if ($renewLicenseMarriage &&  $renewLicenseMarriage->fire_certificate && Storage::exists($renewLicenseMarriage->fire_certificate)) {
                    Storage::delete($renewLicenseMarriage->fire_certificate);
                }
                $request['fire_certificate'] = $request->place->store('mobile-tower');
            }

            if ($request->hasFile('property')) {
                if ($renewLicenseMarriage &&  $renewLicenseMarriage->aadharcard_image && Storage::exists($renewLicenseMarriage->aadharcard_image)) {
                    Storage::delete($renewLicenseMarriage->aadharcard_image);
                }
                $request['aadharcard_image'] = $request->property->store('mobile-tower');
            }

            if ($request->hasFile('tenancy')) {
                if ($renewLicenseMarriage &&  $renewLicenseMarriage->tax_receipt_img && Storage::exists($renewLicenseMarriage->tax_receipt_img)) {
                    Storage::delete($renewLicenseMarriage->tax_receipt_img);
                }
                $request['tax_receipt_img'] = $request->tenancy->store('mobile-tower');
            }




            if ($request->hasFile('occupancy')) {
                if ($renewLicenseMarriage &&  $renewLicenseMarriage->interior_photo && Storage::exists($renewLicenseMarriage->interior_photo)) {
                    Storage::delete($renewLicenseMarriage->interior_photo);
                }
                $request['interior_photo'] = $request->occupancy->store('mobile-tower');
            }

            if ($request->hasFile('medical')) {
                if ($renewLicenseMarriage &&  $renewLicenseMarriage->exterior_photo && Storage::exists($renewLicenseMarriage->exterior_photo)) {
                    Storage::delete($renewLicenseMarriage->exterior_photo);
                }
                $request['exterior_photo'] = $request->medical->store('mobile-tower');
            }

            $renewLicenseMarriage->update($request->all());

            DB::commit();
            return [true];
        } catch (\Exception $e) {
            DB::rollback();
            Log::info($e);
            return [false, $e->getMessage()];
        }
    }
}
