<?php

namespace App\Services\CityStructure\ZoneCertificate;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use App\Models\CityStructure\CityStructureZoneCertificate;

class ZoneCertificateService
{
    public function store($request)
    {
        DB::beginTransaction();

        try {
            $user_id = Auth::user()->id;
            // Handle file uploads and store original file names
            $prescribed_format = null;
            $upload_city_survey_certificate = null;
            $upload_city_servey_map = null;

            if ($request->hasFile('prescribed_format')) {
                $prescribed_format = $request->prescribed_format->store('CityStructure/ZoneCertificate');
            }

            if ($request->hasFile('upload_city_survey_certificate')) {
                $upload_city_survey_certificate = $request->upload_city_survey_certificate->store('CityStructure/ZoneCertificate');
            }

            if ($request->hasFile('upload_city_servey_map')) {
                $upload_city_servey_map = $request->upload_city_servey_map->store('CityStructure/ZoneCertificate');
            }

            CityStructureZoneCertificate::create([
                'user_id' => $user_id,
                'applicant_name' => $request->input('applicant_name'),
                'applicant_full_address' => $request->input('applicant_full_address'),
                'mobile_no' => $request->input('mobile_no'),
                'email_id' => $request->input('email_id'),
                'aadhar_no' => $request->input('aadhar_no'),
                'zone' => $request->input('zone'),
                'servey_number' => $request->input('servey_number'),
                'prescribed_format' => $prescribed_format,
                'upload_city_survey_certificate' => $upload_city_survey_certificate,
                'upload_city_servey_map' => $upload_city_servey_map,
            ]);


            // code to send data to city structure portal
            $fileData = [
                'prescribed_format' => $request->file('prescribed_format'),
                'upload_city_survey_certificate' => $request->file('upload_city_survey_certificate'),
                'upload_city_servey_map' => $request->file('upload_city_servey_map'),
            ];
            $data = $this->curlAPiService->sendPostRequest($request->all(), 'https://api.com/api/demo', $fileData);

            $arr = json_decode($data);

            if ($arr->success) {
                CityStructurePartMap::where('id', $cityStructurePartMap->id)->update([
                    'application_no' => $arr->result->application_no
                ]);

                // call function to send data to aapale sarkar portal
                if (Auth::user()->is_aapale_sarkar_user) {
                    $aapaleSarkarCredential = ServiceCredential::where('service_name', 'Marriage register certificate')->first();

                    $send = $this->aapaleSarkarLoginCheckService->encryptAndSendRequestToAapaleSarkar(Auth::user()->trackid, $aapaleSarkarCredential->client_code, Auth::user()->user_id, $aapaleSarkarCredential->service_id, 'application number', 'N', 'NA', 'N', 'NA', "20", date('Y-m-d', strtotime("+$aapaleSarkarCredential->service_day days")), 23.60, 1, 2, 'Payment Pending', $aapaleSarkarCredential->ulb_id, $aapaleSarkarCredential->ulb_district, 'NA', 'NA', 'NA', $aapaleSarkarCredential->check_sum_key, $aapaleSarkarCredential->str_key, $aapaleSarkarCredential->str_iv, $aapaleSarkarCredential->soap_end_point_url, $aapaleSarkarCredential->soap_action_app_status_url);

                    if (!$send) {
                        return false;
                    }
                }
                // end of call function to send data to aapale sarkar portal
            } else {
                DB::rollback();
                return false;
            }
            // end of code to send data to city structure portal


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
            if ($request->hasFile('prescribed_format')) {
                if ($cityStructureZoneCertificate && Storage::exists($cityStructureZoneCertificate->prescribed_format)) {
                    Storage::delete($cityStructureZoneCertificate->prescribed_format);
                }
                $cityStructureZoneCertificate->prescribed_format = $request->prescribed_format->store('CityStructure/ZoneCertificate');
            }

            if ($request->hasFile('upload_city_survey_certificate')) {
                if ($cityStructureZoneCertificate && Storage::exists($cityStructureZoneCertificate->upload_city_survey_certificate)) {
                    Storage::delete($cityStructureZoneCertificate->upload_city_survey_certificate);
                }
                $cityStructureZoneCertificate->upload_city_survey_certificate = $request->upload_city_survey_certificate->store('CityStructure/ZoneCertificate');
            }

            if ($request->hasFile('upload_city_servey_map')) {
                if ($cityStructureZoneCertificate && Storage::exists($cityStructureZoneCertificate->upload_city_servey_map)) {
                    Storage::delete($cityStructureZoneCertificate->upload_city_servey_map);
                }
                $cityStructureZoneCertificate->upload_city_servey_map = $request->upload_city_servey_map->store('CityStructure/ZoneCertificate');
            }

            $cityStructureZoneCertificate->update([
                'applicant_name' => $request->input('applicant_name'),
                'applicant_full_address' => $request->input('applicant_full_address'),
                'mobile_no' => $request->input('mobile_no'),
                'email_id' => $request->input('email_id'),
                'aadhar_no' => $request->input('aadhar_no'),
                'zone' => $request->input('zone'),
                'servey_number' => $request->input('servey_number'),
            ]);

            // Commit the transaction
            DB::commit();


            return true;
        } catch (\Exception $e) {
            DB::rollback();
            Log::info($e);
            return false;
        }
    }
}
