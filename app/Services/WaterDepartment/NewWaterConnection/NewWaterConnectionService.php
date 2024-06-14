<?php

namespace App\Services\WaterDepartment\NewWaterConnection;

use App\Models\WaterDepartment\Waternewconnection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class NewWaterConnectionService
{
    public function store($request)
    {
        DB::beginTransaction();

    try
     {
            $user_id = Auth::user()->id;

            // Handle file uploads and store original file names
            $written_application_document = null;
            $ownership_document = null;
            $no_dues_document = null;

            if ($request->hasFile('written_application_document')) {
                $fileone = $request->file('written_application_document');
                $written_application_document = $fileone->getClientOriginalName();
                $fileone->storeAs('public/WaterDepartment/NewWaterConnection', $written_application_document);
            }

            if ($request->hasFile('ownership_document')) {
                $filetwo = $request->file('ownership_document');
                $ownership_document = $filetwo->getClientOriginalName();
                $filetwo->storeAs('public/WaterDepartment/NewWaterConnection', $ownership_document);
            }

            if ($request->hasFile('no_dues_document')) {
                $filethree = $request->file('no_dues_document');
                $no_dues_document = $filethree->getClientOriginalName();
                $filethree->storeAs('public/WaterDepartment/NewWaterConnection', $no_dues_document);
            }

            // Create new Waternewconnection record with merged request data
            Waternewconnection::create([
                'user_id' => $user_id,
                'applicant_full_name' => $request->input('applicant_full_name'),
                'aadhar_no' => $request->input('aadhar_no'),
                'mobile_no' => $request->input('mobile_no'),
                'email_id' => $request->input('email_id'),
                'zone' => $request->input('zone'),
                'ward_area' => $request->input('ward_area'),
                'city_servey_no' => $request->input('city_servey_no'),
                'address' => $request->input('address'),
                'landmark' => $request->input('landmark'),
                'property_no' => $request->input('property_no'),
                'total_person' => $request->input('total_person'),
                'distance' => $request->input('distance'),
                'water_connection_use' => $request->input('water_connection_use'),
                'pipe_size' => $request->input('pipe_size'),
                'no_of_tap' => $request->input('no_of_tap'),
                'current_no_of_tap' => $request->input('current_no_of_tap'),
                'total_tenants' => $request->input('total_tenants'),
                'written_application_document' => $written_application_document,
                'ownership_document' => $ownership_document,
                'no_dues_document' => $no_dues_document,
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
        return Waternewconnection::find($id);
    }

    public function update($request, $id)
    {
        DB::beginTransaction();

        try {

                // Find the existing record
                $newWaterConnection = Waternewconnection::findOrFail($id);

                // Handle file uploads and update original file names
                if ($request->hasFile('written_application_document')) {
                    $fileone = $request->file('written_application_document');
                    $written_application_document = $fileone->getClientOriginalName();
                    $fileone->storeAs('public/WaterDepartment/NewWaterConnection', $written_application_document);
                    $newWaterConnection->written_application_document = $written_application_document;
                }

                if ($request->hasFile('ownership_document')) {
                    $filetwo = $request->file('ownership_document');
                    $ownership_document = $filetwo->getClientOriginalName();
                    $filetwo->storeAs('public/WaterDepartment/NewWaterConnection', $ownership_document);
                    $newWaterConnection->ownership_document = $ownership_document;
                }

                if ($request->hasFile('no_dues_document')) {
                    $filethree = $request->file('no_dues_document');
                    $no_dues_document = $filethree->getClientOriginalName();
                    $filethree->storeAs('public/WaterDepartment/NewWaterConnection', $no_dues_document);
                    $newWaterConnection->no_dues_document = $no_dues_document;
                }

                // Update the rest of the fields
                $newWaterConnection->update([
                    'applicant_full_name' => $request->input('applicant_full_name'),
                    'aadhar_no' => $request->input('aadhar_no'),
                    'mobile_no' => $request->input('mobile_no'),
                    'email_id' => $request->input('email_id'),
                    'zone' => $request->input('zone'),
                    'ward_area' => $request->input('ward_area'),
                    'city_servey_no' => $request->input('city_servey_no'),
                    'address' => $request->input('address'),
                    'landmark' => $request->input('landmark'),
                    'property_no' => $request->input('property_no'),
                    'total_person' => $request->input('total_person'),
                    'distance' => $request->input('distance'),
                    'water_connection_use' => $request->input('water_connection_use'),
                    'pipe_size' => $request->input('pipe_size'),
                    'no_of_tap' => $request->input('no_of_tap'),
                    'current_no_of_tap' => $request->input('current_no_of_tap'),
                    'total_tenants' => $request->input('total_tenants'),
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
