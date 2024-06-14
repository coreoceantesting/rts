<?php

namespace App\Services\PropertyTax;

use App\Models\PropertyTax\NoDueCertificate;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class NoDueCertificateService
{
    public function store($request)
    {
        DB::beginTransaction();

        try {
            $request['user_id'] = Auth::user()->id;
            if ($request->hasFile('uploaded_applications')) {
                $request['uploaded_application'] = $request->uploaded_applications->store('propertyTax/no-due');
            }

            NoDueCertificate::create($request->all());
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
        return NoDueCertificate::find($id);
    }

    public function update($request)
    {
        DB::beginTransaction();

        try {
            $noDueCertificate = NoDueCertificate::find($request->id);

            if ($request->hasFile('uploaded_applications')) {
                if ($noDueCertificate && Storage::exists($noDueCertificate->uploaded_application)) {
                    Storage::delete($noDueCertificate->uploaded_application);
                }
                $request['uploaded_application'] = $request->uploaded_applications->store('propertyTax/no-due');
            }

            $noDueCertificate->update($request->all());

            DB::commit();

            return true;
        } catch (\Exception $e) {
            DB::roolback();
            Log::info($e);
            return false;
        }
    }
}
