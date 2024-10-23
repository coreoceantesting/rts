<?php

namespace App\Services\ConstructionDepartment;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use App\Models\ConstructionDepartment\ConstructionRoadCutting;
use App\Models\ServiceCredential;
use App\Services\CurlAPiService;
use App\Services\AapaleSarkarLoginCheckService;

class RoadCuttingService
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
            $request['service_id'] = "187";
            // Handle file uploads and store original file names
            if ($request->hasFile('upload_prescribed_formats')) {
                $request['upload_prescribed_format'] = $request->upload_prescribed_formats->store('construction-department/road-cutting');
            }
            if ($request->hasFile('upload_no_dues_certificates')) {
                $request['upload_no_dues_certificate'] = $request->upload_no_dues_certificates->store('construction-department/road-cutting');
            }
            if ($request->hasFile('upload_gov_instructed_docs')) {
                $request['upload_gov_instructed_doc'] = $request->upload_gov_instructed_docs->store('construction-department/road-cutting');
            }
            $constructionRoadCutting = ConstructionRoadCutting::create($request->all());


            // code to send data to department
            // if ($request->hasFile('upload_prescribed_formats')) {
            //     $request['upload_prescribed_format'] = $this->curlAPiService->convertFileInBase64($request->file('upload_prescribed_formats'));
            // } else {
            //     $request['upload_prescribed_format'] = "";
            // }
            // if ($request->hasFile('upload_no_dues_certificates')) {
            //     $request['upload_no_dues_certificate'] = $this->curlAPiService->convertFileInBase64($request->file('upload_no_dues_certificates'));
            // } else {
            //     $request['upload_no_dues_certificate'] = "";
            // }
            // if ($request->hasFile('upload_gov_instructed_docs')) {
            //     $request['upload_gov_instructed_doc'] = $this->curlAPiService->convertFileInBase64($request->file('upload_gov_instructed_docs'));
            // } else {
            //     $request['upload_gov_instructed_doc'] = "";
            // }
            // $request['user_id'] = (Auth::user()->user_id && Auth::user()->user_id != "") ? Auth::user()->user_id : Auth::user()->id;
            // $newData = $request->except(['_token', 'upload_prescribed_formats', 'upload_no_dues_certificates', 'upload_gov_instructed_docs']);
            // $data = $this->curlAPiService->sendPostRequestInObject($newData, config('rtsapiurl.water') . 'AapaleSarkarAPI/NewTaxation.asmx/RequestForNewTaxation', 'NewTaxation');

            // // Decode JSON string to PHP array
            // $data = json_decode($data, true);
            // if ($data['d']['Status'] == "200") {
            // Access the application_no
            $applicationId = "PMCRC-" . time();
            ConstructionRoadCutting::where('id', $constructionRoadCutting->id)->update([
                'application_no' => $applicationId
            ]);

            if (Auth::user()->is_aapale_sarkar_user) {
                $aapaleSarkarCredential = ServiceCredential::where('dept_service_id', $request->service_id)->first();
                $serviceDay = ($aapaleSarkarCredential->service_day) ? $aapaleSarkarCredential->service_day : 20;

                $send = $this->aapaleSarkarLoginCheckService->encryptAndSendRequestToAapaleSarkar(Auth::user()->trackid, $aapaleSarkarCredential->client_code, Auth::user()->user_id, $aapaleSarkarCredential->service_id, $applicationId, 'N', 'NA', 'N', 'NA', $serviceDay, date('Y-m-d', strtotime("+$serviceDay days")), config('rtsapiurl.amount'), config('rtsapiurl.requestFlag'), config('rtsapiurl.applicationStatus'), config('rtsapiurl.applicationPendingStatusTxt'), $aapaleSarkarCredential->ulb_id, $aapaleSarkarCredential->ulb_district, 'NA', 'NA', 'NA', $aapaleSarkarCredential->check_sum_key, $aapaleSarkarCredential->str_key, $aapaleSarkarCredential->str_iv, $aapaleSarkarCredential->soap_end_point_url, $aapaleSarkarCredential->soap_action_app_status_url);

                if (!$send) {
                    return false;
                }
            }
            // } else {
            //     DB::rollback();
            //     return false;
            // }
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
        return ConstructionRoadCutting::find($id);
    }

    public function update($request, $id)
    {
        DB::beginTransaction();

        try {
            // Find the existing record
            $constructionRoadCutting = ConstructionRoadCutting::findOrFail($id);
            // Handle file uploads and update original file names
            if ($request->hasFile('upload_prescribed_formats')) {
                if ($constructionRoadCutting && Storage::exists($constructionRoadCutting->upload_prescribed_format)) {
                    Storage::delete($constructionRoadCutting->upload_prescribed_format);
                }
                $request['upload_prescribed_format'] = $request->upload_prescribed_formats->store('construction-department/road-cutting');
            }
            if ($request->hasFile('upload_no_dues_certificates')) {
                if ($constructionRoadCutting && Storage::exists($constructionRoadCutting->upload_no_dues_certificate)) {
                    Storage::delete($constructionRoadCutting->upload_no_dues_certificate);
                }
                $request['upload_no_dues_certificate'] = $request->upload_no_dues_certificates->store('construction-department/road-cutting');
            }
            if ($request->hasFile('upload_gov_instructed_docs')) {
                if ($constructionRoadCutting && Storage::exists($constructionRoadCutting->upload_gov_instructed_doc)) {
                    Storage::delete($constructionRoadCutting->upload_gov_instructed_doc);
                }
                $request['upload_gov_instructed_doc'] = $request->upload_gov_instructed_docs->store('construction-department/road-cutting');
            }
            $constructionRoadCutting->update($request->all());



            // code to send data to department
            // if ($request->hasFile('upload_prescribed_formats')) {
            //     $request['upload_prescribed_format'] = $this->curlAPiService->convertFileInBase64($request->file('upload_prescribed_formats'));
            // } else {
            //     $request['upload_prescribed_format'] = "";
            // }
            // if ($request->hasFile('upload_no_dues_certificates')) {
            //     $request['upload_no_dues_certificate'] = $this->curlAPiService->convertFileInBase64($request->file('upload_no_dues_certificates'));
            // } else {
            //     $request['upload_no_dues_certificate'] = "";
            // }
            // if ($request->hasFile('upload_gov_instructed_docs')) {
            //     $request['upload_gov_instructed_doc'] = $this->curlAPiService->convertFileInBase64($request->file('upload_gov_instructed_docs'));
            // } else {
            //     $request['upload_gov_instructed_doc'] = "";
            // }
            // $request['application_no'] = $constructionRoadCutting->application_no;
            // $request['user_id'] = (Auth::user()->user_id && Auth::user()->user_id != "") ? Auth::user()->user_id : Auth::user()->id;
            // $newData = $request->except(['_token', 'id', 'upload_prescribed_formats', 'upload_no_dues_certificates', 'upload_gov_instructed_docs']);
            // $data = $this->curlAPiService->sendPostRequestInObject($newData, config('rtsapiurl.water') . 'AapaleSarkarAPI/NewTaxation.asmx/RequestForUpdateNewTaxation', 'NewTaxation');

            // // Decode JSON string to PHP array
            // $data = json_decode($data, true);

            // if ($data['d']['Status'] == "200") {
            // Access the application_no
            DB::commit();
            return true;
            // } else {
            //     DB::rollback();
            //     return false;
            // }
            // end of code to send data to department
        } catch (\Exception $e) {
            DB::rollback();
            Log::info($e);
            return false;
        }
    }
}
