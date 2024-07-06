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
            if ($request->hasFile('uploaded_applications')) {
                $request['uploaded_application'] = $request->uploaded_applications->store('propertyTax/tax-demand');
            }
            $taxdemand = TaxDemand::create($request->all());



            // code to send data to city structure portal
            $fileData = [
                'uploaded_application' => storage_path('app/' . $taxdemand->uploaded_application),
            ];
            Log::info($fileData);
            $request['service_id'] = '1';
            $request['upic_id'] = 'PNVL000041';
            $data = $this->curlAPiService->sendPostRequest($request->all(), 'http://panvelrtstest.ptaxcollection.com:8080/Pages/TaxDemands.asmx/RequestForTaxDemand', $fileData);

            $arr = json_decode($data);
            Log::info($arr);

            // if ($arr->success) {
            //     CityStructurePartMap::where('id', $cityStructurePartMap->id)->update([
            //         'application_no' => $arr->result->application_no
            //     ]);

            //     // call function to send data to aapale sarkar portal
            //     // if (Auth::user()->is_aapale_sarkar_user) {
            //     //     $aapaleSarkarCredential = ServiceCredential::where('service_name', 'Marriage register certificate')->first();

            //     //     $send = $this->aapaleSarkarLoginCheckService->encryptAndSendRequestToAapaleSarkar(Auth::user()->trackid, $aapaleSarkarCredential->client_code, Auth::user()->user_id, $aapaleSarkarCredential->service_id, 'application number', 'N', 'NA', 'N', 'NA', "20", date('Y-m-d', strtotime("+$aapaleSarkarCredential->service_day days")), 23.60, 1, 2, 'Payment Pending', $aapaleSarkarCredential->ulb_id, $aapaleSarkarCredential->ulb_district, 'NA', 'NA', 'NA', $aapaleSarkarCredential->check_sum_key, $aapaleSarkarCredential->str_key, $aapaleSarkarCredential->str_iv, $aapaleSarkarCredential->soap_end_point_url, $aapaleSarkarCredential->soap_action_app_status_url);

            //     //     if (!$send) {
            //     //         return false;
            //     //     }
            //     // }
            //     // end of call function to send data to aapale sarkar portal
            // } else {
            //     DB::rollback();
            //     return false;
            // }
            // end of code to send data to city structure portal

            return false;
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

            DB::commit();

            return true;
        } catch (\Exception $e) {
            DB::roolback();
            Log::info($e);
            return false;
        }
    }
}
