<?php

namespace App\Services\ConstructionDepartment\RoadCutting;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use App\Models\ConstructionDepartment\ConstructionRoadCutting;

class RoadCuttingService
{
    public function store($request)
    {
        DB::beginTransaction();

        try {
            $user_id = Auth::user()->id;
            // Handle file uploads and store original file names
            $upload_prescribed_format = null;
            $upload_no_dues_certificate = null;
            $upload_gov_instructed_doc = null;

            if ($request->hasFile('upload_prescribed_format')) {
                $upload_prescribed_format = $request->upload_prescribed_format->store('ConstructionDepartment/RoadCutting');
            }

            if ($request->hasFile('upload_no_dues_certificate')) {
                $upload_no_dues_certificate = $request->upload_no_dues_certificate->store('ConstructionDepartment/RoadCutting');
            }

            if ($request->hasFile('upload_gov_instructed_doc')) {
                $upload_gov_instructed_doc = $request->upload_gov_instructed_doc->store('ConstructionDepartment/RoadCutting');
            }

            ConstructionRoadCutting::create([
                'user_id' => $user_id,
                'applicant_type' => $request->input('applicant_type'),
                'applicant_name' => $request->input('applicant_name'),
                'applicant_full_address' => $request->input('applicant_full_address'),
                'zone' => $request->input('zone'),
                'ward' => $request->input('ward'),
                'company_name' => $request->input('company_name'),
                'designation' => $request->input('designation'),
                'mobile_no' => $request->input('mobile_no'),
                'email_id' => $request->input('email_id'),
                'aadhar_no' => $request->input('aadhar_no'),
                'road_cutting_purpose' => $request->input('road_cutting_purpose'),
                'road_length' => $request->input('road_length'),
                'no_of_location' => $request->input('no_of_location'),
                'road_cutting_address' => $request->input('road_cutting_address'),
                'location_size' => $request->input('location_size'),
                'upload_gov_instructed_doc' => $upload_gov_instructed_doc,
                'upload_no_dues_certificate' => $upload_no_dues_certificate,
                'upload_prescribed_format' => $upload_prescribed_format,
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
        return ConstructionRoadCutting::find($id);
    }

    public function update($request, $id)
    {
        DB::beginTransaction();

        try {

            // Find the existing record
            $ConstructionRoadCutting = ConstructionRoadCutting::findOrFail($id);

            // Handle file uploads and update original file names
            if ($request->hasFile('upload_prescribed_format')) {
                if ($ConstructionRoadCutting && Storage::exists($ConstructionRoadCutting->upload_prescribed_format)) {
                    Storage::delete($ConstructionRoadCutting->upload_prescribed_format);
                }
                $ConstructionRoadCutting->upload_prescribed_format = $request->upload_prescribed_format->store('ConstructionDepartment/DrainageConnection');
            }

            if ($request->hasFile('upload_no_dues_certificate')) {
                if ($ConstructionRoadCutting && Storage::exists($ConstructionRoadCutting->upload_no_dues_certificate)) {
                    Storage::delete($ConstructionRoadCutting->upload_no_dues_certificate);
                }
                $ConstructionRoadCutting->upload_no_dues_certificate = $request->upload_no_dues_certificate->store('ConstructionDepartment/DrainageConnection');
            }

            if ($request->hasFile('upload_gov_instructed_doc')) {
                if ($ConstructionRoadCutting && Storage::exists($ConstructionRoadCutting->upload_gov_instructed_doc)) {
                    Storage::delete($ConstructionRoadCutting->upload_gov_instructed_doc);
                }
                $ConstructionRoadCutting->upload_gov_instructed_doc = $request->upload_gov_instructed_doc->store('ConstructionDepartment/DrainageConnection');
            }

            $ConstructionRoadCutting->update([
                'applicant_type' => $request->input('applicant_type'),
                'applicant_name' => $request->input('applicant_name'),
                'applicant_full_address' => $request->input('applicant_full_address'),
                'zone' => $request->input('zone'),
                'ward' => $request->input('ward'),
                'company_name' => $request->input('company_name'),
                'designation' => $request->input('designation'),
                'mobile_no' => $request->input('mobile_no'),
                'email_id' => $request->input('email_id'),
                'aadhar_no' => $request->input('aadhar_no'),
                'road_cutting_purpose' => $request->input('road_cutting_purpose'),
                'road_length' => $request->input('road_length'),
                'no_of_location' => $request->input('no_of_location'),
                'road_cutting_address' => $request->input('road_cutting_address'),
                'location_size' => $request->input('location_size'),
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
