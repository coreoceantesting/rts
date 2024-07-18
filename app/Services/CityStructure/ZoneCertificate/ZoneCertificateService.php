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
            $request['user_id'] = Auth::user()->id;
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

            CityStructureZoneCertificate::create($request->all());

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
