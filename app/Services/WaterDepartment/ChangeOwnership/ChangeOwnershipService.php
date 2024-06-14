<?php

namespace App\Services\WaterDepartment\ChangeOwnership;

use App\Models\WaterDepartment\WaterChangeOwnership;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class ChangeOwnershipService
{
    public function store($request)
    {
        DB::beginTransaction();

        try {
            $user_id = Auth::user()->id;

            // Handle file uploads and store original file names
            $application_document = null;
            $ownership_document = null;
            $nodues_document = null;

            if ($request->hasFile('application_document')) {
                $fileone = $request->file('application_document');
                $application_document = time() . '_' . $fileone->getClientOriginalName();
                $fileone->storeAs('public/WaterDepartment/ChangeOwnership', $application_document);
            }
            if ($request->hasFile('ownership_document')) {
                $filetwo = $request->file('ownership_document');
                $ownership_document = time() . '_' . $filetwo->getClientOriginalName();
                $filetwo->storeAs('public/WaterDepartment/ChangeOwnership', $ownership_document);
            }
            if ($request->hasFile('nodues_document')) {
                $filethree = $request->file('nodues_document');
                $nodues_document = time() . '_' . $filethree->getClientOriginalName();
                $filethree->storeAs('public/WaterDepartment/ChangeOwnership', $nodues_document);
            }


            WaterChangeOwnership::create([
                'user_id' => $user_id,
                'new_owner_name' => $request->input('new_owner_name'),
                'address' => $request->input('address'),
                'aadhar_no' => $request->input('aadhar_no'),
                'mobile_no' => $request->input('mobile_no'),
                'email_id' => $request->input('email_id'),
                'property_no' => $request->input('property_no'),
                'zone' => $request->input('zone'),
                'ward_area' => $request->input('ward_area'),
                'new_tap_connection' => $request->input('new_tap_connection'),
                'house_no' => $request->input('house_no'),
                'landmark' => $request->input('landmark'),
                'current_connection_is_authorized' => $request->input('current_connection_is_authorized'),
                'no_of_user' => $request->input('no_of_user'),
                'applicant_or_tenant' => $request->input('applicant_or_tenant'),
                'old_owner_name' => $request->input('old_owner_name'),
                'criminal_judicial_issue' => $request->input('criminal_judicial_issue'),
                'tap_size' => $request->input('tap_size'),
                'existing_connection_detail' => $request->input('existing_connection_detail'),
                'place_belongs_to_municipal' => $request->input('place_belongs_to_municipal'),
                'comment' => $request->input('comment'),
                'application_document' => $application_document,
                'ownership_document' => $ownership_document,
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
        return WaterChangeOwnership::find($id);
    }

    public function update($request, $id)
    {
        DB::beginTransaction();

        try {

                // Find the existing record
                $WaterChangeOwnership = WaterChangeOwnership::findOrFail($id);

                // Handle file uploads and update original file names
                if ($request->hasFile('application_document')) {
                    $fileone = $request->file('application_document');
                    $application_document = time() . '_' . $fileone->getClientOriginalName();
                    $fileone->storeAs('public/WaterDepartment/ChangeOwnership', $application_document);
                    $WaterChangeOwnership->application_document = $application_document;
                }

                if ($request->hasFile('ownership_document')) {
                    $filetwo = $request->file('ownership_document');
                    $ownership_document = time() . '_' . $filetwo->getClientOriginalName();
                    $filetwo->storeAs('public/WaterDepartment/ChangeOwnership', $ownership_document);
                    $WaterChangeOwnership->ownership_document = $ownership_document;
                }

                if ($request->hasFile('nodues_document')) {
                    $filethree = $request->file('nodues_document');
                    $nodues_document = time() . '_' . $filethree->getClientOriginalName();
                    $filethree->storeAs('public/WaterDepartment/ChangeOwnership', $nodues_document);
                    $WaterChangeOwnership->nodues_document = $nodues_document;
                }

                // Update the rest of the fields
                $WaterChangeOwnership->update([
                    'new_owner_name' => $request->input('new_owner_name'),
                    'address' => $request->input('address'),
                    'aadhar_no' => $request->input('aadhar_no'),
                    'mobile_no' => $request->input('mobile_no'),
                    'email_id' => $request->input('email_id'),
                    'property_no' => $request->input('property_no'),
                    'zone' => $request->input('zone'),
                    'ward_area' => $request->input('ward_area'),
                    'new_tap_connection' => $request->input('new_tap_connection'),
                    'house_no' => $request->input('house_no'),
                    'landmark' => $request->input('landmark'),
                    'current_connection_is_authorized' => $request->input('current_connection_is_authorized'),
                    'no_of_user' => $request->input('no_of_user'),
                    'applicant_or_tenant' => $request->input('applicant_or_tenant'),
                    'old_owner_name' => $request->input('old_owner_name'),
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
