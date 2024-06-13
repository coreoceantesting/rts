<?php

namespace App\Services\PropertyTax;

use App\Models\PropertyTax\Newtaxation;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class NewtaxationService
{
    public function store($request)
    {
        DB::beginTransaction();

        try {
            $request['user_id'] = Auth::user()->id;
            Newtaxation::create($request->all());
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
        return Newtaxation::find($id);
    }

    public function update($request)
    {
        DB::beginTransaction();

        try {
            $newTaxation = Newtaxation::find($request->id);
            $newTaxation->update($request->all());

            DB::commit();

            return true;
        } catch (\Exception $e) {
            DB::roolback();
            Log::info($e);
            return false;
        }
    }
}
