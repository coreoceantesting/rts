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
            $user_id = Auth::user()->id;

            WaterUnavailabilitySupply::create([
                'user_id' => $user_id,
                'applicant_name' => $request->input('applicant_name'),
                'email_id' => $request->input('email_id'),
                'mobile_no' => $request->input('mobile_no'),
                'address' => $request->input('address'),
                'police_station' => $request->input('police_station'),
                'name_of_commercail_establishment' => $request->input('name_of_commercail_establishment'),
                'zone' => $request->input('zone'),
                'ward_area' => $request->input('ward_area'),
                'address_of_com_establishment' => $request->input('address_of_com_establishment'),
                'no_of_working_person' => $request->input('no_of_working_person'),
                'per_day_water_demand' => $request->input('per_day_water_demand'),
                'other_info' => $request->input('other_info'),
            ]);

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
                $WaterUnavailabilitySupply = WaterUnavailabilitySupply::findOrFail($id);

                $WaterUnavailabilitySupply->update([
                    'applicant_name' => $request->input('applicant_name'),
                    'email_id' => $request->input('email_id'),
                    'mobile_no' => $request->input('mobile_no'),
                    'address' => $request->input('address'),
                    'police_station' => $request->input('police_station'),
                    'name_of_commercail_establishment' => $request->input('name_of_commercail_establishment'),
                    'zone' => $request->input('zone'),
                    'ward_area' => $request->input('ward_area'),
                    'address_of_com_establishment' => $request->input('address_of_com_establishment'),
                    'no_of_working_person' => $request->input('no_of_working_person'),
                    'per_day_water_demand' => $request->input('per_day_water_demand'),
                    'other_info' => $request->input('other_info'),
                ]);

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
