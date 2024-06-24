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
                $fileone = $request->file('prescribed_format');
                $prescribed_format = time() . '_' . $fileone->getClientOriginalName();
                $fileone->storeAs('public/CityStructure/ZoneCertificate', $prescribed_format);
            }

            if ($request->hasFile('upload_city_survey_certificate')) {
                $filetwo = $request->file('upload_city_survey_certificate');
                $upload_city_survey_certificate = time() . '_' . $filetwo->getClientOriginalName();
                $filetwo->storeAs('public/CityStructure/ZoneCertificate', $upload_city_survey_certificate);
            }

            if ($request->hasFile('upload_city_servey_map')) {
                $filethree = $request->file('upload_city_servey_map');
                $upload_city_servey_map = time() . '_' . $filethree->getClientOriginalName();
                $filethree->storeAs('public/CityStructure/ZoneCertificate', $upload_city_servey_map);
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
                $CityStructureZoneCertificate = CityStructureZoneCertificate::findOrFail($id);

                // Handle file uploads and update original file names
                if ($request->hasFile('prescribed_format')) {
                    $fileone = $request->file('prescribed_format');
                    $prescribed_format = time() . '_' . $fileone->getClientOriginalName();
                    $fileone->storeAs('public/CityStructure/ZoneCertificate', $prescribed_format);
                    $CityStructureZoneCertificate->prescribed_format = $prescribed_format;
                }

                if ($request->hasFile('upload_city_survey_certificate')) {
                    $filetwo = $request->file('upload_city_survey_certificate');
                    $upload_city_survey_certificate = time() . '_' . $filetwo->getClientOriginalName();
                    $filetwo->storeAs('public/CityStructure/ZoneCertificate', $upload_city_survey_certificate);
                    $CityStructureZoneCertificate->upload_city_survey_certificate = $upload_city_survey_certificate;
                }

                if ($request->hasFile('upload_city_servey_map')) {
                    $filethree = $request->file('upload_city_servey_map');
                    $upload_city_servey_map = time() . '_' . $filethree->getClientOriginalName();
                    $filethree->storeAs('public/CityStructure/ZoneCertificate', $upload_city_servey_map);
                    $CityStructureZoneCertificate->upload_city_servey_map = $upload_city_servey_map;
                }

                $CityStructureZoneCertificate->update([
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
