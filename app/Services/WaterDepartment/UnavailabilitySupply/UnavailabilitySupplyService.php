<?php

namespace App\Services\WaterDepartment\UnavailabilitySupply;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use App\Models\WaterDepartment\WaterUnavailabilitySupply;

class UnavailabilitySupplyService
{
    public function store($request)
    {
        DB::beginTransaction();

        try {
            $request['user_id'] = Auth::user()->id;
            WaterUnavailabilitySupply::create($request->all());

            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollback();
            Log::error('Error in store method: ' . $e->getMessage());
            return false;
        }
    }


    public function edit($id)
    {
        return WaterUnavailabilitySupply::find($id);
    }

    public function update($request, $id)
    {
        DB::beginTransaction();

        try {
            // Find the existing record
            $waterUnavailabilitySupply = WaterUnavailabilitySupply::findOrFail($id);

            $waterUnavailabilitySupply->update($request->all());

            // Commit the transaction
            DB::commit();

            return true;
        } catch (\Exception $e) {
            DB::rollback();
            Log::info($e);
            return false;
        }
    }
}
