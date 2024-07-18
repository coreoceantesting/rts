<?php

namespace App\Services\FireDepartment\FinalNoObjection;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use App\Models\FireDepartment\FireFinalNoObjection;

class FinalNoObjectionService
{
    public function store($request)
    {
        DB::beginTransaction();

        try {
            $request['user_id'] = Auth::user()->id;
            // Handle file uploads and store original file names
            if ($request->hasFile('uploaded_applications')) {
                $request['uploaded_application'] = $request->uploaded_applications->store('FireDepartment/FinalNoObjection');
            }

            if ($request->hasFile('no_dues_documents')) {
                $request['no_dues_document'] = $request->no_dues_documents->store('FireDepartment/FinalNoObjection');
            }

            if ($request->hasFile('architect_application_documents')) {
                $request['architect_application_document'] = $request->architect_application_documents->store('FireDepartment/FinalNoObjection');
            }

            if ($request->hasFile('erection_of_fire_documents')) {
                $request['erection_of_fire_document'] = $request->erection_of_fire_documents->store('FireDepartment/FinalNoObjection');
            }

            if ($request->hasFile('licensing_agency_documents')) {
                $request['licensing_agency_document'] = $request->licensing_agency_documents->store('FireDepartment/FinalNoObjection');
            }

            if ($request->hasFile('guarantee_of_developer_documents')) {
                $request['guarantee_of_developer_document'] = $request->guarantee_of_developer_documents->store('FireDepartment/FinalNoObjection');
            }

            FireFinalNoObjection::create($request->all());

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
        return FireFinalNoObjection::find($id);
    }

    public function update($request, $id)
    {
        DB::beginTransaction();

        try {

            // Find the existing record
            $fireFinalNoObjection = FireFinalNoObjection::findOrFail($id);

            // Handle file uploads and update original file names
            if ($request->hasFile('uploaded_applications')) {
                if ($fireFinalNoObjection && Storage::exists($fireFinalNoObjection->uploaded_application)) {
                    Storage::delete($fireFinalNoObjection->uploaded_application);
                }
                $request['uploaded_application'] = $request->uploaded_applications->store('FireDepartment/FinalNoObjection');
            }

            if ($request->hasFile('no_dues_documents')) {
                if ($fireFinalNoObjection && Storage::exists($fireFinalNoObjection->no_dues_document)) {
                    Storage::delete($fireFinalNoObjection->no_dues_document);
                }
                $request['no_dues_document'] = $request->no_dues_documents->store('FireDepartment/FinalNoObjection');
            }

            if ($request->hasFile('architect_application_documents')) {
                if ($fireFinalNoObjection && Storage::exists($fireFinalNoObjection->architect_application_document)) {
                    Storage::delete($fireFinalNoObjection->architect_application_document);
                }
                $request['architect_application_document'] = $request->architect_application_documents->store('FireDepartment/FinalNoObjection');
            }

            if ($request->hasFile('erection_of_fire_documents')) {
                if ($fireFinalNoObjection && Storage::exists($fireFinalNoObjection->erection_of_fire_document)) {
                    Storage::delete($fireFinalNoObjection->erection_of_fire_document);
                }
                $request['erection_of_fire_document'] = $request->erection_of_fire_documents->store('FireDepartment/FinalNoObjection');
            }

            if ($request->hasFile('licensing_agency_documents')) {
                if ($fireFinalNoObjection && Storage::exists($fireFinalNoObjection->licensing_agency_document)) {
                    Storage::delete($fireFinalNoObjection->licensing_agency_document);
                }
                $request['licensing_agency_document'] = $request->licensing_agency_documents->store('FireDepartment/FinalNoObjection');
            }

            if ($request->hasFile('guarantee_of_developer_documents')) {
                if ($fireFinalNoObjection && Storage::exists($fireFinalNoObjection->guarantee_of_developer_document)) {
                    Storage::delete($fireFinalNoObjection->guarantee_of_developer_document);
                }
                $request['guarantee_of_developer_document'] = $request->guarantee_of_developer_documents->store('FireDepartment/FinalNoObjection');
            }


            $fireFinalNoObjection->update($request->all());

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
