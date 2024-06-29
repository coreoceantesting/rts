<?php

namespace App\Services\WaterDepartment\DefectiveWaterMeter;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use App\Models\WaterDepartment\WaterDefectiveMeter;

class DefectiveWaterMeterService
{
    public function store($request)
    {
        DB::beginTransaction();

        try {
            $user_id = Auth::user()->id;

            // Handle file uploads and store original file names
            $application_document = null;

            if ($request->hasFile('application_document')) {
                $application_document = $request->application_document->store('WaterDepartment/DefectiveWaterMeter');
            }

            WaterDefectiveMeter::create([
                'user_id' => $user_id,
                'owner_name' => $request->input('owner_name'),
                'aadhar_no' => $request->input('aadhar_no'),
                'mobile_no' => $request->input('mobile_no'),
                'email_id' => $request->input('email_id'),
                'zone' => $request->input('zone'),
                'ward_area' => $request->input('ward_area'),
                'plot_no' => $request->input('plot_no'),
                'house_no' => $request->input('house_no'),
                'landmark' => $request->input('landmark'),
                'address' => $request->input('address'),
                'place_belongs_to_municipal' => $request->input('place_belongs_to_municipal'),
                'current_connection_is_illegal' => $request->input('current_connection_is_illegal'),
                'applicant_or_tenant' => $request->input('applicant_or_tenant'),
                'criminal_judicial_issue' => $request->input('criminal_judicial_issue'),
                'current_tap_detail' => $request->input('current_tap_detail'),
                'property_no' => $request->input('property_no'),
                'meter_reading' => $request->input('meter_reading'),
                'size' => $request->input('size'),
                'comment' => $request->input('comment'),
                'application_document' => $application_document,
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
        return WaterDefectiveMeter::find($id);
    }

    public function update($request, $id)
    {
        DB::beginTransaction();

        try {

            // Find the existing record
            $waterDefectiveMeter = WaterDefectiveMeter::findOrFail($id);

            // Handle file uploads and update original file names
            if ($request->hasFile('application_document')) {
                if ($waterDefectiveMeter && Storage::exists($waterDefectiveMeter->application_document)) {
                    Storage::delete($waterDefectiveMeter->application_document);
                }
                $waterDefectiveMeter->application_document = $request->application_document->store('WaterDepartment/DefectiveWaterMeter');
            }

            // Update the rest of the fields
            $waterDefectiveMeter->update([
                'owner_name' => $request->input('owner_name'),
                'aadhar_no' => $request->input('aadhar_no'),
                'mobile_no' => $request->input('mobile_no'),
                'email_id' => $request->input('email_id'),
                'zone' => $request->input('zone'),
                'ward_area' => $request->input('ward_area'),
                'plot_no' => $request->input('plot_no'),
                'house_no' => $request->input('house_no'),
                'landmark' => $request->input('landmark'),
                'address' => $request->input('address'),
                'place_belongs_to_municipal' => $request->input('place_belongs_to_municipal'),
                'current_connection_is_illegal' => $request->input('current_connection_is_illegal'),
                'applicant_or_tenant' => $request->input('applicant_or_tenant'),
                'criminal_judicial_issue' => $request->input('criminal_judicial_issue'),
                'current_tap_detail' => $request->input('current_tap_detail'),
                'property_no' => $request->input('property_no'),
                'meter_reading' => $request->input('meter_reading'),
                'size' => $request->input('size'),
                'comment' => $request->input('comment'),
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
