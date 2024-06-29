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
            $user_id = Auth::user()->id;
            // Handle file uploads and store original file names
            $uploaded_application = null;
            $no_dues_document = null;
            $architect_application_document = null;
            $fire_prevention_document = null;
            $capitation_fee_document = null;

            if ($request->hasFile('uploaded_application')) {
                $uploaded_application = $request->uploaded_application->store('FireDepartment/NoObjection');
            }

            if ($request->hasFile('no_dues_document')) {
                $no_dues_document = $request->no_dues_document->store('FireDepartment/NoObjection');
            }

            if ($request->hasFile('architect_application_document')) {
                $architect_application_document = $request->architect_application_document->store('FireDepartment/NoObjection');
            }

            if ($request->hasFile('fire_prevention_document')) {
                $fire_prevention_document = $request->fire_prevention_document->store('FireDepartment/NoObjection');
            }

            if ($request->hasFile('capitation_fee_document')) {
                $capitation_fee_document = $request->capitation_fee_document->store('FireDepartment/NoObjection');
            }

            FireNoObjection::create([
                'user_id' => $user_id,
                'applicant_full_name' => $request->input('applicant_full_name'),
                'building_type' => $request->input('building_type'),
                'building_name' => $request->input('building_name'),
                'address' => $request->input('address'),
                'mobile_no' => $request->input('mobile_no'),
                'email_id' => $request->input('email_id'),
                'aadhar_no' => $request->input('aadhar_no'),
                'zone' => $request->input('zone'),
                'ward_area' => $request->input('ward_area'),
                'subject' => $request->input('subject'),
                'uploaded_application' => $uploaded_application,
                'no_dues_document' => $no_dues_document,
                'architect_application_document' => $architect_application_document,
                'fire_prevention_document' => $fire_prevention_document,
                'capitation_fee_document' => $capitation_fee_document,
            ]);

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
            if ($request->hasFile('uploaded_application')) {
                if ($FireNoObjection && Storage::exists($FireNoObjection->uploaded_application)) {
                    Storage::delete($FireNoObjection->uploaded_application);
                }
                $FireNoObjection->uploaded_application = $request->uploaded_application->store('FireDepartment/NoObjection');
            }

            if ($request->hasFile('no_dues_document')) {
                if ($FireNoObjection && Storage::exists($FireNoObjection->no_dues_document)) {
                    Storage::delete($FireNoObjection->no_dues_document);
                }
                $FireNoObjection->no_dues_document = $request->no_dues_document->store('FireDepartment/NoObjection');
            }

            if ($request->hasFile('architect_application_document')) {
                if ($FireNoObjection && Storage::exists($FireNoObjection->architect_application_document)) {
                    Storage::delete($FireNoObjection->architect_application_document);
                }
                $FireNoObjection->architect_application_document = $request->architect_application_document->store('FireDepartment/NoObjection');
            }

            if ($request->hasFile('fire_prevention_document')) {
                if ($FireNoObjection && Storage::exists($FireNoObjection->fire_prevention_document)) {
                    Storage::delete($FireNoObjection->fire_prevention_document);
                }
                $FireNoObjection->fire_prevention_document = $request->fire_prevention_document->store('FireDepartment/NoObjection');
            }

            if ($request->hasFile('capitation_fee_document')) {
                if ($FireNoObjection && Storage::exists($FireNoObjection->capitation_fee_document)) {
                    Storage::delete($FireNoObjection->capitation_fee_document);
                }
                $FireNoObjection->capitation_fee_document = $request->capitation_fee_document->store('FireDepartment/NoObjection');
            }


            $FireNoObjection->update([
                'applicant_full_name' => $request->input('applicant_full_name'),
                'building_type' => $request->input('building_type'),
                'building_name' => $request->input('building_name'),
                'address' => $request->input('address'),
                'mobile_no' => $request->input('mobile_no'),
                'email_id' => $request->input('email_id'),
                'aadhar_no' => $request->input('aadhar_no'),
                'zone' => $request->input('zone'),
                'ward_area' => $request->input('ward_area'),
                'subject' => $request->input('subject'),
            ]);

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
