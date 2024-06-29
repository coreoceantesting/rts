<?php

namespace App\Services\Trade\NewLicense;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use App\Models\Trade\TradeNewLicensePermission;

class NewLicenseService
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
                $application_document = $request->application_document->store('Trade/NewLicense');
            }

            if ($request->hasFile('no_dues_document')) {
                $no_dues_document = $request->no_dues_document->store('Trade/NewLicense');
            }

            TradeNewLicensePermission::create([
                'user_id' => $user_id,
                'applicant_full_name' => $request->input('applicant_full_name'),
                'address' => $request->input('address'),
                'office_address' => $request->input('office_address'),
                'mobile_no' => $request->input('mobile_no'),
                'email_id' => $request->input('email_id'),
                'aadhar_no' => $request->input('aadhar_no'),
                'business_start_date' => $request->input('business_start_date'),
                'business_or_trade_name' => $request->input('business_or_trade_name'),
                'area_size' => $request->input('area_size'),
                'new_permission_details' => $request->input('new_permission_details'),
                'zone' => $request->input('zone'),
                'ward_area' => $request->input('ward_area'),
                'plot_no' => $request->input('plot_no'),
                'city_servye_no' => $request->input('city_servye_no'),
                'description_of_new_trade_place' => $request->input('description_of_new_trade_place'),
                'is_preveious_permission_declined_by_council' => $request->input('is_preveious_permission_declined_by_council'),
                'previous_permission_decline_reason' => $request->input('previous_permission_decline_reason'),
                'is_place_owned_by_council' => $request->input('is_place_owned_by_council'),
                'is_any_dues_pending_of_council' => $request->input('is_any_dues_pending_of_council'),
                'trade_or_business_type' => $request->input('trade_or_business_type'),
                'is_any_partnership_in_trade' => $request->input('is_any_partnership_in_trade'),
                'partner_count' => $request->input('partner_count'),
                'partner_names' => $request->input('partner_names'),
                'property_tax_no' => $request->input('property_tax_no'),
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
        return TradeNewLicensePermission::find($id);
    }

    public function update($request, $id)
    {
        DB::beginTransaction();

        try {

            // Find the existing record
            $tradeNewLicensePermission = TradeNewLicensePermission::findOrFail($id);

            // Handle file uploads and update original file names
            if ($request->hasFile('application_document')) {
                if ($tradeNewLicensePermission && Storage::exists($tradeNewLicensePermission->application_document)) {
                    Storage::delete($tradeNewLicensePermission->application_document);
                }
                $tradeNewLicensePermission->application_document = $request->application_document->store('Trade/NewLicense');
            }

            if ($request->hasFile('no_dues_document')) {
                if ($tradeNewLicensePermission && Storage::exists($tradeNewLicensePermission->no_dues_document)) {
                    Storage::delete($tradeNewLicensePermission->no_dues_document);
                }
                $tradeNewLicensePermission->no_dues_document = $request->no_dues_document->store('Trade/NewLicense');
            }

            $tradeNewLicensePermission->update([
                'applicant_full_name' => $request->input('applicant_full_name'),
                'address' => $request->input('address'),
                'office_address' => $request->input('office_address'),
                'mobile_no' => $request->input('mobile_no'),
                'email_id' => $request->input('email_id'),
                'aadhar_no' => $request->input('aadhar_no'),
                'business_start_date' => $request->input('business_start_date'),
                'business_or_trade_name' => $request->input('business_or_trade_name'),
                'area_size' => $request->input('area_size'),
                'new_permission_details' => $request->input('new_permission_details'),
                'zone' => $request->input('zone'),
                'ward_area' => $request->input('ward_area'),
                'plot_no' => $request->input('plot_no'),
                'city_servye_no' => $request->input('city_servye_no'),
                'description_of_new_trade_place' => $request->input('description_of_new_trade_place'),
                'is_preveious_permission_declined_by_council' => $request->input('is_preveious_permission_declined_by_council'),
                'previous_permission_decline_reason' => $request->input('previous_permission_decline_reason'),
                'is_place_owned_by_council' => $request->input('is_place_owned_by_council'),
                'is_any_dues_pending_of_council' => $request->input('is_any_dues_pending_of_council'),
                'trade_or_business_type' => $request->input('trade_or_business_type'),
                'is_any_partnership_in_trade' => $request->input('is_any_partnership_in_trade'),
                'partner_count' => $request->input('partner_count'),
                'partner_names' => $request->input('partner_names'),
                'property_tax_no' => $request->input('property_tax_no'),
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
