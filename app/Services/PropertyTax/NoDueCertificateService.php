<?php

namespace App\Services\PropertyTax;

use App\Models\PropertyTax\NoDueCertificate;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class NoDueCertificateService
{
    public function store($request)
    {
        DB::beginTransaction();

        try {
            $request['user_id'] = Auth::user()->id;
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
