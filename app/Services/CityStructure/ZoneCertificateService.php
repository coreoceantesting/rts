<?php

namespace App\Services\CityStructure;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use App\Models\CityStructure\CityStructureZoneCertificate;
use App\Models\ServiceCredential;
use App\Services\CurlAPiService;
use App\Services\AapaleSarkarLoginCheckService;

class ZoneCertificateService
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
            $request['service_id'] = "185";
            // Handle file uploads and store original file names
            if ($request->hasFile('prescribed_formats')) {
                $request['prescribed_format'] = $request->prescribed_formats->store('city-structure/zone-certificate');
            }
            if ($request->hasFile('upload_city_survey_certificates')) {
                $request['upload_city_survey_certificate'] = $request->upload_city_survey_certificates->store('city-structure/zone-certificate');
            }
            if ($request->hasFile('upload_city_servey_maps')) {
                $request['upload_city_servey_map'] = $request->upload_city_servey_maps->store('city-structure/zone-certificate');
            }
            $cityStructureZoneCertificate = CityStructureZoneCertificate::create($request->all());


            // code to send data to department
            // if ($request->hasFile('prescribed_formats')) {
            //     $request['prescribed_format'] = $this->curlAPiService->convertFileInBase64($request->file('prescribed_formats'));
            // } else {
            //     $request['prescribed_format'] = "";
            // }
            // if ($request->hasFile('upload_city_survey_certificates')) {
            //     $request['upload_city_survey_certificate'] = $this->curlAPiService->convertFileInBase64($request->file('upload_city_survey_certificates'));
            // } else {
            //     $request['upload_city_survey_certificate'] = "";
            // }
            // if ($request->hasFile('upload_city_servey_maps')) {
            //     $request['upload_city_servey_map'] = $this->curlAPiService->convertFileInBase64($request->file('upload_city_servey_maps'));
            // } else {
            //     $request['upload_city_servey_map'] = "";
            // }
            // $request['user_id'] = (Auth::user()->user_id && Auth::user()->user_id != "") ? Auth::user()->user_id : Auth::user()->id;
            // $newData = $request->except(['_token', 'prescribed_formats', 'upload_city_survey_certificates', 'upload_city_servey_maps']);
            // $data = $this->curlAPiService->sendPostRequestInObject($newData, config('rtsapiurl.water') . 'AapaleSarkarAPI/NewTaxation.asmx/RequestForNewTaxation', 'NewTaxation');

            // // Decode JSON string to PHP array
            // $data = json_decode($data, true);
            // if ($data['d']['Status'] == "200") {
            // Access the application_no
            $applicationId = "PMCPZ-" . time();
            CityStructureZoneCertificate::where('id', $cityStructureZoneCertificate->id)->update([
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
        return CityStructureZoneCertificate::find($id);
    }

    public function update($request, $id)
    {
        DB::beginTransaction();
        try {
            // Find the existing record
            $cityStructureZoneCertificate = CityStructureZoneCertificate::findOrFail($id);
            // Handle file uploads and update original file names
            if ($request->hasFile('prescribed_formats')) {
                if ($cityStructureZoneCertificate && Storage::exists($cityStructureZoneCertificate->prescribed_format)) {
                    Storage::delete($cityStructureZoneCertificate->prescribed_format);
                }
                $request['prescribed_format'] = $request->prescribed_formats->store('city-structure/zone-certificate');
            }
            if ($request->hasFile('upload_city_survey_certificates')) {
                if ($cityStructureZoneCertificate && Storage::exists($cityStructureZoneCertificate->upload_city_survey_certificate)) {
                    Storage::delete($cityStructureZoneCertificate->upload_city_survey_certificate);
                }
                $request['upload_city_survey_certificate'] = $request->upload_city_survey_certificates->store('city-structure/zone-certificate');
            }
            if ($request->hasFile('upload_city_servey_maps')) {
                if ($cityStructureZoneCertificate && Storage::exists($cityStructureZoneCertificate->upload_city_servey_map)) {
                    Storage::delete($cityStructureZoneCertificate->upload_city_servey_map);
                }
                $request['upload_city_servey_map'] = $request->upload_city_servey_maps->store('city-structure/zone-certificate');
            }
            $cityStructureZoneCertificate->update($request->all());



            // code to send data to department
            // if ($request->hasFile('prescribed_formats')) {
            //     $request['prescribed_format'] = $this->curlAPiService->convertFileInBase64($request->file('prescribed_formats'));
            // } else {
            //     $request['prescribed_format'] = "";
            // }
            // if ($request->hasFile('upload_city_survey_certificates')) {
            //     $request['upload_city_survey_certificate'] = $this->curlAPiService->convertFileInBase64($request->file('upload_city_survey_certificates'));
            // } else {
            //     $request['upload_city_survey_certificate'] = "";
            // }
            // if ($request->hasFile('upload_city_servey_maps')) {
            //     $request['upload_city_servey_map'] = $this->curlAPiService->convertFileInBase64($request->file('upload_city_servey_maps'));
            // } else {
            //     $request['upload_city_servey_map'] = "";
            // }
            // $request['application_no'] = $cityStructureZoneCertificate->application_no;
            // $request['user_id'] = (Auth::user()->user_id && Auth::user()->user_id != "") ? Auth::user()->user_id : Auth::user()->id;
            // $newData = $request->except(['_token', 'id', 'prescribed_formats', 'upload_city_survey_certificates', 'upload_city_servey_maps']);
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
