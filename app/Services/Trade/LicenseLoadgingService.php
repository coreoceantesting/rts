<?php

namespace App\Services\Trade;

use App\Services\AapaleSarkarLoginCheckService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use App\Models\Trade\LicenseLoadgingHouse;
use App\Models\ServiceCredential;

class LicenseLoadgingService
{
    protected $aapaleSarkarLoginCheckService;

    public function __construct(AapaleSarkarLoginCheckService $aapaleSarkarLoginCheckService)
    {
        $this->aapaleSarkarLoginCheckService = $aapaleSarkarLoginCheckService;
    }


    public function store($request)
    {

        $request['user_id'] = Auth::user()->id;
        $request['service_id'] = "2027";
        $request['application_no'] = "LLH-" . time();


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
        $tradenoc = LicenseLoadgingHouse::create($request->all());

        if ($tradenoc) {
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
        return LicenseLoadgingHouse::find($id);
    }

    public function update($request, $id)
    {
        // dd($request->all());
        DB::beginTransaction();
        try {
            // Find the existing record
            $licenseLoadgingHouse = LicenseLoadgingHouse::find($id);

            // Handle file uploads and update original file names


            if ($request->hasFile('director_photos')) {
                if ($licenseLoadgingHouse &&  $licenseLoadgingHouse->director_image &&  $licenseLoadgingHouse->director_image && Storage::exists($licenseLoadgingHouse->director_image)) {
                    Storage::delete($licenseLoadgingHouse->director_image);
                }
                $request['director_image'] = $request->director_photos->store('mobile-tower');
            }


            if ($request->hasFile('upload_prescribed_formats')) {
                if ($licenseLoadgingHouse &&  $licenseLoadgingHouse->other_documents &&  $licenseLoadgingHouse->other_documents && Storage::exists($licenseLoadgingHouse->other_documents)) {
                    Storage::delete($licenseLoadgingHouse->other_documents);
                }
                $request['other_documents'] = $request->upload_prescribed_formats->store('mobile-tower');
            }

            if ($request->hasFile('aadhar_pans')) {
                if ($licenseLoadgingHouse &&  $licenseLoadgingHouse->pancard_image && Storage::exists($licenseLoadgingHouse->pancard_image)) {
                    Storage::delete($licenseLoadgingHouse->pancard_image);
                }
                $request['pancard_image'] = $request->aadhar_pans->store('mobile-tower');
            }

            if ($request->hasFile('ownership')) {
                if ($licenseLoadgingHouse &&  $licenseLoadgingHouse->market_license && Storage::exists($licenseLoadgingHouse->market_license)) {
                    Storage::delete($licenseLoadgingHouse->market_license);
                }
                $request['market_license'] = $request->ownership->store('mobile-tower');
            }


            if ($request->hasFile('water_bills')) {
                if ($licenseLoadgingHouse &&  $licenseLoadgingHouse->food_drug_img && Storage::exists($licenseLoadgingHouse->food_drug_img)) {
                    Storage::delete($licenseLoadgingHouse->food_drug_img);
                }
                $request['food_drug_img'] = $request->water_bills->store('mobile-tower');
            }


            if ($request->hasFile('society')) {
                if ($licenseLoadgingHouse &&  $licenseLoadgingHouse->shop_act && Storage::exists($licenseLoadgingHouse->shop_act)) {
                    Storage::delete($licenseLoadgingHouse->shop_act);
                }
                $request['shop_act'] = $request->society->store('mobile-tower');
            }


            if ($request->hasFile('place')) {
                if ($licenseLoadgingHouse &&  $licenseLoadgingHouse->fire_certificate && Storage::exists($licenseLoadgingHouse->fire_certificate)) {
                    Storage::delete($licenseLoadgingHouse->fire_certificate);
                }
                $request['fire_certificate'] = $request->place->store('mobile-tower');
            }

            if ($request->hasFile('property')) {
                if ($licenseLoadgingHouse &&  $licenseLoadgingHouse->aadharcard_image && Storage::exists($licenseLoadgingHouse->aadharcard_image)) {
                    Storage::delete($licenseLoadgingHouse->aadharcard_image);
                }
                $request['aadharcard_image'] = $request->property->store('mobile-tower');
            }

            if ($request->hasFile('tenancy')) {
                if ($licenseLoadgingHouse &&  $licenseLoadgingHouse->tax_receipt_img && Storage::exists($licenseLoadgingHouse->tax_receipt_img)) {
                    Storage::delete($licenseLoadgingHouse->tax_receipt_img);
                }
                $request['tax_receipt_img'] = $request->tenancy->store('mobile-tower');
            }




            if ($request->hasFile('occupancy')) {
                if ($licenseLoadgingHouse &&  $licenseLoadgingHouse->interior_photo && Storage::exists($licenseLoadgingHouse->interior_photo)) {
                    Storage::delete($licenseLoadgingHouse->interior_photo);
                }
                $request['interior_photo'] = $request->occupancy->store('mobile-tower');
            }

            if ($request->hasFile('medical')) {
                if ($licenseLoadgingHouse &&  $licenseLoadgingHouse->exterior_photo && Storage::exists($licenseLoadgingHouse->exterior_photo)) {
                    Storage::delete($licenseLoadgingHouse->exterior_photo);
                }
                $request['exterior_photo'] = $request->medical->store('mobile-tower');
            }

            $licenseLoadgingHouse->update($request->all());

            DB::commit();
            return [true];
        } catch (\Exception $e) {
            DB::rollback();
            Log::info($e);
            return [false, $e->getMessage()];
        }
    }
}
