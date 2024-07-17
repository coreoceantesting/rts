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
            $request['user_id'] = Auth::user()->id;

            // Handle file uploads and store original file names
            if ($request->hasFile('application_documents')) {
                $request['application_document'] = $request->application_documents->store('water-department/reconnection');
            }

            if ($request->hasFile('nodues_documents')) {
                $request['nodues_document'] = $request->nodues_documents->store('water-department/reconnection');
            }


            WaterReconnection::create($request->all());

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
            if ($request->hasFile('application_documents')) {
                if ($waterReconnection && Storage::exists($waterReconnection->application_document)) {
                    Storage::delete($waterReconnection->application_document);
                }
                $request['application_document'] = $request->application_documents->store('water-department/reconnection');
            }

            if ($request->hasFile('nodues_documents')) {
                if ($waterReconnection && Storage::exists($waterReconnection->nodues_document)) {
                    Storage::delete($waterReconnection->nodues_document);
                }
                $request['nodues_document'] = $request->nodues_documents->store('water-department/reconnection');
            }

            // Update the rest of the fields
            $waterReconnection->update($request->all());

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
