<?php

namespace App\Services\PropertyTax;

use App\Models\PropertyTax\TransferPropertyCertificate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use App\Models\ServiceCredential;
use App\Services\CurlAPiService;
use App\Services\AapaleSarkarLoginCheckService;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;

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
            $request['service_id'] = '4';
            if ($request->hasFile('uploaded_applications')) {
                $request['uploaded_application'] = $request->uploaded_applications->store('property-tax/transfer-property');
            }
            if ($request->hasFile('certificate_of_no_duess')) {
                $request['certificate_of_no_dues'] = $request->certificate_of_no_duess->store('property-tax/transfer-property');
            }
            if ($request->hasFile('copy_of_documents')) {
                $request['copy_of_document'] = $request->copy_of_documents->store('property-tax/transfer-property');
            }
            $request['date_of_registration_document'] = date('Y-m-d', strtotime($request->date_of_registration_document));
            $transferPropertyCertificate = TransferPropertyCertificate::create($request->all());


            // code to send data to department
            if ($request->hasFile('uploaded_applications')) {
                $request['uploaded_application'] = $this->curlAPiService->convertFileInBase64($request->file('uploaded_applications'));
            } else {
                $request['uploaded_application'] = "";
            }
            if ($request->hasFile('certificate_of_no_duess')) {
                $request['certificate_of_no_dues'] = $this->curlAPiService->convertFileInBase64($request->file('certificate_of_no_duess'));
            } else {
                $request['certificate_of_no_dues'] = "";
            }
            if ($request->hasFile('copy_of_documents')) {
                $request['copy_of_document'] = $this->curlAPiService->convertFileInBase64($request->file('copy_of_documents'));
            } else {
                $request['copy_of_document'] = "";
            }
            $request['user_id'] = (Auth::user()->user_id && Auth::user()->user_id != "") ? Auth::user()->user_id : Auth::user()->id;

            $newData = $request->except(['_token', 'uploaded_applications', 'certificate_of_no_duess', 'copy_of_documents']);
            $data = $this->curlAPiService->sendPostRequestInObject($newData, config('rtsapiurl.propertyTax') . 'AapaleSarkarAPI/TransferOfPropertyCertificate.asmx/RequestForTransferOfPropertyCertificate', 'applicantDetails');

            // Decode JSON string to PHP array
            $data = json_decode($data, true);

            if (isset($data['d']['Status']) && $data['d']['Status'] == "200") {
                // Access the application_no
                $applicationId = $data['d']['application_no'];
                TransferPropertyCertificate::where('id', $transferPropertyCertificate->id)->update([
                    'application_no' => $applicationId
                ]);

                if (Auth::user()->is_aapale_sarkar_user) {
                    $aapaleSarkarCredential = ServiceCredential::where('dept_service_id', $request->service_id)->first();
                    $serviceDay = ($aapaleSarkarCredential->service_day) ? $aapaleSarkarCredential->service_day : 20;

                    $send = $this->aapaleSarkarLoginCheckService->encryptAndSendRequestToAapaleSarkar(Auth::user()->trackid, $aapaleSarkarCredential->client_code, Auth::user()->user_id, $aapaleSarkarCredential->service_id, $applicationId, 'N', 'NA', 'N', 'NA', $serviceDay, date('Y-m-d', strtotime("+$serviceDay days")), config('rtsapiurl.amount'), config('rtsapiurl.requestFlag'), config('rtsapiurl.applicationStatus'), config('rtsapiurl.applicationPendingStatusTxt'), $aapaleSarkarCredential->ulb_id, $aapaleSarkarCredential->ulb_district, 'NA', 'NA', 'NA', $aapaleSarkarCredential->check_sum_key, $aapaleSarkarCredential->str_key, $aapaleSarkarCredential->str_iv, $aapaleSarkarCredential->soap_end_point_url, $aapaleSarkarCredential->soap_action_app_status_url);

                    if (!$send) {
                        $this->aapaleSarkarLoginCheckService->savePendingAapaleSarkarData($applicationId, $request->service_id, Auth::user()->user_id);
                        DB::commit();
                        return [true];
                    }
                }
                // $subject = "Testing Subject";
                // $message = "Testing Message";
                // Mail::to($request->email_id)->send(new SendMail($subject, $message));
            } else {
                DB::rollback();
                if (isset($data['d']['Error']) || isset($data['d'])) {
                    return [false, $data['d']['Error'] ?? $data['d']];
                } else {
                    return [false, "Something went wrong, please try again"];
                }
            }
            // end of code to send data to department

            DB::commit();
            return [true];
        } catch (\Exception $e) {
            DB::rollback();
            Log::info($e);
            return [false, $e->getMessage()];
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
                $request['uploaded_application'] = $request->uploaded_applications->store('property-tax/transfer-property');
            }
            if ($request->hasFile('certificate_of_no_duess')) {
                if ($transferPropertyCertificate && Storage::exists($transferPropertyCertificate->certificate_of_no_dues)) {
                    Storage::delete($transferPropertyCertificate->certificate_of_no_dues);
                }
                $request['certificate_of_no_dues'] = $request->certificate_of_no_duess->store('property-tax/transfer-property');
            }
            if ($request->hasFile('copy_of_documents')) {
                if ($transferPropertyCertificate && Storage::exists($transferPropertyCertificate->copy_of_document)) {
                    Storage::delete($transferPropertyCertificate->copy_of_document);
                }
                $request['copy_of_document'] = $request->copy_of_documents->store('property-tax/transfer-property');
            }
            $transferPropertyCertificate->update($request->all());


            // code to send data to department
            if ($request->hasFile('uploaded_applications')) {
                $request['uploaded_application'] = $this->curlAPiService->convertFileInBase64($request->file('uploaded_applications'));
            } else {
                $request['uploaded_application'] = "";
            }
            if ($request->hasFile('certificate_of_no_duess')) {
                $request['certificate_of_no_dues'] = $this->curlAPiService->convertFileInBase64($request->file('certificate_of_no_duess'));
            } else {
                $request['certificate_of_no_dues'] = "";
            }
            if ($request->hasFile('copy_of_documents')) {
                $request['copy_of_document'] = $this->curlAPiService->convertFileInBase64($request->file('copy_of_documents'));
            } else {
                $request['copy_of_document'] = "";
            }
            $request['application_no'] = $transferPropertyCertificate->application_no;
            $request['user_id'] = (Auth::user()->user_id && Auth::user()->user_id != "") ? Auth::user()->user_id : Auth::user()->id;
            $newData = $request->except(['_token', 'id', 'uploaded_applications', 'certificate_of_no_duess', 'copy_of_documents']);
            $data = $this->curlAPiService->sendPostRequestInObject($newData, config('rtsapiurl.propertyTax') . 'AapaleSarkarAPI/TransferOfPropertyCertificate.asmx/RequestForUpdateTransferOfPropertyCertificate', 'applicantDetails');

            // Decode JSON string to PHP array
            $data = json_decode($data, true);

            if (isset($data['d']['Status']) && $data['d']['Status'] == "200") {
                // Access the application_no
                DB::commit();
                return [true];
            } else {
                DB::rollback();
                if (isset($data['d']['Error']) || isset($data['d'])) {
                    return [false, $data['d']['Error'] ?? $data['d']];
                } else {
                    return [false, "Something went wrong, please try again"];
                }
            }
            // end of code to send data to department
        } catch (\Exception $e) {
            DB::rollback();
            Log::info($e);
            return [false, $e->getMessage()];
        }
    }
}
