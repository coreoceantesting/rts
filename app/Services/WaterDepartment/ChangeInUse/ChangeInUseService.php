<?php

namespace App\Services\WaterDepartment\ChangeInUse;

use App\Models\WaterDepartment\WaterChangeInUse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class ChangeInUseService
{
    public function store($request)
    {
        DB::beginTransaction();

        try {
            $user_id = Auth::user()->id;

            // Handle file uploads and store original file names
            $application_document = null;
            $nodues_document = null;

            if ($request->hasFile('application_document')) {
                $application_document = $request->application_document->store('WaterDepartment/ChangeInUse');
            }

            if ($request->hasFile('nodues_document')) {
                $nodues_document = $request->nodues_document->store('WaterDepartment/ChangeInUse');
            }


            WaterChangeInUse::create([
                'user_id' => $user_id,
                'property_owner_name' => $request->input('property_owner_name'),
                'aadhar_no' => $request->input('aadhar_no'),
                'mobile_no' => $request->input('mobile_no'),
                'email_id' => $request->input('email_id'),
                'zone' => $request->input('zone'),
                'ward_area' => $request->input('ward_area'),
                'plot_no' => $request->input('plot_no'),
                'house_no' => $request->input('house_no'),
                'landmark' => $request->input('landmark'),
                'address' => $request->input('address'),
                'property_type' => $request->input('property_type'),
                'water_connection_no' => $request->input('water_connection_no'),
                'applicant_is_on_rent' => $request->input('applicant_is_on_rent'),
                'water_connection_size' => $request->input('water_connection_size'),
                'water_usage' => $request->input('water_usage'),
                'new_water_con_usage' => $request->input('new_water_con_usage'),
                'usage_residence_type' => $request->input('usage_residence_type'),
                'current_connection_is_illegal' => $request->input('current_connection_is_illegal'),
                'no_of_user' => $request->input('no_of_user'),
                'place_belongs_to_municipal' => $request->input('place_belongs_to_municipal'),
                'any_police_complaint' => $request->input('any_police_complaint'),
                'application_document' => $application_document,
                'nodues_document' => $nodues_document,
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
        return WaterChangeInUse::find($id);
    }

    public function update($request, $id)
    {
        DB::beginTransaction();

        try {

            // Find the existing record
            $WaterChangeInUse = WaterChangeInUse::findOrFail($id);

            // Handle file uploads and update original file names
            if ($request->hasFile('application_document')) {
                if ($WaterChangeInUse && Storage::exists($WaterChangeInUse->application_document)) {
                    Storage::delete($WaterChangeInUse->application_document);
                }
                $WaterChangeInUse->application_document = $request->application_document->store('WaterDepartment/ChangeInUse');
            }

            if ($request->hasFile('nodues_document')) {
                if ($WaterChangeInUse && Storage::exists($WaterChangeInUse->nodues_document)) {
                    Storage::delete($WaterChangeInUse->nodues_document);
                }
                $WaterChangeInUse->nodues_document = $request->nodues_document->store('WaterDepartment/ChangeInUse');
            }

            // Update the rest of the fields
            $WaterChangeInUse->update([
                'property_owner_name' => $request->input('property_owner_name'),
                'aadhar_no' => $request->input('aadhar_no'),
                'mobile_no' => $request->input('mobile_no'),
                'email_id' => $request->input('email_id'),
                'zone' => $request->input('zone'),
                'ward_area' => $request->input('ward_area'),
                'plot_no' => $request->input('plot_no'),
                'house_no' => $request->input('house_no'),
                'landmark' => $request->input('landmark'),
                'address' => $request->input('address'),
                'property_type' => $request->input('property_type'),
                'water_connection_no' => $request->input('water_connection_no'),
                'applicant_is_on_rent' => $request->input('applicant_is_on_rent'),
                'water_connection_size' => $request->input('water_connection_size'),
                'water_usage' => $request->input('water_usage'),
                'new_water_con_usage' => $request->input('new_water_con_usage'),
                'usage_residence_type' => $request->input('usage_residence_type'),
                'current_connection_is_illegal' => $request->input('current_connection_is_illegal'),
                'no_of_user' => $request->input('no_of_user'),
                'place_belongs_to_municipal' => $request->input('place_belongs_to_municipal'),
                'any_police_complaint' => $request->input('any_police_complaint'),
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
