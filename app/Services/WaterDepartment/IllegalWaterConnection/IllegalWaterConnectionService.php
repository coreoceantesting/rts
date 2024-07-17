<?php

namespace App\Services\WaterDepartment\IllegalWaterConnection;

use App\Models\WaterDepartment\Illegalwaterconnection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class IllegalWaterConnectionService
{
    public function store($request)
    {
        DB::beginTransaction();

        try {
            $request['user_id'] = Auth::user()->id;

            // Handle file uploads and store original file names
            if ($request->hasFile('application_documents')) {
                $request['nodues_document'] = $request->application_documents->store('water-department/illegal-water-connection');
            }

            // Create new Illegalwaterconnection record with merged request data
            Illegalwaterconnection::create($request->all());

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
        return Illegalwaterconnection::find($id);
    }

    public function update($request, $id)
    {
        DB::beginTransaction();

        try {

            // Find the existing record
            $illegalwaterconnection = Illegalwaterconnection::findOrFail($id);

            // Handle file uploads and update original file names
            if ($request->hasFile('application_documents')) {
                if ($illegalwaterconnection && Storage::exists($illegalwaterconnection->application_document)) {
                    Storage::delete($illegalwaterconnection->application_document);
                }
                $request['application_document'] = $request->application_documents->store('water-department/illegal-water-connection');
            }

            // Update the rest of the fields
            $illegalwaterconnection->update($request->all());

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
