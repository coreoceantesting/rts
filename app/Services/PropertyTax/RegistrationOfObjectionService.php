<?php

namespace App\Services\PropertyTax;

use App\Models\PropertyTax\RegistrationOfObjection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class RegistrationOfObjectionService
{
    public function store($request)
    {
        DB::beginTransaction();

        try {
            $request['user_id'] = Auth::user()->id;
            if ($request->hasFile('uploaded_applications')) {
                $request['uploaded_application'] = $request->uploaded_applications->store('propertyTax/reg-of-obj');
            }
            if ($request->hasFile('no_dues_documents')) {
                $request['no_dues_document'] = $request->no_dues_documents->store('propertyTax/reg-of-obj');
            }

            $registrationOfObjection = RegistrationOfObjection::create($request->all());


            $request['uploaded_application'] = $this->curlAPiService->convertFileInBase64($request->file('uploaded_applications'));
            $request['no_dues_document'] = $this->curlAPiService->convertFileInBase64($request->file('no_dues_documents'));

            $request['service_id'] = '1';

            $newData = $request->except(['no_dues_documents', 'uploaded_applications']);
            $data = $this->curlAPiService->sendPostRequestInObject($newData, 'http://panvelrtstest.ptaxcollection.com:8080/Pages/TaxDemands.asmx/RequestForTaxDemand', 'applicantDetails');

            // Decode JSON string to PHP array
            $data = json_decode($data, true);

            // Access the application_id
            $applicationId = $data['d']['application_id'];
            // Log::info($applicationId);

            if ($applicationId != "") {
                RegistrationOfObjection::where('id', $registrationOfObjection->id)->update([
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
        return RegistrationOfObjection::find($id);
    }

    public function update($request)
    {
        DB::beginTransaction();

        try {
            $registrationOfObjection = RegistrationOfObjection::find($request->id);
            if ($request->hasFile('uploaded_applications')) {
                if ($registrationOfObjection && Storage::exists($registrationOfObjection->uploaded_application)) {
                    Storage::delete($registrationOfObjection->uploaded_application);
                }
                $request['uploaded_application'] = $request->uploaded_applications->store('propertyTax/reg-of-obj');
            }
            if ($request->hasFile('no_dues_documents')) {
                if ($registrationOfObjection && Storage::exists($registrationOfObjection->no_dues_document)) {
                    Storage::delete($registrationOfObjection->no_dues_document);
                }
                $request['no_dues_document'] = $request->no_dues_documents->store('propertyTax/reg-of-obj');
            }
            $registrationOfObjection->update($request->all());

            DB::commit();

            return true;
        } catch (\Exception $e) {
            DB::roolback();
            Log::info($e);
            return false;
        }
    }
}
