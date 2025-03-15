<?php

namespace App\Services\Trade;

use App\Services\AapaleSarkarLoginCheckService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use App\Models\ServiceCredential;
use App\Models\Trade\ChangeHolderPartner;
use App\Models\Trade\PartnerChange;

class ChangeHolderPartnerService
{
    protected $aapaleSarkarLoginCheckService;

    public function __construct(AapaleSarkarLoginCheckService $aapaleSarkarLoginCheckService)
    {
        $this->aapaleSarkarLoginCheckService = $aapaleSarkarLoginCheckService;
    }


    public function store($request)
    {

        $request['user_id'] = Auth::user()->id;
        $request['service_id'] = "2037";
        $request['application_no'] = "CBHP-" . time();


        if ($request->hasFile('application_docs')) {
            $request['application_doc'] = $request->application_docs->store('changeholderpartner');
        }

        // if ($request->hasFile('upload_prescribed_formats')) {
        //     $request['other_documents'] = $request->upload_prescribed_formats->store('mobile-tower');
        // }

        // if ($request->hasFile('ownership')) {
        //     $request['market_license'] = $request->ownership->store('mobile-tower');
        // }

        // if ($request->hasFile('water_bills')) {
        //     $request['food_drug_img'] = $request->water_bills->store('mobile-tower');
        // }

        // if ($request->hasFile('society')) {
        //     $request['shop_act'] = $request->society->store('mobile-tower');
        // }

        // if ($request->hasFile('place')) {
        //     $request['fire_certificate'] = $request->place->store('mobile-tower');
        // }

        // if ($request->hasFile('aadhar_pans')) {
        //     $request['pancard_image'] = $request->aadhar_pans->store('mobile-tower');
        // }
        // if ($request->hasFile('property')) {
        //     $request['aadharcard_image'] = $request->property->store('mobile-tower');
        // }

        // if ($request->hasFile('tenancy')) {
        //     $request['tax_receipt_img'] = $request->tenancy->store('mobile-tower');
        // }

        // if ($request->hasFile('occupancy')) {
        //     $request['interior_photo'] = $request->occupancy->store('mobile-tower');
        // }

        // if ($request->hasFile('medical')) {
        //     $request['exterior_photo'] = $request->medical->store('mobile-tower');
        // }
        // dd($request->partner_name);
        // $partnerchanges= PartnerChange::where('partner_change_id',$id)->get();



        $changeHolderPartner = ChangeHolderPartner::create($request->all());


        foreach ($request->partner_name as $index => $partnername) {
            $partner_aadhar = $request->partner_aadhar[$index];
            $partner_address = $request->partner_address[$index];
            $partner_mobile_num = $request->partner_mobile_num[$index];
            $partner_email = $request->partner_email[$index];
            $partner_status = $request->partner_status[$index];

            PartnerChange::create([
                'partner_change_id' => $changeHolderPartner->id,
                'partner_name' => $partnername,
                'partner_aadhar' => $partner_aadhar,
                'partner_address' => $partner_address,
                'partner_mobile_num' => $partner_mobile_num,
                'partner_email' => $partner_email,
                'partner_status' => $partner_status,
            ]);
        }
        if ($changeHolderPartner) {
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
        return changeHolderPartner::find($id);
    }

    public function update($request, $id)
    {
        // dd($request->all());
        DB::beginTransaction();
        try {

            // Find the existing record
            $changeHolderPartner = ChangeHolderPartner::find($id);

            // Handle file uploads and update original file names
            if ($request->hasFile('application_docs')) {
                if ($changeHolderPartner &&  $changeHolderPartner->application_doc &&  $changeHolderPartner->application_doc && Storage::exists($changeHolderPartner->application_doc)) {
                    Storage::delete($changeHolderPartner->application_doc);
                }
                $request['application_doc'] = $request->application_docs->store('changeholderpartner');
            }


            // if ($request->hasFile('upload_prescribed_formats')) {
            //     if ($changeHolderPartner &&  $changeHolderPartner->other_documents &&  $changeHolderPartner->other_documents && Storage::exists($changeHolderPartner->other_documents)) {
            //         Storage::delete($changeHolderPartner->other_documents);
            //     }
            //     $request['other_documents'] = $request->upload_prescribed_formats->store('mobile-tower');
            // }

            // if ($request->hasFile('aadhar_pans')) {
            //     if ($changeHolderPartner &&  $changeHolderPartner->pancard_image && Storage::exists($changeHolderPartner->pancard_image)) {
            //         Storage::delete($changeHolderPartner->pancard_image);
            //     }
            //     $request['pancard_image'] = $request->aadhar_pans->store('mobile-tower');
            // }

            // if ($request->hasFile('ownership')) {
            //     if ($changeHolderPartner &&  $changeHolderPartner->market_license && Storage::exists($changeHolderPartner->market_license)) {
            //         Storage::delete($changeHolderPartner->market_license);
            //     }
            //     $request['market_license'] = $request->ownership->store('mobile-tower');
            // }


            // if ($request->hasFile('water_bills')) {
            //     if ($changeHolderPartner &&  $changeHolderPartner->food_drug_img && Storage::exists($changeHolderPartner->food_drug_img)) {
            //         Storage::delete($changeHolderPartner->food_drug_img);
            //     }
            //     $request['food_drug_img'] = $request->water_bills->store('mobile-tower');
            // }


            // if ($request->hasFile('society')) {
            //     if ($changeHolderPartner &&  $changeHolderPartner->shop_act && Storage::exists($changeHolderPartner->shop_act)) {
            //         Storage::delete($changeHolderPartner->shop_act);
            //     }
            //     $request['shop_act'] = $request->society->store('mobile-tower');
            // }


            // if ($request->hasFile('place')) {
            //     if ($changeHolderPartner &&  $changeHolderPartner->fire_certificate && Storage::exists($changeHolderPartner->fire_certificate)) {
            //         Storage::delete($changeHolderPartner->fire_certificate);
            //     }
            //     $request['fire_certificate'] = $request->place->store('mobile-tower');
            // }

            // if ($request->hasFile('property')) {
            //     if ($changeHolderPartner &&  $changeHolderPartner->aadharcard_image && Storage::exists($changeHolderPartner->aadharcard_image)) {
            //         Storage::delete($changeHolderPartner->aadharcard_image);
            //     }
            //     $request['aadharcard_image'] = $request->property->store('mobile-tower');
            // }

            // if ($request->hasFile('tenancy')) {
            //     if ($changeHolderPartner &&  $changeHolderPartner->tax_receipt_img && Storage::exists($changeHolderPartner->tax_receipt_img)) {
            //         Storage::delete($changeHolderPartner->tax_receipt_img);
            //     }
            //     $request['tax_receipt_img'] = $request->tenancy->store('mobile-tower');
            // }




            // if ($request->hasFile('occupancy')) {
            //     if ($changeHolderPartner &&  $changeHolderPartner->interior_photo && Storage::exists($changeHolderPartner->interior_photo)) {
            //         Storage::delete($changeHolderPartner->interior_photo);
            //     }
            //     $request['interior_photo'] = $request->occupancy->store('mobile-tower');
            // }

            // if ($request->hasFile('medical')) {
            //     if ($changeHolderPartner &&  $changeHolderPartner->exterior_photo && Storage::exists($changeHolderPartner->exterior_photo)) {
            //         Storage::delete($changeHolderPartner->exterior_photo);
            //     }
            //     $request['exterior_photo'] = $request->medical->store('mobile-tower');
            // }

            $changeHolderPartner->update($request->all());

            foreach ($request->partner_name as $index => $partnername) {
                $partner_aadhar = $request->partner_aadhar[$index];
                $partner_address = $request->partner_address[$index];
                $partner_mobile_num = $request->partner_mobile_num[$index];
                $partner_email = $request->partner_email[$index];
                $partner_status = $request->partner_status[$index];

                PartnerChange::updateOrCreate([
                    'partner_change_id' => $changeHolderPartner->id,
                    'partner_name' => $partnername,
                    'partner_aadhar' => $partner_aadhar,
                    'partner_address' => $partner_address,
                    'partner_mobile_num' => $partner_mobile_num,
                    'partner_email' => $partner_email,
                    'partner_status' => $partner_status,
                ]);
            }
            DB::commit();
            return [true];
        } catch (\Exception $e) {
            DB::rollback();
            Log::info($e);
            return [false, $e->getMessage()];
        }
    }
}
