<?php

namespace App\Services\PropertyTax;

use App\Models\PropertyTax\Newtaxation;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class NewtaxationService
{
    public function store($request)
    {
        DB::beginTransaction();

        try {
            $request['user_id'] = Auth::user()->id;

            if ($request->hasFile('uploaded_applications')) {
                $request['uploaded_application'] = $request->uploaded_applications->store('propertyTax/new-taxation');
            }
            if ($request->hasFile('certificate_of_no_duess')) {
                $request['certificate_of_no_dues'] = $request->certificate_of_no_duess->store('propertyTax/new-taxation');
            }

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

            if ($request->hasFile('uploaded_applications')) {
                if ($newTaxation && Storage::exists($newTaxation->uploaded_application)) {
                    Storage::delete($newTaxation->uploaded_application);
                }
                $request['uploaded_application'] = $request->uploaded_applications->store('propertyTax/new-taxation');
            }

            if ($request->hasFile('certificate_of_no_duess')) {
                if ($newTaxation && Storage::exists($newTaxation->certificate_of_no_dues)) {
                    Storage::delete($newTaxation->certificate_of_no_dues);
                }
                $request['certificate_of_no_dues'] = $request->certificate_of_no_duess->store('propertyTax/new-taxation');
            }

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
