<?php

namespace App\Services\PropertyTax;

use App\Models\PropertyTax\PropertyTaxAssessment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class PropertyTaxAssessmentService
{
    public function store($request)
    {
        DB::beginTransaction();

        try {
            $request['user_id'] = Auth::user()->id;

            if ($request->hasFile('uploaded_applications')) {
                $request['uploaded_application'] = $request->uploaded_applications->store('propertyTax');
            }

            if ($request->hasFile('certificate_of_no_duess')) {
                $request['certificate_of_no_dues'] = $request->certificate_of_no_duess->store('propertyTax');
            }

            PropertyTaxAssessment::create($request->all());
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
        return PropertyTaxAssessment::find($id);
    }

    public function update($request)
    {
        DB::beginTransaction();

        try {
            $propertyTax = PropertyTaxAssessment::find($request->id);

            if ($request->hasFile('uploaded_applications')) {
                if ($propertyTax && Storage::exists($propertyTax->uploaded_application)) {
                    Storage::delete($propertyTax->uploaded_application);
                }
                $request['uploaded_application'] = $request->uploaded_applications->store('propertyTax');
            }

            if ($request->hasFile('certificate_of_no_duess')) {
                if ($propertyTax && Storage::exists($propertyTax->certificate_of_no_dues)) {
                    Storage::delete($propertyTax->certificate_of_no_dues);
                }
                $request['certificate_of_no_dues'] = $request->certificate_of_no_duess->store('propertyTax');
            }

            $propertyTax->update($request->all());

            DB::commit();

            return true;
        } catch (\Exception $e) {
            DB::roolback();
            Log::info($e);
            return false;
        }
    }
}
