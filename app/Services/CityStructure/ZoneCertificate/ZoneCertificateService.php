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
