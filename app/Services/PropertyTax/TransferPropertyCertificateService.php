<?php

namespace App\Services\PropertyTax;

use App\Models\PropertyTax\transferPropertyCertificate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class TransferPropertyCertificateService
{
    public function store($request)
    {
        DB::beginTransaction();

        try {
            $request['user_id'] = Auth::user()->id;

            if ($request->hasFile('uploaded_applications')) {
                $request['uploaded_application'] = $request->uploaded_applications->store('propertyTax/transfer-property');
            }

            if ($request->hasFile('certificate_of_no_duess')) {
                $request['certificate_of_no_dues'] = $request->certificate_of_no_duess->store('propertyTax/transfer-property');
            }

            if ($request->hasFile('copy_of_documents')) {
                $request['copy_of_document'] = $request->copy_of_documents->store('propertyTax/transfer-property');
            }

            TransferPropertyCertificate::create($request->all());
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
        return transferPropertyCertificate::find($id);
    }

    public function update($request)
    {
        DB::beginTransaction();

        try {
            $transferPropertyCertificate = TransferPropertyCertificate::find($request->id);
            if ($request->hasFile('uploaded_applications')) {
                if ($transferPropertyCertificate && Storage::exists($transferPropertyCertificate->uploaded_application)) {
                    Storage::delete($transferPropertyCertificate->uploaded_application);
                }
                $request['uploaded_application'] = $request->uploaded_applications->store('propertyTax/transfer-property');
            }

            if ($request->hasFile('certificate_of_no_duess')) {
                if ($transferPropertyCertificate && Storage::exists($transferPropertyCertificate->certificate_of_no_dues)) {
                    Storage::delete($transferPropertyCertificate->certificate_of_no_dues);
                }
                $request['certificate_of_no_dues'] = $request->certificate_of_no_duess->store('propertyTax/transfer-property');
            }

            if ($request->hasFile('copy_of_documents')) {
                if ($transferPropertyCertificate && Storage::exists($transferPropertyCertificate->copy_of_document)) {
                    Storage::delete($transferPropertyCertificate->copy_of_document);
                }
                $request['copy_of_document'] = $request->copy_of_documents->store('propertyTax/transfer-property');
            }

            $transferPropertyCertificate->update($request->all());

            DB::commit();

            return true;
        } catch (\Exception $e) {
            DB::roolback();
            Log::info($e);
            return false;
        }
    }
}
