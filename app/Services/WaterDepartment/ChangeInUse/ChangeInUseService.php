<?php

namespace App\Services\WaterDepartment\ChangeInUse;

use App\Models\WaterDepartment\WaterChangeInUse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class ChangeInUseService
{
    public function store($request)
    {
        DB::beginTransaction();

        try {
            $request['user_id'] = Auth::user()->id;
            // Handle file uploads and store original file names
            if ($request->hasFile('application_documents')) {
                $request['application_document'] = $request->application_documents->store('water-department/change-in-use');
            }

            if ($request->hasFile('nodues_documents')) {
                $request['nodues_document'] = $request->nodues_documents->store('water-department/change-in-use');
            }
            WaterChangeInUse::create($request->all());

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
        return WaterChangeInUse::find($id);
    }

    public function update($request, $id)
    {
        DB::beginTransaction();

        try {

            // Find the existing record
            $waterChangeInUse = WaterChangeInUse::findOrFail($id);

            // Handle file uploads and update original file names
            if ($request->hasFile('application_documents')) {
                if ($waterChangeInUse && Storage::exists($waterChangeInUse->application_document)) {
                    Storage::delete($waterChangeInUse->application_document);
                }
                $request['application_document'] = $request->application_documents->store('water-department/change-in-use');
            }

            if ($request->hasFile('nodues_documents')) {
                if ($waterChangeInUse && Storage::exists($waterChangeInUse->nodues_document)) {
                    Storage::delete($waterChangeInUse->nodues_document);
                }
                $request['nodues_document'] = $request->nodues_documents->store('water-department/change-in-use');
            }

            // Update the rest of the fields
            $waterChangeInUse->update($request->all());

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
