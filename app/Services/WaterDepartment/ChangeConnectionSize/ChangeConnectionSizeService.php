<?php

namespace App\Services\WaterDepartment\ChangeConnectionSize;

use App\Models\WaterDepartment\WaterChangeConnectionSize;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class ChangeConnectionSizeService
{
    public function store($request)
    {
        DB::beginTransaction();
        try {
            $request['user_id'] = Auth::user()->id;
            // Handle file uploads and store original file names
            if ($request->hasFile('application_documents')) {
                $request['application_document'] = $request->application_documents->store('water-department/change-connection-size');
            }

            if ($request->hasFile('nodues_documents')) {
                $request['nodues_document'] = $request->nodues_documents->store('water-department/change-connection-size');
            }
            WaterChangeConnectionSize::create($request->all());

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
        return WaterChangeConnectionSize::find($id);
    }

    public function update($request, $id)
    {
        DB::beginTransaction();

        try {

            // Find the existing record
            $waterChangeConnectionSize = WaterChangeConnectionSize::findOrFail($id);

            // Handle file uploads and update original file names
            if ($request->hasFile('application_documents')) {
                if ($waterChangeConnectionSize && Storage::exists($waterChangeConnectionSize->application_document)) {
                    Storage::delete($waterChangeConnectionSize->application_document);
                }
                $request['application_document'] = $request->application_documents->store('water-department/change-connection-size');
            }

            if ($request->hasFile('nodues_documents')) {
                if ($waterChangeConnectionSize && Storage::exists($waterChangeConnectionSize->nodues_document)) {
                    Storage::delete($waterChangeConnectionSize->nodues_document);
                }
                $request['nodues_document'] = $request->nodues_documents->store('water-department/change-connection-size');
            }
            // Update the rest of the fields
            $waterChangeConnectionSize->update($request->all());

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
