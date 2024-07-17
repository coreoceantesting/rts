<?php

namespace App\Services\WaterDepartment\PlumberLicense;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use App\Models\WaterDepartment\WaterPlumberLicense;

class PlumberLicenseService
{
    public function store($request)
    {
        DB::beginTransaction();

        try {
            $request['user_id'] = Auth::user()->id;

            // Handle file uploads and store original file names
            if ($request->hasFile('application_documents')) {
                $request['application_document'] = $request->application_documents->store('water-department/plumber-license');
            }

            if ($request->hasFile('nodues_documents')) {
                $request['nodues_document'] = $request->nodues_documents->store('water-department/plumber-license');
            }

            WaterPlumberLicense::create($request->all());

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
        return WaterPlumberLicense::find($id);
    }

    public function update($request, $id)
    {
        DB::beginTransaction();

        try {

            // Find the existing record
            $waterPlumberLicense = WaterPlumberLicense::findOrFail($id);

            // Handle file uploads and update original file names
            if ($request->hasFile('application_documents')) {
                if ($waterPlumberLicense && Storage::exists($waterPlumberLicense->application_document)) {
                    Storage::delete($waterPlumberLicense->application_document);
                }
                $request['application_document'] = $request->application_documents->store('water-department/plumber-license');
            }

            if ($request->hasFile('nodues_documents')) {
                if ($waterPlumberLicense && Storage::exists($waterPlumberLicense->nodues_document)) {
                    Storage::delete($waterPlumberLicense->nodues_document);
                }
                $request['nodues_document'] = $request->nodues_documents->store('water-department/plumber-license');
            }

            // Update the rest of the fields
            $waterPlumberLicense->update($request->all());

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
