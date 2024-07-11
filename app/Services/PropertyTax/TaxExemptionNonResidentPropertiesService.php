<?php

namespace App\Services\PropertyTax;

use App\Models\PropertyTax\TaxExemptionNonResidentProperties;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\Models\ServiceCredential;
use App\Services\CurlAPiService;
use App\Services\AapaleSarkarLoginCheckService;

class TaxExemptionNonResidentPropertiesService
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
            $taxExemptionNonResidentProperties = TaxExemptionNonResidentProperties::create($request->all());

            // code to send data to department
            $request['service_id'] = '11';
            $request['user_id'] = (Auth::user()->user_id && Auth::user()->user_id != "") ? Auth::user()->user_id : Auth::user()->id;
            $data = $this->curlAPiService->sendPostRequestInObject($request->all(), config('rtsapiurl.propertyTax') . 'AapaleSarkarAPI/TaxExemptionForNonResidentProperties.asmx/RequestForTaxExemptionForNonResidentProperties', 'applicantDetails');

            // Decode JSON string to PHP array
            $data = json_decode($data, true);

            if ($data['d']['Status'] == "200") {
                // Access the application_id
                $applicationId = $data['d']['application_id'];
                TaxExemptionNonResidentProperties::where('id', $taxExemptionNonResidentProperties->id)->update([
                    'application_no' => $applicationId
                ]);

                if (Auth::user()->is_aapale_sarkar_user) {
                    $aapaleSarkarCredential = ServiceCredential::where('dept_service_id', $request->service_id)->first();

                    $send = $this->aapaleSarkarLoginCheckService->encryptAndSendRequestToAapaleSarkar(Auth::user()->trackid, $aapaleSarkarCredential->client_code, Auth::user()->user_id, $aapaleSarkarCredential->service_id, $applicationId, 'N', 'NA', 'N', 'NA', "20", date('Y-m-d', strtotime("+$aapaleSarkarCredential->service_day days")), 23.60, 1, 2, 'Payment Pending', $aapaleSarkarCredential->ulb_id, $aapaleSarkarCredential->ulb_district, 'NA', 'NA', 'NA', $aapaleSarkarCredential->check_sum_key, $aapaleSarkarCredential->str_key, $aapaleSarkarCredential->str_iv, $aapaleSarkarCredential->soap_end_point_url, $aapaleSarkarCredential->soap_action_app_status_url);

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
            Log::info($e);
            return false;
        }
    }

    public function edit($id)
    {
        return TaxExemptionNonResidentProperties::find($id);
    }

    public function update($request)
    {
        DB::beginTransaction();

        try {
            $taxExemptionNonResidentProperties = TaxExemptionNonResidentProperties::find($request->id);
            $taxExemptionNonResidentProperties->update($request->all());

            // code to send data to department
            $request['application_no'] = $taxExemptionNonResidentProperties->application_no;
            $request['user_id'] = (Auth::user()->user_id && Auth::user()->user_id != "") ? Auth::user()->user_id : Auth::user()->id;
            $data = $this->curlAPiService->sendPostRequestInObject($request->all(), config('rtsapiurl.propertyTax') . 'AapaleSarkarAPI/TaxExemptionForNonResidentProperties.asmx/RequestForUpdateTaxExemptionForNonResidentProperties', 'applicantDetails');

            // Decode JSON string to PHP array
            $data = json_decode($data, true);

            if ($data['d']['Status'] == "200") {
                // Access the application_id
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
