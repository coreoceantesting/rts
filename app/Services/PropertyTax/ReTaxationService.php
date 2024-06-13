<?php

namespace App\Services\PropertyTax;

use App\Models\PropertyTax\ReTaxation;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class ReTaxationService
{
    public function store($request)
    {
        DB::beginTransaction();

        try {
            $request['user_id'] = Auth::user()->id;
            ReTaxation::create($request->all());
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
        return ReTaxation::find($id);
    }

    public function update($request)
    {
        DB::beginTransaction();

        try {
            $reTaxation = ReTaxation::find($request->id);
            $reTaxation->update($request->all());

            DB::commit();

            return true;
        } catch (\Exception $e) {
            DB::roolback();
            Log::info($e);
            return false;
        }
    }
}
