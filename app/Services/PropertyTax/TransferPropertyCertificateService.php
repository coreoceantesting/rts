<?php

namespace App\Services\PropertyTax;

use App\Models\PropertyTax\transferPropertyCertificate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use App\Models\ServiceCredential;
use App\Services\CurlAPiService;
use App\Services\AapaleSarkarLoginCheckService;

class TransferPropertyCertificateService
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
                $request['uploaded_application'] = $request->uploaded_applications->store('propertyTax/transfer-property');
            }

            if ($request->hasFile('certificate_of_no_duess')) {
                $request['certificate_of_no_dues'] = $request->certificate_of_no_duess->store('propertyTax/transfer-property');
            }

            if ($request->hasFile('copy_of_documents')) {
                $request['copy_of_document'] = $request->copy_of_documents->store('propertyTax/transfer-property');
            }

            $transferPropertyCertificate = TransferPropertyCertificate::create($request->all());


            $request['uploaded_application'] = $this->curlAPiService->convertFileInBase64($request->file('uploaded_applications'));
            $request['certificate_of_no_dues'] = $this->curlAPiService->convertFileInBase64($request->file('certificate_of_no_duess'));
            $request['copy_of_document'] = $this->curlAPiService->convertFileInBase64($request->file('copy_of_documents'));

            $request['service_id'] = '1';

            $newData = $request->except(['uploaded_applications', 'certificate_of_no_duess', 'copy_of_documents']);
            $data = $this->curlAPiService->sendPostRequestInObject($newData, config('rtsapiurl.propertyTax') . 'AapaleSarkarAPI/TransferOfPropertyCertificate.asmx/RequestForTransferOfPropertyCertificate', 'applicantDetails');

            // Decode JSON string to PHP array
            $data = json_decode($data, true);

            // Access the application_id
            $applicationId = $data['d']['application_id'];

            if ($applicationId != "") {
                TransferPropertyCertificate::where('id', $transferPropertyCertificate->id)->update([
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
        return transferPropertyCertificate::find($id);
    }

    public function update($request)
    {
        DB::beginTransaction();

        try {
            $transferPropertyCertificate = TransferPropertyCertificate::find($request->id);
            if ($request->hasFile('uploaded_applications')) {
                if ($transferPropertyCertificate && Storage::exists($transferPropertyCertificate->uploaded_application)) {
                    Storage::delete($transferPropertyCertificate->uploaded_application);
                }
                $request['uploaded_application'] = $request->uploaded_applications->store('propertyTax/transfer-property');
            }

            if ($request->hasFile('certificate_of_no_duess')) {
                if ($transferPropertyCertificate && Storage::exists($transferPropertyCertificate->certificate_of_no_dues)) {
                    Storage::delete($transferPropertyCertificate->certificate_of_no_dues);
                }
                $request['certificate_of_no_dues'] = $request->certificate_of_no_duess->store('propertyTax/transfer-property');
            }

            if ($request->hasFile('copy_of_documents')) {
                if ($transferPropertyCertificate && Storage::exists($transferPropertyCertificate->copy_of_document)) {
                    Storage::delete($transferPropertyCertificate->copy_of_document);
                }
                $request['copy_of_document'] = $request->copy_of_documents->store('propertyTax/transfer-property');
            }

            $transferPropertyCertificate->update($request->all());

            DB::commit();

            return true;
        } catch (\Exception $e) {
            DB::rollback();
            Log::info($e);
            return false;
        }
    }
}
