<?php

namespace App\Services\WaterDepartment\WaterQuality;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use App\Models\WaterDepartment\WaterQualityComplaint;

class WaterQualityService
{
    public function store($request)
    {
        DB::beginTransaction();

        try {
            $request['user_id'] = Auth::user()->id;
            // Handle file uploads and store original file names
            if ($request->hasFile('application_documents')) {
                $request['application_document'] = $request->application_documents->store('water-department/water-quality');
            }

            WaterQualityComplaint::create($request->all());

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
        return WaterQualityComplaint::find($id);
    }

    public function update($request, $id)
    {
        DB::beginTransaction();

        try {

            // Find the existing record
            $waterQualityComplaint = WaterQualityComplaint::findOrFail($id);

            // Handle file uploads and update original file names
            if ($request->hasFile('application_documents')) {
                if ($waterQualityComplaint && Storage::exists($waterQualityComplaint->application_document)) {
                    Storage::delete($waterQualityComplaint->application_document);
                }
                $request['application_document'] = $request->application_documents->store('water-department/water-quality');
            }

            $waterQualityComplaint->update($request->all());
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
