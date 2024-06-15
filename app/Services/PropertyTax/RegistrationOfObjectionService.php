<?php

namespace App\Services\PropertyTax;

use App\Models\PropertyTax\RegistrationOfObjection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class RegistrationOfObjectionService
{
    public function store($request)
    {
        DB::beginTransaction();

        try {
            $request['user_id'] = Auth::user()->id;
            if ($request->hasFile('uploaded_applications')) {
                $request['uploaded_application'] = $request->uploaded_applications->store('propertyTax/reg-of-obj');
            }
            if ($request->hasFile('no_dues_documents')) {
                $request['no_dues_document'] = $request->no_dues_documents->store('propertyTax/reg-of-obj');
            }

            RegistrationOfObjection::create($request->all());
            DB::commit();

            return true;
        } catch (\Exception $e) {
            DB::roolback();
            Log::info($e);
            return false;
        }
    }

    public function edit($id)
    {
        return RegistrationOfObjection::find($id);
    }

    public function update($request)
    {
        DB::beginTransaction();

        try {
            $registrationOfObjection = RegistrationOfObjection::find($request->id);
            if ($request->hasFile('uploaded_applications')) {
                if ($registrationOfObjection && Storage::exists($registrationOfObjection->uploaded_application)) {
                    Storage::delete($registrationOfObjection->uploaded_application);
                }
                $request['uploaded_application'] = $request->uploaded_applications->store('propertyTax/reg-of-obj');
            }
            if ($request->hasFile('no_dues_documents')) {
                if ($registrationOfObjection && Storage::exists($registrationOfObjection->no_dues_document)) {
                    Storage::delete($registrationOfObjection->no_dues_document);
                }
                $request['no_dues_document'] = $request->no_dues_documents->store('propertyTax/reg-of-obj');
            }
            $registrationOfObjection->update($request->all());

            DB::commit();

            return true;
        } catch (\Exception $e) {
            DB::roolback();
            Log::info($e);
            return false;
        }
    }
}
