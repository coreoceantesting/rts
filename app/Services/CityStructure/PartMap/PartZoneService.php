<?php

namespace App\Services\CityStructure\PartMap;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use App\Models\CityStructure\CityStructurePartMap;
use App\Models\ServiceCredential;
use App\Services\CurlAPiService;
use App\Services\AapaleSarkarLoginCheckService;

class PartZoneService
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
            $user_id = Auth::user()->id;
            // Handle file uploads and store original file names
            $prescribed_format = null;
            $upload_city_survey_certificate = null;
            $upload_city_servey_map = null;

            if ($request->hasFile('prescribed_formats')) {
                $request['prescribed_format'] = $request->prescribed_formats->store('city-structure/part-map');
            }

            if ($request->hasFile('upload_city_survey_certificates')) {
                $request['upload_city_survey_certificate'] = $request->upload_city_survey_certificates->store('city-structure/part-map');
            }

            if ($request->hasFile('upload_city_servey_maps')) {
                $request['upload_city_servey_map'] = $request->upload_city_servey_maps->store('city-structure/part-map');
            }

            $cityStructurePartMap = CityStructurePartMap::create($request->all());

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
        return CityStructurePartMap::find($id);
    }

    public function update($request, $id)
    {
        DB::beginTransaction();

        try {

            // Find the existing record
            $cityStructurePartMap = CityStructurePartMap::findOrFail($id);

            // Handle file uploads and update original file names
            if ($request->hasFile('prescribed_formats')) {
                if ($cityStructurePartMap && Storage::exists($cityStructurePartMap->prescribed_format)) {
                    Storage::delete($cityStructurePartMap->prescribed_format);
                }
                $request['prescribed_format'] = $request->prescribed_formats->store('city-structure/part-map');
            }

            if ($request->hasFile('upload_city_survey_certificates')) {
                if ($cityStructurePartMap && Storage::exists($cityStructurePartMap->upload_city_survey_certificate)) {
                    Storage::delete($cityStructurePartMap->upload_city_survey_certificate);
                }
                $request['upload_city_survey_certificate'] = $request->upload_city_survey_certificates->store('city-structure/part-map');
            }

            if ($request->hasFile('upload_city_servey_maps')) {
                if ($cityStructurePartMap && Storage::exists($cityStructurePartMap->upload_city_servey_map)) {
                    Storage::delete($cityStructurePartMap->upload_city_servey_map);
                }
                $request['upload_city_servey_map'] = $request->upload_city_servey_maps->store('city-structure/part-map');
            }

            $cityStructurePartMap->update($request->all());

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
