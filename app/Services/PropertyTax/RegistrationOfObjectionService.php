<?php

namespace App\Services\PropertyTax;

use App\Models\PropertyTax\RegistrationOfObjection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class RegistrationOfObjectionService
{
    public function store($request)
    {
        DB::beginTransaction();

        try {
            $request['user_id'] = Auth::user()->id;
            RegistrationOfObjection::create($request->all());
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
        return RegistrationOfObjection::find($id);
    }

    public function update($request)
    {
        DB::beginTransaction();

        try {
            $registrationOfObjection = RegistrationOfObjection::find($request->id);
            $registrationOfObjection->update($request->all());

            DB::commit();

            return true;
        } catch (\Exception $e) {
            DB::roolback();
            Log::info($e);
            return false;
        }
    }
}
