<?php

namespace App\Services\PropertyTax;

use App\Models\PropertyTax\SelfAssessment;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\ServiceCredential;
use App\Services\CurlAPiService;
use App\Services\AapaleSarkarLoginCheckService;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;

class SelfAssessmentService
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
            $request['service_id'] = '9';

            if ($request->hasFile('uploaded_applications')) {
                $request['uploaded_application'] = $request->uploaded_applications->store('property-tax/self-assessment');
            }
            $selfAssessment = SelfAssessment::create($request->all());


            // code to send data to department
            if ($request->hasFile('uploaded_applications')) {
                $request['uploaded_application'] = $this->curlAPiService->convertFileInBase64($request->file('uploaded_applications'));
            } else {
                $request['uploaded_application'] = "";
            }
            $request['user_id'] = (Auth::user()->user_id && Auth::user()->user_id != "") ? Auth::user()->user_id : Auth::user()->id;

            $newData = $request->except(['_token', 'uploaded_applications']);
            // Log::info($newData);
            $data = $this->curlAPiService->sendPostRequestInObject($newData, config('rtsapiurl.propertyTax') . 'AapaleSarkarAPI/SelfAssessmentService.asmx/RequestForSelfAssessmentService', 'applicantDetails');

            // Decode JSON string to PHP array
            $data = json_decode($data, true);

            if (isset($data['d']['Status']) && $data['d']['Status'] != "") {
                // Access the application_no
                $applicationId = $data['d']['application_no'];
                SelfAssessment::where('id', $selfAssessment->id)->update([
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
                if (isset($data['error']) || isset($data['d'])) {
                    return [false, $data['error'] ?? $data['d']];
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
        return SelfAssessment::find($id);
    }

    public function update($request)
    {
        DB::beginTransaction();

        try {
            $selfAssessment = SelfAssessment::find($request->id);

            if ($request->hasFile('uploaded_applications')) {
                if ($selfAssessment && Storage::exists($selfAssessment->uploaded_application)) {
                    Storage::delete($selfAssessment->uploaded_application);
                }
                $request['uploaded_application'] = $request->uploaded_applications->store('property-tax/self-assessment');
            }
            $selfAssessment->update($request->all());


            // code to send data to department
            if ($request->hasFile('uploaded_applications')) {
                $request['uploaded_application'] = $this->curlAPiService->convertFileInBase64($request->file('uploaded_applications'));
            } else {
                $request['uploaded_application'] = "";
            }
            $request['application_no'] = $selfAssessment->application_no;
            $request['user_id'] = (Auth::user()->user_id && Auth::user()->user_id != "") ? Auth::user()->user_id : Auth::user()->id;
            $newData = $request->except(['_token', 'id', 'uploaded_applications']);
            $data = $this->curlAPiService->sendPostRequestInObject($newData, config('rtsapiurl.propertyTax') . 'AapaleSarkarAPI/SelfAssessmentService.asmx/RequestForUpdateSelfAssessmentService', 'applicantDetails');

            // Decode JSON string to PHP array
            $data = json_decode($data, true);

            if (isset($data['d']['Status']) && $data['d']['Status'] != "") {
                DB::commit();
                return [true];
            } else {
                DB::rollback();
                if (isset($data['error']) || isset($data['d'])) {
                    return [false, $data['error'] ?? $data['d']];
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
