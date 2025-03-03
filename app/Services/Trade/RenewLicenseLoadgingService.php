<?php

namespace App\Services\Trade;

use App\Services\AapaleSarkarLoginCheckService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use App\Models\ServiceCredential;
use App\Models\Trade\RenewLicenseLoadging;

class RenewLicenseLoadgingService
{
    protected $aapaleSarkarLoginCheckService;

    public function __construct(AapaleSarkarLoginCheckService $aapaleSarkarLoginCheckService)
    {
        $this->aapaleSarkarLoginCheckService = $aapaleSarkarLoginCheckService;
    }


    public function store($request)
    {

        $request['user_id'] = Auth::user()->id;
        $request['service_id'] = "2028";
        $request['application_no'] = "RLLH-" . time();

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

        $renewLicenseLoadging=RenewLicenseLoadging::create($request->all());

        if ($renewLicenseLoadging) {
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
        return RenewLicenseLoadging::find($id);
    }

    public function update($request, $id)
    {
        // dd($request->all());
        DB::beginTransaction();
        try {
            // Find the existing record
            $renewLicenseLoadging = RenewLicenseLoadging::find($id);

            // Handle file uploads and update original file names

            if ($request->hasFile('director_photos')) {
                if ($renewLicenseLoadging &&  $renewLicenseLoadging->director_image &&  $renewLicenseLoadging->director_image && Storage::exists($renewLicenseLoadging->director_image)) {
                    Storage::delete($renewLicenseLoadging->director_image);
                }
                $request['director_image'] = $request->director_photos->store('mobile-tower');
            }


            if ($request->hasFile('upload_prescribed_formats')) {
                if ($renewLicenseLoadging &&  $renewLicenseLoadging->other_documents &&  $renewLicenseLoadging->other_documents && Storage::exists($renewLicenseLoadging->other_documents)) {
                    Storage::delete($renewLicenseLoadging->other_documents);
                }
                $request['other_documents'] = $request->upload_prescribed_formats->store('mobile-tower');
            }

            if ($request->hasFile('aadhar_pans')) {
                if ($renewLicenseLoadging &&  $renewLicenseLoadging->pancard_image && Storage::exists($renewLicenseLoadging->pancard_image)) {
                    Storage::delete($renewLicenseLoadging->pancard_image);
                }
                $request['pancard_image'] = $request->aadhar_pans->store('mobile-tower');
            }

            if ($request->hasFile('ownership')) {
                if ($renewLicenseLoadging &&  $renewLicenseLoadging->market_license && Storage::exists($renewLicenseLoadging->market_license)) {
                    Storage::delete($renewLicenseLoadging->market_license);
                }
                $request['market_license'] = $request->ownership->store('mobile-tower');
            }


            if ($request->hasFile('water_bills')) {
                if ($renewLicenseLoadging &&  $renewLicenseLoadging->food_drug_img && Storage::exists($renewLicenseLoadging->food_drug_img)) {
                    Storage::delete($renewLicenseLoadging->food_drug_img);
                }
                $request['food_drug_img'] = $request->water_bills->store('mobile-tower');
            }


            if ($request->hasFile('society')) {
                if ($renewLicenseLoadging &&  $renewLicenseLoadging->shop_act && Storage::exists($renewLicenseLoadging->shop_act)) {
                    Storage::delete($renewLicenseLoadging->shop_act);
                }
                $request['shop_act'] = $request->society->store('mobile-tower');
            }


            if ($request->hasFile('place')) {
                if ($renewLicenseLoadging &&  $renewLicenseLoadging->fire_certificate && Storage::exists($renewLicenseLoadging->fire_certificate)) {
                    Storage::delete($renewLicenseLoadging->fire_certificate);
                }
                $request['fire_certificate'] = $request->place->store('mobile-tower');
            }

            if ($request->hasFile('property')) {
                if ($renewLicenseLoadging &&  $renewLicenseLoadging->aadharcard_image && Storage::exists($renewLicenseLoadging->aadharcard_image)) {
                    Storage::delete($renewLicenseLoadging->aadharcard_image);
                }
                $request['aadharcard_image'] = $request->property->store('mobile-tower');
            }

            if ($request->hasFile('tenancy')) {
                if ($renewLicenseLoadging &&  $renewLicenseLoadging->tax_receipt_img && Storage::exists($renewLicenseLoadging->tax_receipt_img)) {
                    Storage::delete($renewLicenseLoadging->tax_receipt_img);
                }
                $request['tax_receipt_img'] = $request->tenancy->store('mobile-tower');
            }




            if ($request->hasFile('occupancy')) {
                if ($renewLicenseLoadging &&  $renewLicenseLoadging->interior_photo && Storage::exists($renewLicenseLoadging->interior_photo)) {
                    Storage::delete($renewLicenseLoadging->interior_photo);
                }
                $request['interior_photo'] = $request->occupancy->store('mobile-tower');
            }

            if ($request->hasFile('medical')) {
                if ($renewLicenseLoadging &&  $renewLicenseLoadging->exterior_photo && Storage::exists($renewLicenseLoadging->exterior_photo)) {
                    Storage::delete($renewLicenseLoadging->exterior_photo);
                }
                $request['exterior_photo'] = $request->medical->store('mobile-tower');
            }

            $renewLicenseLoadging->update($request->all());

            DB::commit();
            return [true];
        } catch (\Exception $e) {
            DB::rollback();
            Log::info($e);
            return [false, $e->getMessage()];
        }
    }
}
