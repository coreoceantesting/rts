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
            $request['user_id'] = Auth::user()->id;

            // Handle file uploads and store original file names
            if ($request->hasFile('application_documents')) {
                $request['application_document'] = $request->application_documents->store('WaterDepartment/ChangeOwnership');
            }
            if ($request->hasFile('ownership_documents')) {
                $request['ownership_document'] = $request->ownership_documents->store('WaterDepartment/ChangeOwnership');
            }
            if ($request->hasFile('nodues_documents')) {
                $request['nodues_document'] = $request->nodues_documents->store('WaterDepartment/ChangeOwnership');
            }


            WaterChangeOwnership::create($request->all());

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
            $waterChangeOwnership = WaterChangeOwnership::findOrFail($id);

            // Handle file uploads and update original file names
            if ($request->hasFile('application_documents')) {
                if ($waterChangeOwnership && Storage::exists($waterChangeOwnership->application_document)) {
                    Storage::delete($waterChangeOwnership->application_document);
                }
                $request['application_document'] = $request->application_documents->store('WaterDepartment/ChangeOwnership');
            }

            if ($request->hasFile('ownership_documents')) {
                if ($waterChangeOwnership && Storage::exists($waterChangeOwnership->ownership_document)) {
                    Storage::delete($waterChangeOwnership->ownership_document);
                }
                $request['ownership_document'] = $request->ownership_documents->store('WaterDepartment/ChangeOwnership');
            }

            if ($request->hasFile('nodues_documents')) {
                if ($waterChangeOwnership && Storage::exists($waterChangeOwnership->nodues_document)) {
                    Storage::delete($waterChangeOwnership->nodues_document);
                }
                $request['nodues_document'] = $request->nodues_documents->store('WaterDepartment/ChangeOwnership');
            }

            // Update the rest of the fields
            $waterChangeOwnership->update($request->all());

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
