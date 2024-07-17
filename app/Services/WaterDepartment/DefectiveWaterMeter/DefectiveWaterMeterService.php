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
            $request['user_id'] = Auth::user()->id;

            // Handle file uploads and store original file names
            if ($request->hasFile('application_documents')) {
                $request['application_document'] = $request->application_documents->store('water-department/defective-meter');
            }

            WaterDefectiveMeter::create($request->all());

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
            if ($request->hasFile('application_documents')) {
                if ($waterDefectiveMeter && Storage::exists($waterDefectiveMeter->application_document)) {
                    Storage::delete($waterDefectiveMeter->application_document);
                }
                $request['application_document'] = $request->application_documents->store('water-department/defective-meter');
            }

            // Update the rest of the fields
            $waterDefectiveMeter->update($request->alll());

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
