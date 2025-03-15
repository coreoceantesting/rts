<?php

namespace App\Services\Trade;

use App\Services\AapaleSarkarLoginCheckService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use App\Models\ServiceCredential;
use App\Models\Trade\IssuanceLicenseMarriage;

class IssuanceLicenseMarriageService
{
    protected $aapaleSarkarLoginCheckService;

    public function __construct(AapaleSarkarLoginCheckService $aapaleSarkarLoginCheckService)
    {
        $this->aapaleSarkarLoginCheckService = $aapaleSarkarLoginCheckService;
    }


    public function store($request)
    {

        $request['user_id'] = Auth::user()->id;
        $request['service_id'] = "2029";
        $request['application_no'] = "MHL-" . time();


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

        $issueLicenseMarriage=IssuanceLicenseMarriage::create($request->all());

        if ($issueLicenseMarriage) {
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
        return IssuanceLicenseMarriage::find($id);
    }

    public function update($request, $id)
    {
        // dd($request->all());
        DB::beginTransaction();
        try {

            // Find the existing record
            $issueLicenseMarriage = IssuanceLicenseMarriage::find($id);

            // Handle file uploads and update original file names
            if ($request->hasFile('director_photos')) {
                if ($issueLicenseMarriage &&  $issueLicenseMarriage->director_image &&  $issueLicenseMarriage->director_image && Storage::exists($issueLicenseMarriage->director_image)) {
                    Storage::delete($issueLicenseMarriage->director_image);
                }
                $request['director_image'] = $request->director_photos->store('mobile-tower');
            }


            if ($request->hasFile('upload_prescribed_formats')) {
                if ($issueLicenseMarriage &&  $issueLicenseMarriage->other_documents &&  $issueLicenseMarriage->other_documents && Storage::exists($issueLicenseMarriage->other_documents)) {
                    Storage::delete($issueLicenseMarriage->other_documents);
                }
                $request['other_documents'] = $request->upload_prescribed_formats->store('mobile-tower');
            }

            if ($request->hasFile('aadhar_pans')) {
                if ($issueLicenseMarriage &&  $issueLicenseMarriage->pancard_image && Storage::exists($issueLicenseMarriage->pancard_image)) {
                    Storage::delete($issueLicenseMarriage->pancard_image);
                }
                $request['pancard_image'] = $request->aadhar_pans->store('mobile-tower');
            }

            if ($request->hasFile('ownership')) {
                if ($issueLicenseMarriage &&  $issueLicenseMarriage->market_license && Storage::exists($issueLicenseMarriage->market_license)) {
                    Storage::delete($issueLicenseMarriage->market_license);
                }
                $request['market_license'] = $request->ownership->store('mobile-tower');
            }


            if ($request->hasFile('water_bills')) {
                if ($issueLicenseMarriage &&  $issueLicenseMarriage->food_drug_img && Storage::exists($issueLicenseMarriage->food_drug_img)) {
                    Storage::delete($issueLicenseMarriage->food_drug_img);
                }
                $request['food_drug_img'] = $request->water_bills->store('mobile-tower');
            }


            if ($request->hasFile('society')) {
                if ($issueLicenseMarriage &&  $issueLicenseMarriage->shop_act && Storage::exists($issueLicenseMarriage->shop_act)) {
                    Storage::delete($issueLicenseMarriage->shop_act);
                }
                $request['shop_act'] = $request->society->store('mobile-tower');
            }


            if ($request->hasFile('place')) {
                if ($issueLicenseMarriage &&  $issueLicenseMarriage->fire_certificate && Storage::exists($issueLicenseMarriage->fire_certificate)) {
                    Storage::delete($issueLicenseMarriage->fire_certificate);
                }
                $request['fire_certificate'] = $request->place->store('mobile-tower');
            }

            if ($request->hasFile('property')) {
                if ($issueLicenseMarriage &&  $issueLicenseMarriage->aadharcard_image && Storage::exists($issueLicenseMarriage->aadharcard_image)) {
                    Storage::delete($issueLicenseMarriage->aadharcard_image);
                }
                $request['aadharcard_image'] = $request->property->store('mobile-tower');
            }

            if ($request->hasFile('tenancy')) {
                if ($issueLicenseMarriage &&  $issueLicenseMarriage->tax_receipt_img && Storage::exists($issueLicenseMarriage->tax_receipt_img)) {
                    Storage::delete($issueLicenseMarriage->tax_receipt_img);
                }
                $request['tax_receipt_img'] = $request->tenancy->store('mobile-tower');
            }




            if ($request->hasFile('occupancy')) {
                if ($issueLicenseMarriage &&  $issueLicenseMarriage->interior_photo && Storage::exists($issueLicenseMarriage->interior_photo)) {
                    Storage::delete($issueLicenseMarriage->interior_photo);
                }
                $request['interior_photo'] = $request->occupancy->store('mobile-tower');
            }

            if ($request->hasFile('medical')) {
                if ($issueLicenseMarriage &&  $issueLicenseMarriage->exterior_photo && Storage::exists($issueLicenseMarriage->exterior_photo)) {
                    Storage::delete($issueLicenseMarriage->exterior_photo);
                }
                $request['exterior_photo'] = $request->medical->store('mobile-tower');
            }

            $issueLicenseMarriage->update($request->all());

            DB::commit();
            return [true];
        } catch (\Exception $e) {
            DB::rollback();
            Log::info($e);
            return [false, $e->getMessage()];
        }
    }
}
