<?php

namespace App\Services\Trade\ChangeOwnerCount;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use App\Models\Trade\TradeChangeOwnerCount;

class ChangeOwnerCountService
{
    public function store($request)
    {
        DB::beginTransaction();

        try {
            $user_id = Auth::user()->id;
            // Handle file uploads and store original file names
            $application_document = null;

            if ($request->hasFile('application_document')) {
                $filetwo = $request->file('application_document');
                $application_document = time() . '_' . $filetwo->getClientOriginalName();
                $filetwo->storeAs('public/Trade/ChangeOwnerCount', $application_document);
            }

            TradeChangeOwnerCount::create([
                'user_id' => $user_id,
                'current_permission_no' => $request->input('current_permission_no'),
                'applicant_full_name' => $request->input('applicant_full_name'),
                'old_partner_count' => $request->input('old_partner_count'),
                'new_partner_count' => $request->input('new_partner_count'),
                'address' => $request->input('address'),
                'mobile_no' => $request->input('mobile_no'),
                'email_id' => $request->input('email_id'),
                'zone' => $request->input('zone'),
                'ward_area' => $request->input('ward_area'),
                'remark' => $request->input('remark'),
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
        return TradeChangeOwnerCount::find($id);
    }

    public function update($request, $id)
    {
        DB::beginTransaction();

        try {

                // Find the existing record
                $TradeChangeOwnerCount = TradeChangeOwnerCount::findOrFail($id);

                // Handle file uploads and update original file names
                if ($request->hasFile('application_document')) {
                    $filetwo = $request->file('application_document');
                    $application_document = time() . '_' . $filetwo->getClientOriginalName();
                    $filetwo->storeAs('public/Trade/ChangeOwnerCount', $application_document);
                    $TradeChangeOwnerCount->application_document = $application_document;
                }
                

                $TradeChangeOwnerCount->update([
                    'current_permission_no' => $request->input('current_permission_no'),
                    'applicant_full_name' => $request->input('applicant_full_name'),
                    'old_partner_count' => $request->input('old_partner_count'),
                    'new_partner_count' => $request->input('new_partner_count'),
                    'address' => $request->input('address'),
                    'mobile_no' => $request->input('mobile_no'),
                    'email_id' => $request->input('email_id'),
                    'zone' => $request->input('zone'),
                    'ward_area' => $request->input('ward_area'),
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
