<?php

namespace App\Services\WaterDepartment\IllegalWaterConnection;

use App\Models\WaterDepartment\Illegalwaterconnection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class IllegalWaterConnectionService
{
    public function store($request)
    {
        DB::beginTransaction();

        try {
            $user_id = Auth::user()->id;

            // Handle file uploads and store original file names
            $application_document = null;

            if ($request->hasFile('application_document')) {
                $fileone = $request->file('application_document');
                $application_document = time() . '_' . $fileone->getClientOriginalName();
                $fileone->storeAs('public/WaterDepartment/IllegalWaterConnection', $application_document);
            }

            // Create new Illegalwaterconnection record with merged request data
            Illegalwaterconnection::create([
                'user_id' => $user_id,
                'complainants_full_name' => $request->input('complainants_full_name'),
                'address' => $request->input('address'),
                'aadhar_no' => $request->input('aadhar_no'),
                'mobile_no' => $request->input('mobile_no'),
                'email_id' => $request->input('email_id'),
                'unauthorized_tap_connection' => $request->input('unauthorized_tap_connection'),
                'zone' => $request->input('zone'),
                'ward_area' => $request->input('ward_area'),
                'plot_no' => $request->input('plot_no'),
                'house_no' => $request->input('house_no'),
                'landmark' => $request->input('landmark'),
                'unauthorized_connection_address' => $request->input('unauthorized_connection_address'),
                'current_connection_is_authorized' => $request->input('current_connection_is_authorized'),
                'applicant_or_tenant' => $request->input('applicant_or_tenant'),
                'unauthorized_is_tenant' => $request->input('unauthorized_is_tenant'),
                'criminal_judicial_issue' => $request->input('criminal_judicial_issue'),
                'existing_connection_detail' => $request->input('existing_connection_detail'),
                'place_belongs_to_municipal' => $request->input('place_belongs_to_municipal'),
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
        return Illegalwaterconnection::find($id);
    }

    public function update($request, $id)
    {
        DB::beginTransaction();

        try {

                // Find the existing record
                $Illegalwaterconnection = Illegalwaterconnection::findOrFail($id);

                // Handle file uploads and update original file names
                if ($request->hasFile('application_document')) {
                    $fileone = $request->file('application_document');
                    $application_document = time() . '_' . $fileone->getClientOriginalName();
                    $fileone->storeAs('public/WaterDepartment/IllegalWaterConnection', $application_document);
                    $Illegalwaterconnection->application_document = $application_document;
                }

                // Update the rest of the fields
                $Illegalwaterconnection->update([
                    'complainants_full_name' => $request->input('complainants_full_name'),
                    'address' => $request->input('address'),
                    'aadhar_no' => $request->input('aadhar_no'),
                    'mobile_no' => $request->input('mobile_no'),
                    'email_id' => $request->input('email_id'),
                    'unauthorized_tap_connection' => $request->input('unauthorized_tap_connection'),
                    'zone' => $request->input('zone'),
                    'ward_area' => $request->input('ward_area'),
                    'plot_no' => $request->input('plot_no'),
                    'house_no' => $request->input('house_no'),
                    'landmark' => $request->input('landmark'),
                    'unauthorized_connection_address' => $request->input('unauthorized_connection_address'),
                    'current_connection_is_authorized' => $request->input('current_connection_is_authorized'),
                    'applicant_or_tenant' => $request->input('applicant_or_tenant'),
                    'unauthorized_is_tenant' => $request->input('unauthorized_is_tenant'),
                    'criminal_judicial_issue' => $request->input('criminal_judicial_issue'),
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
