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

        try {
            $request['user_id'] = Auth::user()->id;

            // Handle file uploads and store original file names
            if ($request->hasFile('written_application_documents')) {
                $request['written_application_document'] = $request->written_application_documents->store('water-department/new-water-connection');
            }

            if ($request->hasFile('ownership_documents')) {
                $request['ownership_document'] = $request->ownership_documents->store('water-department/new-water-connection');
            }

            if ($request->hasFile('no_dues_documents')) {
                $request['no_dues_document'] = $request->no_dues_documents->store('water-department/new-water-connection');
            }
            // Create new Waternewconnection record with merged request data
            Waternewconnection::create($request->all());

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
            if ($request->hasFile('written_application_documents')) {
                if ($newWaterConnection && Storage::exists($newWaterConnection->written_application_document)) {
                    Storage::delete($newWaterConnection->written_application_document);
                }
                $request['written_application_document'] = $request->written_application_documents->store('water-department/new-water-connection');
            }

            if ($request->hasFile('ownership_documents')) {
                if ($newWaterConnection && Storage::exists($newWaterConnection->ownership_document)) {
                    Storage::delete($newWaterConnection->ownership_document);
                }
                $request['ownership_document'] = $request->ownership_documents->store('water-department/new-water-connection');
            }

            if ($request->hasFile('no_dues_documents')) {
                if ($newWaterConnection && Storage::exists($newWaterConnection->no_dues_document)) {
                    Storage::delete($newWaterConnection->no_dues_document);
                }
                $request['no_dues_document'] = $request->no_dues_documents->store('water-department/new-water-connection');
            }

            // Update the rest of the fields
            $newWaterConnection->update($request->all());

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
