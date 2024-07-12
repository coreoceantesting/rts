<?php

namespace App\Services\PropertyTax;

use App\Models\PropertyTax\TaxDemand;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use App\Models\ServiceCredential;
use App\Services\CurlAPiService;
use App\Services\AapaleSarkarLoginCheckService;

class TaxDemandService
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
            $request['service_id'] = '6';
            if ($request->hasFile('uploaded_applications')) {
                $request['uploaded_application'] = $request->uploaded_applications->store('propertyTax/tax-demand');
            }
            $taxDemand = TaxDemand::create($request->all());


            // code to send data to department
            if ($request->hasFile('uploaded_applications')) {
                $request['uploaded_application'] = $this->curlAPiService->convertFileInBase64($request->file('uploaded_applications'));
            } else {
                $request['uploaded_application'] = "";
            }

            $request['user_id'] = (Auth::user()->user_id && Auth::user()->user_id != "") ? Auth::user()->user_id : Auth::user()->id;

            $newData = $request->except(['uploaded_applications']);
            $data = $this->curlAPiService->sendPostRequestInObject($newData, config('rtsapiurl.propertyTax') . 'AapaleSarkarAPI/TaxDemands.asmx/RequestForTaxDemand', 'TaxDemandss');

            // Decode JSON string to PHP array
            $data = json_decode($data, true);

            if ($data['d']['Status'] == "200") {
                // Access the application_no
                $applicationId = $data['d']['application_no'];
                TaxDemand::where('id', $taxDemand->id)->update([
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
        return TaxDemand::find($id);
    }

    public function update($request)
    {
        DB::beginTransaction();

        try {
            $taxDemand = TaxDemand::find($request->id);
            if ($request->hasFile('uploaded_applications')) {
                if ($taxDemand && Storage::exists($taxDemand->uploaded_application)) {
                    Storage::delete($taxDemand->uploaded_application);
                }
                $request['uploaded_application'] = $request->uploaded_applications->store('propertyTax/tax-demand');
            }
            $taxDemand->update($request->all());


            // code to send data to department
            if ($request->hasFile('uploaded_applications')) {
                $request['uploaded_application'] = $this->curlAPiService->convertFileInBase64($request->file('uploaded_applications'));
            } else {
                $request['uploaded_application'] = "";
            }
            $request['application_no'] = $taxDemand->application_no;
            $request['user_id'] = (Auth::user()->user_id && Auth::user()->user_id != "") ? Auth::user()->user_id : Auth::user()->id;
            $newData = $request->except(['uploaded_applications']);
            $data = $this->curlAPiService->sendPostRequestInObject($newData, config('rtsapiurl.propertyTax') . 'AapaleSarkarAPI/TaxDemands.asmx/RequestForUpdateTaxDemands', 'TaxDemandss');

            // Decode JSON string to PHP array
            $data = json_decode($data, true);

            if ($data['d']['Status'] == "200") {
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
