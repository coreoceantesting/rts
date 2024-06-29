<?php

namespace App\Services\WaterDepartment\Reconnection;

use App\Models\WaterDepartment\WaterReconnection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class ReconnectionService
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
                $application_document = $request->application_document->store('WaterDepartment/Reconnection');
            }

            if ($request->hasFile('nodues_document')) {
                $nodues_document = $request->nodues_document->store('WaterDepartment/Reconnection');
            }


            WaterReconnection::create([
                'user_id' => $user_id,
                'new_owner_name' => $request->input('new_owner_name'),
                'aadhar_no' => $request->input('aadhar_no'),
                'mobile_no' => $request->input('mobile_no'),
                'email_id' => $request->input('email_id'),
                'zone' => $request->input('zone'),
                'ward_area' => $request->input('ward_area'),
                'plot_no' => $request->input('plot_no'),
                'house_no' => $request->input('house_no'),
                'landmark' => $request->input('landmark'),
                'address' => $request->input('address'),
                'new_tap_connection' => $request->input('new_tap_connection'),
                'current_connection_is_authorized' => $request->input('current_connection_is_authorized'),
                'applicant_or_tenant' => $request->input('applicant_or_tenant'),
                'no_of_user' => $request->input('no_of_user'),
                'criminal_judicial_issue' => $request->input('criminal_judicial_issue'),
                'tap_size' => $request->input('tap_size'),
                'existing_connection_detail' => $request->input('existing_connection_detail'),
                'place_belongs_to_municipal' => $request->input('place_belongs_to_municipal'),
                'comment' => $request->input('comment'),
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
        return WaterReconnection::find($id);
    }

    public function update($request, $id)
    {
        DB::beginTransaction();

        try {

            // Find the existing record
            $waterReconnection = WaterReconnection::findOrFail($id);

            // Handle file uploads and update original file names
            if ($request->hasFile('application_document')) {
                if ($waterReconnection && Storage::exists($waterReconnection->application_document)) {
                    Storage::delete($waterReconnection->application_document);
                }
                $waterReconnection->application_document = $request->application_document->store('WaterDepartment/Reconnection');
            }

            if ($request->hasFile('nodues_document')) {
                if ($waterReconnection && Storage::exists($waterReconnection->nodues_document)) {
                    Storage::delete($waterReconnection->nodues_document);
                }
                $waterReconnection->nodues_document = $request->nodues_document->store('WaterDepartment/Reconnection');
            }

            // Update the rest of the fields
            $waterReconnection->update([
                'new_owner_name' => $request->input('new_owner_name'),
                'aadhar_no' => $request->input('aadhar_no'),
                'mobile_no' => $request->input('mobile_no'),
                'email_id' => $request->input('email_id'),
                'zone' => $request->input('zone'),
                'ward_area' => $request->input('ward_area'),
                'plot_no' => $request->input('plot_no'),
                'house_no' => $request->input('house_no'),
                'landmark' => $request->input('landmark'),
                'address' => $request->input('address'),
                'new_tap_connection' => $request->input('new_tap_connection'),
                'current_connection_is_authorized' => $request->input('current_connection_is_authorized'),
                'applicant_or_tenant' => $request->input('applicant_or_tenant'),
                'no_of_user' => $request->input('no_of_user'),
                'criminal_judicial_issue' => $request->input('criminal_judicial_issue'),
                'tap_size' => $request->input('tap_size'),
                'existing_connection_detail' => $request->input('existing_connection_detail'),
                'place_belongs_to_municipal' => $request->input('place_belongs_to_municipal'),
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
