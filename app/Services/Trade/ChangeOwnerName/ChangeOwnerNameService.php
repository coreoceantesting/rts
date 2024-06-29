<?php

namespace App\Services\Trade\ChangeOwnerName;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use App\Models\Trade\TradeChangeOwnerName;

class ChangeOwnerNameService
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
                $no_dues_document = $request->no_dues_document->store('Trade/ChangeOwnerName');
            }

            if ($request->hasFile('application_document')) {
                $application_document = $request->application_document->store('Trade/ChangeOwnerName');
            }

            TradeChangeOwnerName::create([
                'user_id' => $user_id,
                'current_permission_no' => $request->input('current_permission_no'),
                'applicant_full_name' => $request->input('applicant_full_name'),
                'old_owner_name' => $request->input('old_owner_name'),
                'new_owner_name' => $request->input('new_owner_name'),
                'old_partner_name' => $request->input('old_partner_name'),
                'new_partner_name' => $request->input('new_partner_name'),
                'address' => $request->input('address'),
                'mobile_no' => $request->input('mobile_no'),
                'email_id' => $request->input('email_id'),
                'zone' => $request->input('zone'),
                'ward_area' => $request->input('ward_area'),
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
        return TradeChangeOwnerName::find($id);
    }

    public function update($request, $id)
    {
        DB::beginTransaction();

        try {

            // Find the existing record
            $tradeChangeOwnerName = TradeChangeOwnerName::findOrFail($id);

            // Handle file uploads and update original file names
            if ($request->hasFile('no_dues_document')) {
                if ($tradeChangeOwnerName && Storage::exists($tradeChangeOwnerName->no_dues_document)) {
                    Storage::delete($tradeChangeOwnerName->no_dues_document);
                }
                $tradeChangeOwnerName->no_dues_document = $request->no_dues_document->store('Trade/ChangeOwnerName');
            }

            if ($request->hasFile('application_document')) {
                if ($tradeChangeOwnerName && Storage::exists($tradeChangeOwnerName->application_document)) {
                    Storage::delete($tradeChangeOwnerName->application_document);
                }
                $tradeChangeOwnerName->application_document = $request->application_document->store('Trade/ChangeOwnerName');
            }


            $tradeChangeOwnerName->update([
                'current_permission_no' => $request->input('current_permission_no'),
                'applicant_full_name' => $request->input('applicant_full_name'),
                'old_owner_name' => $request->input('old_owner_name'),
                'new_owner_name' => $request->input('new_owner_name'),
                'old_partner_name' => $request->input('old_partner_name'),
                'new_partner_name' => $request->input('new_partner_name'),
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
