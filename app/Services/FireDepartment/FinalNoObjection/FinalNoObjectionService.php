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
            $user_id = Auth::user()->id;
            // Handle file uploads and store original file names
            $uploaded_application = null;
            $no_dues_document = null;
            $architect_application_document = null;
            $erection_of_fire_document = null;
            $licensing_agency_document = null;
            $guarantee_of_developer_document = null;

            if ($request->hasFile('uploaded_application')) {
                $uploaded_application = $request->uploaded_application->store('FireDepartment/FinalNoObjection');
            }

            if ($request->hasFile('no_dues_document')) {
                $no_dues_document = $request->no_dues_document->store('FireDepartment/FinalNoObjection');
            }

            if ($request->hasFile('architect_application_document')) {
                $architect_application_document = $request->architect_application_document->store('FireDepartment/FinalNoObjection');
            }

            if ($request->hasFile('erection_of_fire_document')) {
                $erection_of_fire_document = $request->erection_of_fire_document->store('FireDepartment/FinalNoObjection');
            }

            if ($request->hasFile('licensing_agency_document')) {
                $licensing_agency_document = $request->licensing_agency_document->store('FireDepartment/FinalNoObjection');
            }

            if ($request->hasFile('guarantee_of_developer_document')) {
                $guarantee_of_developer_document = $request->guarantee_of_developer_document->store('FireDepartment/FinalNoObjection');
            }

            FireFinalNoObjection::create([
                'user_id' => $user_id,
                'applicant_full_name' => $request->input('applicant_full_name'),
                'address' => $request->input('address'),
                'mobile_no' => $request->input('mobile_no'),
                'email_id' => $request->input('email_id'),
                'aadhar_no' => $request->input('aadhar_no'),
                'zone' => $request->input('zone'),
                'ward_area' => $request->input('ward_area'),
                'building_type' => $request->input('building_type'),
                'house_no' => $request->input('house_no'),
                'building_name' => $request->input('building_name'),
                'city_structure' => $request->input('city_structure'),
                'uploaded_application' => $uploaded_application,
                'no_dues_document' => $no_dues_document,
                'architect_application_document' => $architect_application_document,
                'erection_of_fire_document' => $erection_of_fire_document,
                'licensing_agency_document' => $licensing_agency_document,
                'guarantee_of_developer_document' => $guarantee_of_developer_document,
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
        return FireFinalNoObjection::find($id);
    }

    public function update($request, $id)
    {
        DB::beginTransaction();

        try {

            // Find the existing record
            $FireFinalNoObjection = FireFinalNoObjection::findOrFail($id);

            // Handle file uploads and update original file names
            if ($request->hasFile('uploaded_application')) {
                if ($FireFinalNoObjection && Storage::exists($FireFinalNoObjection->uploaded_application)) {
                    Storage::delete($FireFinalNoObjection->uploaded_application);
                }
                $FireFinalNoObjection->uploaded_application = $request->uploaded_application->store('FireDepartment/FinalNoObjection');
            }

            if ($request->hasFile('no_dues_document')) {
                if ($FireFinalNoObjection && Storage::exists($FireFinalNoObjection->no_dues_document)) {
                    Storage::delete($FireFinalNoObjection->no_dues_document);
                }
                $FireFinalNoObjection->no_dues_document = $request->no_dues_document->store('FireDepartment/FinalNoObjection');
            }

            if ($request->hasFile('architect_application_document')) {
                if ($FireFinalNoObjection && Storage::exists($FireFinalNoObjection->architect_application_document)) {
                    Storage::delete($FireFinalNoObjection->architect_application_document);
                }
                $FireFinalNoObjection->architect_application_document = $request->architect_application_document->store('FireDepartment/FinalNoObjection');
            }

            if ($request->hasFile('erection_of_fire_document')) {
                if ($FireFinalNoObjection && Storage::exists($FireFinalNoObjection->erection_of_fire_document)) {
                    Storage::delete($FireFinalNoObjection->erection_of_fire_document);
                }
                $FireFinalNoObjection->erection_of_fire_document = $request->erection_of_fire_document->store('FireDepartment/FinalNoObjection');
            }

            if ($request->hasFile('licensing_agency_document')) {
                if ($FireFinalNoObjection && Storage::exists($FireFinalNoObjection->licensing_agency_document)) {
                    Storage::delete($FireFinalNoObjection->licensing_agency_document);
                }
                $FireFinalNoObjection->licensing_agency_document = $request->licensing_agency_document->store('FireDepartment/FinalNoObjection');
            }

            if ($request->hasFile('guarantee_of_developer_document')) {
                if ($FireFinalNoObjection && Storage::exists($FireFinalNoObjection->guarantee_of_developer_document)) {
                    Storage::delete($FireFinalNoObjection->guarantee_of_developer_document);
                }
                $FireFinalNoObjection->guarantee_of_developer_document = $request->guarantee_of_developer_document->store('FireDepartment/FinalNoObjection');
            }


            $FireFinalNoObjection->update([
                'applicant_full_name' => $request->input('applicant_full_name'),
                'address' => $request->input('address'),
                'mobile_no' => $request->input('mobile_no'),
                'email_id' => $request->input('email_id'),
                'aadhar_no' => $request->input('aadhar_no'),
                'zone' => $request->input('zone'),
                'ward_area' => $request->input('ward_area'),
                'building_type' => $request->input('building_type'),
                'house_no' => $request->input('house_no'),
                'building_name' => $request->input('building_name'),
                'city_structure' => $request->input('city_structure'),
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
