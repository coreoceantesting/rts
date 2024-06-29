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
            $user_id = Auth::user()->id;

            // Handle file uploads and store original file names
            $application_document = null;
            $nodues_document = null;

            if ($request->hasFile('application_document')) {
                $application_document = $request->application_document->store('WaterDepartment/PlumberLicense');
            }

            if ($request->hasFile('nodues_document')) {
                $nodues_document = $request->nodues_document->store('WaterDepartment/PlumberLicense');
            }

            WaterPlumberLicense::create([
                'user_id' => $user_id,
                'applicant_name' => $request->input('applicant_name'),
                'address' => $request->input('address'),
                'aadhar_no' => $request->input('aadhar_no'),
                'mobile_no' => $request->input('mobile_no'),
                'email_id' => $request->input('email_id'),
                'zone' => $request->input('zone'),
                'ward_area' => $request->input('ward_area'),
                'education_institutation' => $request->input('education_institutation'),
                'education_qualification' => $request->input('education_qualification'),
                'training_institute_name' => $request->input('training_institute_name'),
                'year_of_passing' => $request->input('year_of_passing'),
                'have_experience' => $request->input('have_experience'),
                'application_document' => $application_document,
                'nodues_document' => $nodues_document,
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
        return WaterPlumberLicense::find($id);
    }

    public function update($request, $id)
    {
        DB::beginTransaction();

        try {

            // Find the existing record
            $waterPlumberLicense = WaterPlumberLicense::findOrFail($id);

            // Handle file uploads and update original file names
            if ($request->hasFile('application_document')) {
                if ($waterPlumberLicense && Storage::exists($waterPlumberLicense->application_document)) {
                    Storage::delete($waterPlumberLicense->application_document);
                }
                $waterPlumberLicense->application_document = $request->application_document->store('WaterDepartment/PlumberLicense');
            }

            if ($request->hasFile('nodues_document')) {
                if ($waterPlumberLicense && Storage::exists($waterPlumberLicense->nodues_document)) {
                    Storage::delete($waterPlumberLicense->nodues_document);
                }
                $waterPlumberLicense->nodues_document = $request->nodues_document->store('WaterDepartment/PlumberLicense');
            }

            // Update the rest of the fields
            $waterPlumberLicense->update([
                'applicant_name' => $request->input('applicant_name'),
                'address' => $request->input('address'),
                'aadhar_no' => $request->input('aadhar_no'),
                'mobile_no' => $request->input('mobile_no'),
                'email_id' => $request->input('email_id'),
                'zone' => $request->input('zone'),
                'ward_area' => $request->input('ward_area'),
                'education_institutation' => $request->input('education_institutation'),
                'education_qualification' => $request->input('education_qualification'),
                'training_institute_name' => $request->input('training_institute_name'),
                'year_of_passing' => $request->input('year_of_passing'),
                'have_experience' => $request->input('have_experience'),
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
