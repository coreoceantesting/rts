<?php

namespace App\Services\Trade\ChangeLicenseName;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use App\Models\Trade\TradeChangeLicenseName;

class ChangeLicenseNameService
{
    public function store($request)
    {
        DB::beginTransaction();

        try {
            $user_id = Auth::user()->id;
            // Handle file uploads and store original file names
            $no_dues_document = null;
            $application_document = null;


            if ($request->hasFile('no_dues_document')) {
                $fileone = $request->file('no_dues_document');
                $no_dues_document = time() . '_' . $fileone->getClientOriginalName();
                $fileone->storeAs('public/Trade/ChangeLicenseName', $no_dues_document);
            }

            if ($request->hasFile('application_document')) {
                $filetwo = $request->file('application_document');
                $application_document = time() . '_' . $filetwo->getClientOriginalName();
                $filetwo->storeAs('public/Trade/ChangeLicenseName', $application_document);
            }

            TradeChangeLicenseName::create([
                'user_id' => $user_id,
                'applicant_full_name' => $request->input('applicant_full_name'),
                'address' => $request->input('address'),
                'mobile_no' => $request->input('mobile_no'),
                'email_id' => $request->input('email_id'),
                'zone' => $request->input('zone'),
                'ward_area' => $request->input('ward_area'), 
                'current_permission_no' => $request->input('current_permission_no'),
                'old_treade_license_name' => $request->input('old_treade_license_name'),
                'new_treade_license_name' => $request->input('new_treade_license_name'),
                'remark' => $request->input('remark'),
                'no_dues_document' => $no_dues_document,
                'application_document' => $application_document,
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
        return TradeChangeLicenseName::find($id);
    }

    public function update($request, $id)
    {
        DB::beginTransaction();

        try {

                // Find the existing record
                $TradeChangeLicenseName = TradeChangeLicenseName::findOrFail($id);

                // Handle file uploads and update original file names
                if ($request->hasFile('no_dues_document')) {
                    $fileone = $request->file('no_dues_document');
                    $no_dues_document = time() . '_' . $fileone->getClientOriginalName();
                    $fileone->storeAs('public/Trade/ChangeLicenseName', $no_dues_document);
                    $TradeChangeLicenseName->no_dues_document = $no_dues_document;
                }

                if ($request->hasFile('application_document')) {
                    $filetwo = $request->file('application_document');
                    $application_document = time() . '_' . $filetwo->getClientOriginalName();
                    $filetwo->storeAs('public/Trade/ChangeLicenseName', $application_document);
                    $TradeChangeLicenseName->application_document = $application_document;
                }
                

                $TradeChangeLicenseName->update([
                    'applicant_full_name' => $request->input('applicant_full_name'),
                    'address' => $request->input('address'),
                    'mobile_no' => $request->input('mobile_no'),
                    'email_id' => $request->input('email_id'),
                    'zone' => $request->input('zone'),
                    'ward_area' => $request->input('ward_area'), 
                    'current_permission_no' => $request->input('current_permission_no'),
                    'old_treade_license_name' => $request->input('old_treade_license_name'),
                    'new_treade_license_name' => $request->input('new_treade_license_name'),
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
