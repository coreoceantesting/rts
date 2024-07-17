<?php

namespace App\Services\WaterDepartment\WaterPressure;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use App\Models\WaterDepartment\WaterPressureComplaint;

class WaterPressureService
{
    public function store($request)
    {
        DB::beginTransaction();

        try {
            $request['user_id'] = Auth::user()->id;
            // Handle file uploads and store original file names
            $application_document = null;

            if ($request->hasFile('application_documents')) {
                $request['application_document'] = $request->application_documents->store('water-department/water-pressure');
            }

            WaterPressureComplaint::create($request->all());

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
        return WaterPressureComplaint::find($id);
    }

    public function update($request, $id)
    {
        DB::beginTransaction();

        try {

            // Find the existing record
            $waterPressureComplaint = WaterPressureComplaint::findOrFail($id);

            // Handle file uploads and update original file names
            if ($request->hasFile('application_documents')) {
                if ($waterPressureComplaint && Storage::exists($waterPressureComplaint->application_document)) {
                    Storage::delete($waterPressureComplaint->application_document);
                }
                $request['application_document'] = $request->application_documents->store('water-department/water-pressure');
            }

            $waterPressureComplaint->update($request->all());

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
