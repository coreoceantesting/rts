<?php

namespace App\Services\PropertyTax;

use App\Models\PropertyTax\ReTaxation;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class ReTaxationService
{
    public function store($request)
    {
        DB::beginTransaction();

        try {
            $request['user_id'] = Auth::user()->id;
            if ($request->hasFile('uploaded_applications')) {
                $request['uploaded_application'] = $request->uploaded_applications->store('propertyTax/retaxation');
            }

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

            if ($request->hasFile('uploaded_applications')) {
                if ($reTaxation && Storage::exists($reTaxation->uploaded_application)) {
                    Storage::delete($reTaxation->uploaded_application);
                }
                $request['uploaded_application'] = $request->uploaded_applications->store('propertyTax/retaxation');
            }

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
