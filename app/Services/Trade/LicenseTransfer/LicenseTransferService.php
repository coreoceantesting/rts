<?php

namespace App\Services\Trade\LicenseTransfer;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use App\Models\Trade\TradeLicenseTransfer;

class LicenseTransferService
{
    public function store($request)
    {
        DB::beginTransaction();

        try {
            $user_id = Auth::user()->id;
            // Handle file uploads and store original file names
            $application_document = null;
            $no_dues_document = null;


            if ($request->hasFile('application_document')) {
                $fileone = $request->file('application_document');
                $application_document = time() . '_' . $fileone->getClientOriginalName();
                $fileone->storeAs('public/Trade/LicenseTransfer', $application_document);
            }

            if ($request->hasFile('no_dues_document')) {
                $filetwo = $request->file('no_dues_document');
                $no_dues_document = time() . '_' . $filetwo->getClientOriginalName();
                $filetwo->storeAs('public/Trade/LicenseTransfer', $no_dues_document);
            }

            TradeLicenseTransfer::create([
                'user_id' => $user_id,
                'applicant_full_name' => $request->input('applicant_full_name'),
                'office_address' => $request->input('office_address'),
                'mobile_no' => $request->input('mobile_no'),
                'email_id' => $request->input('email_id'),
                'aadhar_no' => $request->input('aadhar_no'), 
                'current_permission_no' => $request->input('current_permission_no'),
                'current_permission_date' => $request->input('current_permission_date'),
                'business_start_date' => $request->input('business_start_date'),
                'business_or_trade_name' => $request->input('business_or_trade_name'),
                'area_size' => $request->input('area_size'),
                'new_permission_details' => $request->input('new_permission_details'),
                'zone' => $request->input('zone'),
                'ward_area' => $request->input('ward_area'),
                'plot_no' => $request->input('plot_no'),
                'description_of_new_trade_place' => $request->input('description_of_new_trade_place'),
                'is_preveious_permission_declined_by_council' => $request->input('is_preveious_permission_declined_by_council'),
                'previous_permission_decline_reason' => $request->input('previous_permission_decline_reason'),
                'is_place_owned_by_council' => $request->input('is_place_owned_by_council'),
                'is_any_dues_pending_of_council' => $request->input('is_any_dues_pending_of_council'),
                'trade_or_business_type' => $request->input('trade_or_business_type'),
                'partner_count' => $request->input('partner_count'),
                'partner_names' => $request->input('partner_names'),
                'property_no' => $request->input('property_no'),
                'new_applicant_name' => $request->input('new_applicant_name'),
                'new_applicant_email' => $request->input('new_applicant_email'),
                'new_applicant_mobile_no' => $request->input('new_applicant_mobile_no'),
                'new_applicant_aadhar_no' => $request->input('new_applicant_aadhar_no'),
                'address_of_new_applicant' => $request->input('address_of_new_applicant'),
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
        return TradeLicenseTransfer::find($id);
    }

    public function update($request, $id)
    {
        DB::beginTransaction();

        try {

                // Find the existing record
                $TradeLicenseTransfer = TradeLicenseTransfer::findOrFail($id);

                // Handle file uploads and update original file names
                if ($request->hasFile('application_document')) {
                    $fileone = $request->file('application_document');
                    $application_document = time() . '_' . $fileone->getClientOriginalName();
                    $fileone->storeAs('public/Trade/LicenseTransfer', $application_document);
                    $TradeLicenseTransfer->application_document = $application_document;
                }

                if ($request->hasFile('no_dues_document')) {
                    $filetwo = $request->file('no_dues_document');
                    $no_dues_document = time() . '_' . $filetwo->getClientOriginalName();
                    $filetwo->storeAs('public/Trade/LicenseTransfer', $no_dues_document);
                    $TradeLicenseTransfer->no_dues_document = $no_dues_document;
                }

                $TradeLicenseTransfer->update([
                    'applicant_full_name' => $request->input('applicant_full_name'),
                    'office_address' => $request->input('office_address'),
                    'mobile_no' => $request->input('mobile_no'),
                    'email_id' => $request->input('email_id'),
                    'aadhar_no' => $request->input('aadhar_no'), 
                    'current_permission_no' => $request->input('current_permission_no'),
                    'current_permission_date' => $request->input('current_permission_date'),
                    'business_start_date' => $request->input('business_start_date'),
                    'business_or_trade_name' => $request->input('business_or_trade_name'),
                    'area_size' => $request->input('area_size'),
                    'new_permission_details' => $request->input('new_permission_details'),
                    'zone' => $request->input('zone'),
                    'ward_area' => $request->input('ward_area'),
                    'plot_no' => $request->input('plot_no'),
                    'description_of_new_trade_place' => $request->input('description_of_new_trade_place'),
                    'is_preveious_permission_declined_by_council' => $request->input('is_preveious_permission_declined_by_council'),
                    'previous_permission_decline_reason' => $request->input('previous_permission_decline_reason'),
                    'is_place_owned_by_council' => $request->input('is_place_owned_by_council'),
                    'is_any_dues_pending_of_council' => $request->input('is_any_dues_pending_of_council'),
                    'trade_or_business_type' => $request->input('trade_or_business_type'),
                    'partner_count' => $request->input('partner_count'),
                    'partner_names' => $request->input('partner_names'),
                    'property_no' => $request->input('property_no'),
                    'new_applicant_name' => $request->input('new_applicant_name'),
                    'new_applicant_email' => $request->input('new_applicant_email'),
                    'new_applicant_mobile_no' => $request->input('new_applicant_mobile_no'),
                    'new_applicant_aadhar_no' => $request->input('new_applicant_aadhar_no'),
                    'address_of_new_applicant' => $request->input('address_of_new_applicant'),
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
