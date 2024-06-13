<?php

namespace App\Services\PropertyTax;

use App\Models\PropertyTax\TaxExemption;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class TaxExemptionService
{
    public function store($request)
    {
        DB::beginTransaction();

        try {
            $request['user_id'] = Auth::user()->id;
            TaxExemption::create($request->all());
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
        return TaxExemption::find($id);
    }

    public function update($request)
    {
        DB::beginTransaction();

        try {
            $taxExemption = TaxExemption::find($request->id);
            $taxExemption->update($request->all());

            DB::commit();

            return true;
        } catch (\Exception $e) {
            DB::roolback();
            Log::info($e);
            return false;
        }
    }
}
