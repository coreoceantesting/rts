<?php

namespace App\Services\MallaNisaranDepartment;

use App\Models\MallaNisaranDepartment\Drainage;
use App\Models\MedicalHealth\ChangeNursingLicense;
use App\Services\AapaleSarkarLoginCheckService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use App\Models\MedicalHealth\RenewalNursingLicense;
use App\Models\ServiceCredential;

class DrainageService
{
    protected $aapaleSarkarLoginCheckService;

    public function __construct(AapaleSarkarLoginCheckService $aapaleSarkarLoginCheckService)
    {
        $this->aapaleSarkarLoginCheckService = $aapaleSarkarLoginCheckService;
    }


    public function store($request)
    {

        $request['user_id'] = Auth::user()->id;
        $request['service_id'] = "2038";
        $request['application_no'] = "TIDRA-" . time();

        if ($request->hasFile('property_taxs')) {
            $request['property_tax'] = $request->property_taxs->store('drainage');
        }
        if ($request->hasFile('property_photos')) {
            $request['property_photo'] = $request->property_photos->store('drainage');
        }

        if ($request->hasFile('water_taxs')) {
            $request['water_tax'] = $request->water_taxs->store('drainage');
        }
        if ($request->hasFile('passport_size_photos')) {
            $request['passport_size_photo'] = $request->passport_size_photos->store('drainage');
        }
        if ($request->hasFile('aadharcard_photos')) {
            $request['aadharcard_photo'] = $request->aadharcard_photos->store('drainage');
        }
        $drainageservice=Drainage::create($request->all());

        if ($drainageservice) {
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
        return Drainage::find($id);
    }

    public function update($request, $id)
    {
        // dd($request->all());
        DB::beginTransaction();
        try {
            // Find the existing record
            $drainageservice = Drainage::find($id);

            // Handle file uploads and update original file names

            $drainageservice->update($request->all());

            DB::commit();
            return [true];
        } catch (\Exception $e) {
            DB::rollback();
            Log::info($e);
            return [false, $e->getMessage()];
        }
    }
}
