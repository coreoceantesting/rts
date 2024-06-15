<?php

namespace App\Services\WaterDepartment\TaxBill;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use App\Models\WaterDepartment\WaterTaxBill;

class TaxBillService
{
    public function store($request)
    {
        DB::beginTransaction();

        try {
            $user_id = Auth::user()->id;

            // Handle file uploads and store original file names
            $application_document = null;

            if ($request->hasFile('application_document')) {
                $fileone = $request->file('application_document');
                $application_document = time() . '_' . $fileone->getClientOriginalName();
                $fileone->storeAs('public/WaterDepartment/TaxBill', $application_document);
            }


            WaterTaxBill::create([
                'user_id' => $user_id,
                'property_owner_name' => $request->input('property_owner_name'),
                'aadhar_no' => $request->input('aadhar_no'),
                'email_id' => $request->input('email_id'),
                'mobile_no' => $request->input('mobile_no'),
                'zone' => $request->input('zone'),
                'ward_area' => $request->input('ward_area'),
                'address' => $request->input('address'),
                'city_serve_no' => $request->input('city_serve_no'),
                'property_no' => $request->input('property_no'),
                'house_no' => $request->input('house_no'),
                'plot_no' => $request->input('plot_no'),
                'landmark' => $request->input('landmark'),
                'new_water_con' => $request->input('new_water_con'),
                'current_connection_is_illegal' => $request->input('current_connection_is_illegal'),
                'applicant_or_tenant' => $request->input('applicant_or_tenant'),
                'criminal_judicial_issue' => $request->input('criminal_judicial_issue'),
                'place_belongs_to_municipal' => $request->input('place_belongs_to_municipal'),
                'comment' => $request->input('comment'),
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
        return WaterTaxBill::find($id);
    }

    public function update($request, $id)
    {
        DB::beginTransaction();

        try {

                // Find the existing record
                $WaterTaxBill = WaterTaxBill::findOrFail($id);

                // Handle file uploads and update original file names
                if ($request->hasFile('application_document')) {
                    $fileone = $request->file('application_document');
                    $application_document = time() . '_' . $fileone->getClientOriginalName();
                    $fileone->storeAs('public/WaterDepartment/TaxBill', $application_document);
                    $WaterTaxBill->application_document = $application_document;
                }

                // Update the rest of the fields
                $WaterTaxBill->update([
                    'property_owner_name' => $request->input('property_owner_name'),
                    'aadhar_no' => $request->input('aadhar_no'),
                    'email_id' => $request->input('email_id'),
                    'mobile_no' => $request->input('mobile_no'),
                    'zone' => $request->input('zone'),
                    'ward_area' => $request->input('ward_area'),
                    'address' => $request->input('address'),
                    'city_serve_no' => $request->input('city_serve_no'),
                    'property_no' => $request->input('property_no'),
                    'house_no' => $request->input('house_no'),
                    'plot_no' => $request->input('plot_no'),
                    'landmark' => $request->input('landmark'),
                    'new_water_con' => $request->input('new_water_con'),
                    'current_connection_is_illegal' => $request->input('current_connection_is_illegal'),
                    'applicant_or_tenant' => $request->input('applicant_or_tenant'),
                    'criminal_judicial_issue' => $request->input('criminal_judicial_issue'),
                    'place_belongs_to_municipal' => $request->input('place_belongs_to_municipal'),
                    'comment' => $request->input('comment'),
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
