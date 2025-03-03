<?php

namespace App\Services;

use App\Services\AapaleSarkarLoginCheckService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use App\Models\MobileTower;
use App\Models\ServiceCredential;

class MobileTowerService
{
    protected $aapaleSarkarLoginCheckService;

    public function __construct(AapaleSarkarLoginCheckService $aapaleSarkarLoginCheckService)
    {
        $this->aapaleSarkarLoginCheckService = $aapaleSarkarLoginCheckService;
    }



    public function store($request)
    {
        DB::beginTransaction();
        // try {
        //     $request['user_id'] = Auth::user()->id;
        //     $request['service_id'] = '241';
        //     $request['application_no'] = "PMC-" . time();

        // Handle file uploads and store original file names
        $request['user_id'] = Auth::user()->id;
        $request['service_id'] = "2014";
        $request['application_no'] = "PMC-" . time();


        if ($request->hasFile('director_photos')) {
            $request['director_photo'] = $request->director_photos->store('mobile-tower');
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
            $request['fire_safety_certificate'] = $request->place->store('mobile-tower');
        }

        if ($request->hasFile('aadhar_pans')) {
            $request['aadhar_pan'] = $request->aadhar_pans->store('mobile-tower');
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

        // if ($request->hasFile('control')) {
        //     $request['pest_control'] = $request->control->store('mobile-tower');
        // }

        // if ($request->hasFile('registration')) {
        //     $request['gst_registration'] = $request->registration->store('mobile-tower');
        // }

        // if ($request->hasFile('food')) {
        //     $request['drug_administration'] = $request->food->store('mobile-tower');
        // }

        // if ($request->hasFile('fire')) {
        //     $request['fire_rigade'] = $request->fire->store('mobile-tower');
        // }

        // if ($request->hasFile('liquor')) {
        //     $request['liquor_license'] = $request->liquor->store('mobile-tower');
        // }
        // \Log::info($request->all());
        // dd($request->all());
        $mobiletowerservice = MobileTower::create($request->all());

        if ($mobiletowerservice) {
            // $applicationId = $request->application_no;

            // if (Auth::user()->is_aapale_sarkar_user) {
            //     $aapaleSarkarCredential = ServiceCredential::where('dept_service_id', $request->service_id)->first();
            //     $serviceDay = ($aapaleSarkarCredential->service_day) ? $aapaleSarkarCredential->service_day : 20;

            //     $send = $this->aapaleSarkarLoginCheckService->encryptAndSendRequestToAapaleSarkar(
            //         Auth::user()->trackid,
            //         $aapaleSarkarCredential->client_code,
            //         Auth::user()->user_id,
            //         $aapaleSarkarCredential->service_id,
            //         $applicationId,
            //         'N',
            //         'NA',
            //         'N',
            //         'NA',
            //         $serviceDay,
            //         date('Y-m-d', strtotime("+$serviceDay days")),
            //         config('rtsapiurl.amount'),
            //         config('rtsapiurl.requestFlag'),
            //         config('rtsapiurl.applicationStatus'),
            //         config('rtsapiurl.applicationPendingStatusTxt'),
            //         $aapaleSarkarCredential->ulb_id,
            //         $aapaleSarkarCredential->ulb_district,
            //         'NA',
            //         'NA',
            //         'NA',
            //         $aapaleSarkarCredential->check_sum_key,
            //         $aapaleSarkarCredential->str_key,
            //         $aapaleSarkarCredential->str_iv,
            //         $aapaleSarkarCredential->soap_end_point_url,
            //         $aapaleSarkarCredential->soap_action_app_status_url
            //     );

            //     if (!$send) {
            //         $this->aapaleSarkarLoginCheckService->savePendingAapaleSarkarData($applicationId, $request->service_id, Auth::user()->user_id);
            //         DB::commit();
            //         return [true];
            //     }
            // }
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
        return mobileTower::find($id);
    }

    public function update($request, $id)
    {
        DB::beginTransaction();
        try {
            // Find the existing record
            $mobiletowerservice = mobileTower::findOrFail($id);


            // Handle file uploads and update original file names
            if ($request->hasFile('director_photos')) {
                if ($mobiletowerservice &&  $mobiletowerservice->director_photo &&  $mobiletowerservice->director_photo && Storage::exists($mobiletowerservice->director_photo)) {
                    Storage::delete($mobiletowerservice->director_photo);
                }
                $request['director_photo'] = $request->director_photos->store('mobile-tower');
            }


            if ($request->hasFile('upload_prescribed_formats')) {
                if ($mobiletowerservice &&  $mobiletowerservice->other_documents &&  $mobiletowerservice->other_documents && Storage::exists($mobiletowerservice->other_documents)) {
                    Storage::delete($mobiletowerservice->other_documents);
                }
                $request['other_documents'] = $request->upload_prescribed_formats->store('mobile-tower');
            }

            if ($request->hasFile('aadhar_pans')) {
                if ($mobiletowerservice &&  $mobiletowerservice->aadhar_pan && Storage::exists($mobiletowerservice->aadhar_pan)) {
                    Storage::delete($mobiletowerservice->aadhar_pan);
                }
                $request['aadhar_pan'] = $request->aadhar_pans->store('mobile-tower');
            }

            if ($request->hasFile('ownership')) {
                if ($mobiletowerservice &&  $mobiletowerservice->market_license && Storage::exists($mobiletowerservice->market_license)) {
                    Storage::delete($mobiletowerservice->market_license);
                }
                $request['market_license'] = $request->ownership->store('mobile-tower');
            }


            if ($request->hasFile('water_bills')) {
                if ($mobiletowerservice &&  $mobiletowerservice->food_drug_img && Storage::exists($mobiletowerservice->food_drug_img)) {
                    Storage::delete($mobiletowerservice->food_drug_img);
                }
                $request['food_drug_img'] = $request->water_bills->store('mobile-tower');
            }


            if ($request->hasFile('society')) {
                if ($mobiletowerservice &&  $mobiletowerservice->shop_act && Storage::exists($mobiletowerservice->shop_act)) {
                    Storage::delete($mobiletowerservice->shop_act);
                }
                $request['shop_act'] = $request->society->store('mobile-tower');
            }


            if ($request->hasFile('place')) {
                if ($mobiletowerservice &&  $mobiletowerservice->fire_safety_certificate && Storage::exists($mobiletowerservice->fire_safety_certificate)) {
                    Storage::delete($mobiletowerservice->fire_safety_certificate);
                }
                $request['fire_safety_certificate'] = $request->place->store('mobile-tower');
            }

            if ($request->hasFile('property')) {
                if ($mobiletowerservice &&  $mobiletowerservice->aadharcard_image && Storage::exists($mobiletowerservice->aadharcard_image)) {
                    Storage::delete($mobiletowerservice->aadharcard_image);
                }
                $request['aadharcard_image'] = $request->property->store('mobile-tower');
            }

            if ($request->hasFile('tenancy')) {
                if ($mobiletowerservice &&  $mobiletowerservice->tax_receipt_img && Storage::exists($mobiletowerservice->tax_receipt_img)) {
                    Storage::delete($mobiletowerservice->tax_receipt_img);
                }
                $request['tax_receipt_img'] = $request->tenancy->store('mobile-tower');
            }




            if ($request->hasFile('occupancy')) {
                if ($mobiletowerservice &&  $mobiletowerservice->interior_photo && Storage::exists($mobiletowerservice->interior_photo)) {
                    Storage::delete($mobiletowerservice->interior_photo);
                }
                $request['interior_photo'] = $request->occupancy->store('mobile-tower');
            }

            if ($request->hasFile('medical')) {
                if ($mobiletowerservice &&  $mobiletowerservice->exterior_photo && Storage::exists($mobiletowerservice->exterior_photo)) {
                    Storage::delete($mobiletowerservice->exterior_photo);
                }
                $request['exterior_photo'] = $request->medical->store('mobile-tower');
            }



            // Update the rest of the fields
            $mobiletowerservice->update($request->all());

            DB::commit();
            return [true];
        } catch (\Exception $e) {
            DB::rollback();
            Log::error('Error in update method: ' . $e->getMessage());
            return [false, $e->getMessage()];
        }
    }
}
