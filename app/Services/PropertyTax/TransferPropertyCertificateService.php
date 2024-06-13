<?php

namespace App\Services\PropertyTax;

use App\Models\PropertyTax\transferPropertyCertificate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class TransferPropertyCertificateService
{
    public function store($request)
    {
        DB::beginTransaction();

        try {
            $request['user_id'] = Auth::user()->id;
            transferPropertyCertificate::create($request->all());
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
            $transferPropertyCertificate = transferPropertyCertificate::find($request->id);
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
