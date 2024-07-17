<?php

namespace App\Services\WaterDepartment\DisconnectSupply;

use App\Models\WaterDepartment\WaterDisconnectSupply;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class DisconnectSupplyService
{
    public function store($request)
    {
        DB::beginTransaction();

        try {
            $request['user_id'] = Auth::user()->id;

            // Handle file uploads and store original file names
            if ($request->hasFile('application_documents')) {
                $request['application_document'] = $request->application_documents->store('water-department/disconnect-supply');
            }

            if ($request->hasFile('nodues_documents')) {
                $request['nodues_document'] = $request->nodues_documents->store('water-department/disconnect-supply');
            }
            WaterDisconnectSupply::create($request->all());

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
        return WaterDisconnectSupply::find($id);
    }

    public function update($request, $id)
    {
        DB::beginTransaction();

        try {

            // Find the existing record
            $waterDisconnectSupply = WaterDisconnectSupply::findOrFail($id);

            // Handle file uploads and update original file names
            if ($request->hasFile('application_documents')) {
                if ($waterDisconnectSupply && Storage::exists($waterDisconnectSupply->application_document)) {
                    Storage::delete($waterDisconnectSupply->application_document);
                }
                $request['application_document'] = $request->application_documents->store('water-department/disconnect-supply');
            }

            if ($request->hasFile('nodues_documents')) {
                if ($waterDisconnectSupply && Storage::exists($waterDisconnectSupply->nodues_document)) {
                    Storage::delete($waterDisconnectSupply->nodues_document);
                }
                $request['nodues_document'] = $request->nodues_documents->store('water-department/disconnect-supply');
            }

            // Update the rest of the fields
            $waterDisconnectSupply->update($request->all());

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
