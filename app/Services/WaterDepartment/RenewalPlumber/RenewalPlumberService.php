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
            $user_id = Auth::user()->id;
            // Handle file uploads and store original file names
            $application_document = null;
            $nodues_document = null;
            $educational_certificate_document = null;


            if ($request->hasFile('application_document')) {
                $fileone = $request->file('application_document');
                $application_document = time() . '_' . $fileone->getClientOriginalName();
                $fileone->storeAs('public/WaterDepartment/RenewalPlumber', $application_document);
            }

            if ($request->hasFile('nodues_document')) {
                $filetwo = $request->file('nodues_document');
                $nodues_document = time() . '_' . $filetwo->getClientOriginalName();
                $filetwo->storeAs('public/WaterDepartment/RenewalPlumber', $nodues_document);
            }

            if ($request->hasFile('educational_certificate_document')) {
                $filethree = $request->file('educational_certificate_document');
                $educational_certificate_document = time() . '_' . $filethree->getClientOriginalName();
                $filethree->storeAs('public/WaterDepartment/RenewalPlumber', $educational_certificate_document);
            }

            WaterRenewalOfPlumber::create([
                'user_id' => $user_id,
                'plumber_license_no' => $request->input('plumber_license_no'),
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
                'remark' => $request->input('remark'),
                'application_document' => $application_document,
                'nodues_document' => $nodues_document,
                'educational_certificate_document' => $educational_certificate_document,
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
        return WaterRenewalOfPlumber::find($id);
    }

    public function update($request, $id)
    {
        DB::beginTransaction();

        try {

                // Find the existing record
                $WaterRenewalOfPlumber = WaterRenewalOfPlumber::findOrFail($id);

                // Handle file uploads and update original file names
                if ($request->hasFile('application_document')) {
                    $fileone = $request->file('application_document');
                    $application_document = time() . '_' . $fileone->getClientOriginalName();
                    $fileone->storeAs('public/WaterDepartment/RenewalPlumber', $application_document);
                    $WaterRenewalOfPlumber->application_document = $application_document;
                }

                if ($request->hasFile('nodues_document')) {
                    $filetwo = $request->file('nodues_document');
                    $nodues_document = time() . '_' . $filetwo->getClientOriginalName();
                    $filetwo->storeAs('public/WaterDepartment/RenewalPlumber', $nodues_document);
                    $WaterRenewalOfPlumber->nodues_document = $nodues_document;
                }

                if ($request->hasFile('educational_certificate_document')) {
                    $filethree = $request->file('educational_certificate_document');
                    $educational_certificate_document = time() . '_' . $filethree->getClientOriginalName();
                    $filethree->storeAs('public/WaterDepartment/RenewalPlumber', $educational_certificate_document);
                    $WaterRenewalOfPlumber->educational_certificate_document = $educational_certificate_document;
                }

                $WaterRenewalOfPlumber->update([
                    'plumber_license_no' => $request->input('plumber_license_no'),
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
                    'remark' => $request->input('remark'),
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
