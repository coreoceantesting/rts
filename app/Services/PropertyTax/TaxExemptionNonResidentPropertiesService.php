<?php

namespace App\Services\PropertyTax;

use App\Models\PropertyTax\TaxExemptionNonResidentProperties;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class TaxExemptionNonResidentPropertiesService
{
    public function store($request)
    {
        DB::beginTransaction();

        try {
            $request['user_id'] = Auth::user()->id;
            $taxExemptionNonResidentProperties = TaxExemptionNonResidentProperties::create($request->all());


            $request['service_id'] = '1';
            $data = $this->curlAPiService->sendPostRequestInObject($newData, 'http://panvelrtstest.ptaxcollection.com:8080/Pages/TaxDemands.asmx/RequestForTaxDemand', 'applicantDetails');

            // Decode JSON string to PHP array
            $data = json_decode($data, true);

            // Access the application_id
            $applicationId = $data['d']['application_id'];
            // Log::info($applicationId);

            if ($applicationId != "") {
                TaxExemptionNonResidentProperties::where('id', $taxExemptionNonResidentProperties->id)->update([
                    'application_no' => $applicationId
                ]);

                if (Auth::user()->is_aapale_sarkar_user) {
                    $aapaleSarkarCredential = ServiceCredential::where('service_name', 'Marriage register certificate')->first();

                    $send = $this->aapaleSarkarLoginCheckService->encryptAndSendRequestToAapaleSarkar(Auth::user()->trackid, $aapaleSarkarCredential->client_code, Auth::user()->user_id, $aapaleSarkarCredential->service_id, $applicationId, 'N', 'NA', 'N', 'NA', "20", date('Y-m-d', strtotime("+$aapaleSarkarCredential->service_day days")), 23.60, 1, 2, 'Payment Pending', $aapaleSarkarCredential->ulb_id, $aapaleSarkarCredential->ulb_district, 'NA', 'NA', 'NA', $aapaleSarkarCredential->check_sum_key, $aapaleSarkarCredential->str_key, $aapaleSarkarCredential->str_iv, $aapaleSarkarCredential->soap_end_point_url, $aapaleSarkarCredential->soap_action_app_status_url);

                    if (!$send) {
                        return false;
                    }
                }
            } else {
                DB::rollback();
                return false;
            }


            DB::commit();

            return true;
        } catch (\Exception $e) {
            DB::roolback();
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

            DB::commit();

            return true;
        } catch (\Exception $e) {
            DB::roolback();
            Log::info($e);
            return false;
        }
    }
}
