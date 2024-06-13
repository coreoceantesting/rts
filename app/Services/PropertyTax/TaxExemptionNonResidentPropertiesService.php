<?php

namespace App\Services\PropertyTax;

use App\Models\PropertyTax\TaxExemptionNonResidentProperties;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class TaxExemptionNonResidentPropertiesService
{
    public function store($request)
    {
        DB::beginTransaction();

        try {
            $request['user_id'] = Auth::user()->id;
            TaxExemptionNonResidentProperties::create($request->all());
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
        return TaxExemptionNonResidentProperties::find($id);
    }

    public function update($request)
    {
        DB::beginTransaction();

        try {
            $taxExemptionNonResidentProperties = TaxExemptionNonResidentProperties::find($request->id);
            $taxExemptionNonResidentProperties->update($request->all());

            DB::commit();

            return true;
        } catch (\Exception $e) {
            DB::roolback();
            Log::info($e);
            return false;
        }
    }
}
