<?php

namespace App\Services\PropertyTax;

use App\Models\PropertyTax\TaxDemand;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class TaxDemandService
{
    public function store($request)
    {
        DB::beginTransaction();

        try {
            $request['user_id'] = Auth::user()->id;
            TaxDemand::create($request->all());
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
        return TaxDemand::find($id);
    }

    public function update($request)
    {
        DB::beginTransaction();

        try {
            $taxDemand = TaxDemand::find($request->id);
            $taxDemand->update($request->all());

            DB::commit();

            return true;
        } catch (\Exception $e) {
            DB::roolback();
            Log::info($e);
            return false;
        }
    }
}
