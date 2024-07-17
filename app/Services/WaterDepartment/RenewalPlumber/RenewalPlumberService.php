<?php

namespace App\Services\WaterDepartment\RenewalPlumber;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use App\Models\WaterDepartment\WaterRenewalOfPlumber;

class RenewalPlumberService
{
    public function store($request)
    {
        DB::beginTransaction();

        try {
            $request['user_id'] = Auth::user()->id;
            // Handle file uploads and store original file names
            if ($request->hasFile('application_documents')) {
                $request['application_document'] = $request->application_documents->store('water-department/renewal-plumber');
            }

            if ($request->hasFile('nodues_documents')) {
                $request['nodues_document'] = $request->nodues_documents->store('water-department/renewal-plumber');
            }

            if ($request->hasFile('educational_certificate_documents')) {
                $request['educational_certificate_document'] = $request->educational_certificate_documents->store('water-department/renewal-plumber');
            }

            WaterRenewalOfPlumber::create($request->all());
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
        return WaterRenewalOfPlumber::find($id);
    }

    public function update($request, $id)
    {
        DB::beginTransaction();

        try {

            // Find the existing record
            $waterRenewalOfPlumber = WaterRenewalOfPlumber::findOrFail($id);

            // Handle file uploads and update original file names
            if ($request->hasFile('application_documents')) {
                if ($waterRenewalOfPlumber && Storage::exists($waterRenewalOfPlumber->application_document)) {
                    Storage::delete($waterRenewalOfPlumber->application_document);
                }
                $request['application_document'] = $request->application_documents->store('water-department/renewal-plumber');
            }

            if ($request->hasFile('nodues_documents')) {
                if ($waterRenewalOfPlumber && Storage::exists($waterRenewalOfPlumber->nodues_document)) {
                    Storage::delete($waterRenewalOfPlumber->nodues_document);
                }
                $request['nodues_document'] = $request->nodues_documents->store('water-department/renewal-plumber');
            }

            if ($request->hasFile('educational_certificate_documents')) {
                if ($waterRenewalOfPlumber && Storage::exists($waterRenewalOfPlumber->educational_certificate_document)) {
                    Storage::delete($waterRenewalOfPlumber->educational_certificate_document);
                }
                $request['educational_certificate_document'] = $request->educational_certificate_documents->store('water-department/renewal-plumber');
            }

            $waterRenewalOfPlumber->update($request->all());

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
