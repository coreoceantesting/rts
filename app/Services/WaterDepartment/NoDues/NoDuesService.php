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
            $request['user_id'] = Auth::user()->id;

            // Handle file uploads and store original file names
            if ($request->hasFile('application_documents')) {
                $request['application_document'] = $request->application_documents->store('water-department/no-dues');
            }

            WaterNoDues::create($request->all());
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
            if ($request->hasFile('application_documents')) {
                if ($waterNoDues && Storage::exists($waterNoDues->application_document)) {
                    Storage::delete($waterNoDues->application_document);
                }
                $request['application_document'] = $request->application_documents->store('water-department/no-dues');
            }

            // Update the rest of the fields
            $waterNoDues->update($request->all());

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
