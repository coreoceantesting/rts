<?php

namespace App\Services\ConstructionDepartment\DrainageConnection;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use App\Models\ConstructionDepartment\ConstructionDrainageConnection;

class DrainageConnectionService
{
    public function store($request)
    {
        DB::beginTransaction();

        try {
            $user_id = Auth::user()->id;
            // Handle file uploads and store original file names
            $upload_prescribed_format = null;
            $upload_no_dues_certificate = null;
            $upload_property_ownership = null;

            if ($request->hasFile('upload_prescribed_format')) {
                $upload_prescribed_format = $request->upload_prescribed_format->store('ConstructionDepartment/DrainageConnection');
            }

            if ($request->hasFile('upload_no_dues_certificate')) {
                $upload_no_dues_certificate = $request->upload_no_dues_certificate->store('ConstructionDepartment/DrainageConnection');
            }

            if ($request->hasFile('upload_property_ownership')) {
                $upload_property_ownership = $request->upload_property_ownership->store('ConstructionDepartment/DrainageConnection');
            }

            ConstructionDrainageConnection::create([
                'user_id' => $user_id,
                'applicant_name' => $request->input('applicant_name'),
                'applicant_area_details' => $request->input('applicant_area_details'),
                'applicant_full_address' => $request->input('applicant_full_address'),
                'zone' => $request->input('zone'),
                'ward' => $request->input('ward'),
                'mobile_no' => $request->input('mobile_no'),
                'aadhar_no' => $request->input('aadhar_no'),
                'email_id' => $request->input('email_id'),
                'property_number' => $request->input('property_number'),
                'property_usage' => $request->input('property_usage'),
                'connection_size_inches' => $request->input('connection_size_inches'),
                'construction_date' => $request->input('construction_date'),
                'flat_assesment_date' => $request->input('flat_assesment_date'),
                'flat_map_date' => $request->input('flat_map_date'),
                'current_water_tax_amount' => $request->input('current_water_tax_amount'),
                'current_tax_paid_date' => $request->input('current_tax_paid_date'),
                'lichpit_count' => $request->input('lichpit_count'),
                'is_toilet_available' => $request->input('is_toilet_available'),
                'total_residencial_people_count' => $request->input('total_residencial_people_count'),
                'total_renter_count' => $request->input('total_renter_count'),
                'connection_size_feet' => $request->input('connection_size_feet'),
                'upload_prescribed_format' => $upload_prescribed_format,
                'upload_no_dues_certificate' => $upload_no_dues_certificate,
                'upload_property_ownership' => $upload_property_ownership,
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
        return ConstructionDrainageConnection::find($id);
    }

    public function update($request, $id)
    {
        DB::beginTransaction();

        try {

            // Find the existing record
            $ConstructionDrainageConnection = ConstructionDrainageConnection::findOrFail($id);

            // Handle file uploads and update original file names
            if ($request->hasFile('upload_prescribed_format')) {
                if ($ConstructionDrainageConnection && Storage::exists($ConstructionDrainageConnection->upload_prescribed_format)) {
                    Storage::delete($ConstructionDrainageConnection->upload_prescribed_format);
                }
                $ConstructionDrainageConnection->upload_prescribed_format = $request->upload_prescribed_format->store('ConstructionDepartment/DrainageConnection');
            }

            if ($request->hasFile('upload_no_dues_certificate')) {
                if ($ConstructionDrainageConnection && Storage::exists($ConstructionDrainageConnection->upload_no_dues_certificate)) {
                    Storage::delete($ConstructionDrainageConnection->upload_no_dues_certificate);
                }
                $ConstructionDrainageConnection->upload_no_dues_certificate = $request->upload_no_dues_certificate->store('ConstructionDepartment/DrainageConnection');
            }

            if ($request->hasFile('upload_property_ownership')) {
                if ($ConstructionDrainageConnection && Storage::exists($ConstructionDrainageConnection->upload_property_ownership)) {
                    Storage::delete($ConstructionDrainageConnection->upload_property_ownership);
                }
                $ConstructionDrainageConnection->upload_property_ownership = $request->upload_property_ownership->store('ConstructionDepartment/DrainageConnection');
            }

            $ConstructionDrainageConnection->update([
                'applicant_name' => $request->input('applicant_name'),
                'applicant_area_details' => $request->input('applicant_area_details'),
                'applicant_full_address' => $request->input('applicant_full_address'),
                'zone' => $request->input('zone'),
                'ward' => $request->input('ward'),
                'mobile_no' => $request->input('mobile_no'),
                'aadhar_no' => $request->input('aadhar_no'),
                'email_id' => $request->input('email_id'),
                'property_number' => $request->input('property_number'),
                'property_usage' => $request->input('property_usage'),
                'connection_size_inches' => $request->input('connection_size_inches'),
                'construction_date' => $request->input('construction_date'),
                'flat_assesment_date' => $request->input('flat_assesment_date'),
                'flat_map_date' => $request->input('flat_map_date'),
                'current_water_tax_amount' => $request->input('current_water_tax_amount'),
                'current_tax_paid_date' => $request->input('current_tax_paid_date'),
                'lichpit_count' => $request->input('lichpit_count'),
                'is_toilet_available' => $request->input('is_toilet_available'),
                'total_residencial_people_count' => $request->input('total_residencial_people_count'),
                'total_renter_count' => $request->input('total_renter_count'),
                'connection_size_feet' => $request->input('connection_size_feet'),
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
