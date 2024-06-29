<?php

namespace App\Services\Trade\RenewalLicense;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use App\Models\Trade\TradeRenewalLicensePermission;

class RenewalLicenseService
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
                $application_document = $request->application_document->store('Trade/RenewalLicense');
            }

            if ($request->hasFile('no_dues_document')) {
                $no_dues_document = $request->no_dues_document->store('Trade/RenewalLicense');
            }

            TradeRenewalLicensePermission::create([
                'user_id' => $user_id,
                'applicant_full_name' => $request->input('applicant_full_name'),
                'address' => $request->input('address'),
                'office_address' => $request->input('office_address'),
                'mobile_no' => $request->input('mobile_no'),
                'email_id' => $request->input('email_id'),
                'aadhar_no' => $request->input('aadhar_no'),
                'old_permission_no' => $request->input('old_permission_no'),
                'old_permission_date' => $request->input('old_permission_date'),
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
                'is_any_partnership_in_trade' => $request->input('is_any_partnership_in_trade'),
                'partner_count' => $request->input('partner_count'),
                'partner_names' => $request->input('partner_names'),
                'property_no' => $request->input('property_no'),
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
        return TradeRenewalLicensePermission::find($id);
    }

    public function update($request, $id)
    {
        DB::beginTransaction();

        try {

            // Find the existing record
            $tradeRenewalLicensePermission = TradeRenewalLicensePermission::findOrFail($id);

            // Handle file uploads and update original file names
            if ($request->hasFile('application_document')) {
                if ($tradeRenewalLicensePermission && Storage::exists($tradeRenewalLicensePermission->application_document)) {
                    Storage::delete($tradeRenewalLicensePermission->application_document);
                }
                $tradeRenewalLicensePermission->application_document = $request->application_document->store('Trade/RenewalLicense');
            }

            if ($request->hasFile('no_dues_document')) {
                if ($tradeRenewalLicensePermission && Storage::exists($tradeRenewalLicensePermission->no_dues_document)) {
                    Storage::delete($tradeRenewalLicensePermission->no_dues_document);
                }
                $tradeRenewalLicensePermission->no_dues_document = $request->no_dues_document->store('Trade/RenewalLicense');
            }

            $tradeRenewalLicensePermission->update([
                'applicant_full_name' => $request->input('applicant_full_name'),
                'address' => $request->input('address'),
                'office_address' => $request->input('office_address'),
                'mobile_no' => $request->input('mobile_no'),
                'email_id' => $request->input('email_id'),
                'aadhar_no' => $request->input('aadhar_no'),
                'old_permission_no' => $request->input('old_permission_no'),
                'old_permission_date' => $request->input('old_permission_date'),
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
                'is_any_partnership_in_trade' => $request->input('is_any_partnership_in_trade'),
                'partner_count' => $request->input('partner_count'),
                'partner_names' => $request->input('partner_names'),
                'property_no' => $request->input('property_no'),
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
