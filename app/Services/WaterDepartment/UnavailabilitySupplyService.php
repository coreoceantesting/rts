<?php

namespace App\Services\WaterDepartment;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use App\Models\WaterDepartment\WaterUnavailabilitySupply;
use App\Models\ServiceCredential;
use App\Services\CurlAPiService;
use App\Services\AapaleSarkarLoginCheckService;

class UnavailabilitySupplyService
{
    protected $curlAPiService;
    protected $aapaleSarkarLoginCheckService;

    public function __construct(CurlAPiService $curlAPiService, AapaleSarkarLoginCheckService $aapaleSarkarLoginCheckService)
    {
        $this->curlAPiService = $curlAPiService;
        $this->aapaleSarkarLoginCheckService = $aapaleSarkarLoginCheckService;
    }

    public function store($request)
    {
        DB::beginTransaction();

        try {
            $request['user_id'] = Auth::user()->id;
            $request['service_id'] = "20";
            $waterUnavailabilitySupply = WaterUnavailabilitySupply::create($request->all());


            // code to send data to department
            $request['user_id'] = (Auth::user()->user_id && Auth::user()->user_id != "") ? Auth::user()->user_id : Auth::user()->id;
            $newData = $request->except(['_token']);
            $data = $this->curlAPiService->sendPostRequestInObject($newData, config('rtsapiurl.water') . 'WaterBillMicroService/WaterbillApi/ApleSarkarService/RequestForWaterNonComplianceCertificate', '');

            // Decode JSON string to PHP array
            $data = json_decode($data, true);
            if ($data['status'] == "200") {
                // Access the application_no
                $applicationId = $data['applicationId'];
                WaterUnavailabilitySupply::where('id', $waterUnavailabilitySupply->id)->update([
                    'application_no' => $applicationId
                ]);

                if (Auth::user()->is_aapale_sarkar_user) {
                    $aapaleSarkarCredential = ServiceCredential::where('dept_service_id', $request->service_id)->first();
                    $serviceDay = ($aapaleSarkarCredential->service_day) ? $aapaleSarkarCredential->service_day : 20;

                    $send = $this->aapaleSarkarLoginCheckService->encryptAndSendRequestToAapaleSarkar(Auth::user()->trackid, $aapaleSarkarCredential->client_code, Auth::user()->user_id, $aapaleSarkarCredential->service_id, $applicationId, 'N', 'NA', 'N', 'NA', $serviceDay, date('Y-m-d', strtotime("+$serviceDay days")), config('rtsapiurl.amount'), config('rtsapiurl.requestFlag'),  config('rtsapiurl.applicationStatus'), 'Payment Pending', $aapaleSarkarCredential->ulb_id, $aapaleSarkarCredential->ulb_district, 'NA', 'NA', 'NA', $aapaleSarkarCredential->check_sum_key, $aapaleSarkarCredential->str_key, $aapaleSarkarCredential->str_iv, $aapaleSarkarCredential->soap_end_point_url, $aapaleSarkarCredential->soap_action_app_status_url);

                    if (!$send) {
                        return false;
                    }
                }
            } else {
                DB::rollback();
                return false;
            }
            // end of code to send data to department


            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollback();
            Log::error('Error in store method: ' . $e->getMessage());
            return false;
        }
    }


    public function edit($id)
    {
        return WaterUnavailabilitySupply::find($id);
    }

    public function update($request, $id)
    {
        DB::beginTransaction();
        try {
            // Find the existing record
            $waterUnavailabilitySupply = WaterUnavailabilitySupply::findOrFail($id);
            $waterUnavailabilitySupply->update($request->all());

            // code to send data to department
            $request['application_no'] = $waterUnavailabilitySupply->application_no;
            $request['user_id'] = (Auth::user()->user_id && Auth::user()->user_id != "") ? Auth::user()->user_id : Auth::user()->id;
            $newData = $request->except(['_token', 'id']);
            $data = $this->curlAPiService->sendPostRequestInObject($newData, config('rtsapiurl.water') . 'WaterBillMicroService/WaterbillApi/ApleSarkarService/RequestForUpdateWaterNonComplianceCertificate', '');

            // Decode JSON string to PHP array
            $data = json_decode($data, true);

            if ($data['status'] == "200") {
                // Access the application_no
                DB::commit();
                return true;
            } else {
                DB::rollback();
                return false;
            }
            // end of code to send data to department
        } catch (\Exception $e) {
            DB::rollback();
            Log::info($e);
            return false;
        }
    }
}
