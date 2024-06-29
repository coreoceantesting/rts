<?php

namespace App\Services\WaterDepartment\NoDues;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use App\Models\WaterDepartment\WaterNoDues;

class NoDuesService
{
    public function store($request)
    {
        DB::beginTransaction();

        try {
            $user_id = Auth::user()->id;

            // Handle file uploads and store original file names
            $application_document = null;

            if ($request->hasFile('application_document')) {
                $application_document = $request->application_document->store('WaterDepartment/NoDues');
            }


            WaterNoDues::create([
                'user_id' => $user_id,
                'water_connection_no' => $request->input('water_connection_no'),
                'property_no' => $request->input('property_no'),
                'property_owner_name' => $request->input('property_owner_name'),
                'aadhar_no' => $request->input('aadhar_no'),
                'mobile_no' => $request->input('mobile_no'),
                'email_id' => $request->input('email_id'),
                'zone' => $request->input('zone'),
                'ward_area' => $request->input('ward_area'),
                'address' => $request->input('address'),
                'landmark' => $request->input('landmark'),
                'plot_no' => $request->input('plot_no'),
                'house_no' => $request->input('house_no'),
                'applicant_is_on_rent' => $request->input('applicant_is_on_rent'),
                'date_of_water_bill' => $request->input('date_of_water_bill'),
                'criminal_judicial_issue' => $request->input('criminal_judicial_issue'),
                'tap_size' => $request->input('tap_size'),
                'current_existing_tap_type' => $request->input('current_existing_tap_type'),
                'place_belongs_to_municipal' => $request->input('place_belongs_to_municipal'),
                'current_connection_is_illegal' => $request->input('current_connection_is_illegal'),
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
        return WaterNoDues::find($id);
    }

    public function update($request, $id)
    {
        DB::beginTransaction();

        try {

            // Find the existing record
            $waterNoDues = WaterNoDues::findOrFail($id);

            // Handle file uploads and update original file names
            if ($request->hasFile('application_document')) {
                if ($waterNoDues && Storage::exists($waterNoDues->application_document)) {
                    Storage::delete($waterNoDues->application_document);
                }
                $waterNoDues->application_document = $request->application_document->store('WaterDepartment/NoDues');
            }

            // Update the rest of the fields
            $waterNoDues->update([
                'water_connection_no' => $request->input('water_connection_no'),
                'property_no' => $request->input('property_no'),
                'property_owner_name' => $request->input('property_owner_name'),
                'aadhar_no' => $request->input('aadhar_no'),
                'mobile_no' => $request->input('mobile_no'),
                'email_id' => $request->input('email_id'),
                'zone' => $request->input('zone'),
                'ward_area' => $request->input('ward_area'),
                'address' => $request->input('address'),
                'landmark' => $request->input('landmark'),
                'plot_no' => $request->input('plot_no'),
                'house_no' => $request->input('house_no'),
                'applicant_is_on_rent' => $request->input('applicant_is_on_rent'),
                'date_of_water_bill' => $request->input('date_of_water_bill'),
                'criminal_judicial_issue' => $request->input('criminal_judicial_issue'),
                'tap_size' => $request->input('tap_size'),
                'current_existing_tap_type' => $request->input('current_existing_tap_type'),
                'place_belongs_to_municipal' => $request->input('place_belongs_to_municipal'),
                'current_connection_is_illegal' => $request->input('current_connection_is_illegal'),
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
