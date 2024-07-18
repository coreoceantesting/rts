<?php

namespace App\Services\FireDepartment\NoObjection;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use App\Models\FireDepartment\FireNoObjection;

class NoObjectionService
{
    public function store($request)
    {
        DB::beginTransaction();

        try {
            $request['user_id'] = Auth::user()->id;
            // Handle file uploads and store original file names
            if ($request->hasFile('uploaded_applications')) {
                $request['uploaded_application'] = $request->uploaded_applications->store('fire-department/no-objection');
            }

            if ($request->hasFile('no_dues_documents')) {
                $request['no_dues_document'] = $request->no_dues_documents->store('fire-department/no-objection');
            }

            if ($request->hasFile('architect_application_documents')) {
                $request['architect_application_document'] = $request->architect_application_documents->store('fire-department/no-objection');
            }

            if ($request->hasFile('fire_prevention_documents')) {
                $request['fire_prevention_document'] = $request->fire_prevention_documents->store('fire-department/no-objection');
            }

            if ($request->hasFile('capitation_fee_documents')) {
                $request['capitation_fee_document'] = $request->capitation_fee_documents->store('fire-department/no-objection');
            }

            FireNoObjection::create($request->all());

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
        return FireNoObjection::find($id);
    }

    public function update($request, $id)
    {
        DB::beginTransaction();

        try {

            // Find the existing record
            $FireNoObjection = FireNoObjection::findOrFail($id);

            // Handle file uploads and update original file names
            if ($request->hasFile('uploaded_applications')) {
                if ($FireNoObjection && Storage::exists($FireNoObjection->uploaded_application)) {
                    Storage::delete($FireNoObjection->uploaded_application);
                }
                $request['uploaded_application'] = $request->uploaded_applications->store('fire-department/no-objection');
            }

            if ($request->hasFile('no_dues_documents')) {
                if ($FireNoObjection && Storage::exists($FireNoObjection->no_dues_document)) {
                    Storage::delete($FireNoObjection->no_dues_document);
                }
                $request['no_dues_document'] = $request->no_dues_documents->store('fire-department/no-objection');
            }

            if ($request->hasFile('architect_application_documents')) {
                if ($FireNoObjection && Storage::exists($FireNoObjection->architect_application_document)) {
                    Storage::delete($FireNoObjection->architect_application_document);
                }
                $request['architect_application_document'] = $request->architect_application_documents->store('fire-department/no-objection');
            }

            if ($request->hasFile('fire_prevention_documents')) {
                if ($FireNoObjection && Storage::exists($FireNoObjection->fire_prevention_document)) {
                    Storage::delete($FireNoObjection->fire_prevention_document);
                }
                $request['fire_prevention_document'] = $request->fire_prevention_documents->store('fire-department/no-objection');
            }

            if ($request->hasFile('capitation_fee_documents')) {
                if ($FireNoObjection && Storage::exists($FireNoObjection->capitation_fee_document)) {
                    Storage::delete($FireNoObjection->capitation_fee_document);
                }
                $request['capitation_fee_document'] = $request->capitation_fee_documents->store('fire-department/no-objection');
            }


            $FireNoObjection->update($request->all());

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
