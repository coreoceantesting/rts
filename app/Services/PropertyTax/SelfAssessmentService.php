<?php

namespace App\Services\PropertyTax;

use App\Models\PropertyTax\SelfAssessment;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class SelfAssessmentService
{
    public function store($request)
    {
        DB::beginTransaction();

        try {
            $request['user_id'] = Auth::user()->id;

            if ($request->hasFile('uploaded_applications')) {
                $request['uploaded_application'] = $request->uploaded_applications->store('propertyTax/self-assessment');
            }

            SelfAssessment::create($request->all());
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
        return SelfAssessment::find($id);
    }

    public function update($request)
    {
        DB::beginTransaction();

        try {
            $selfAssessment = SelfAssessment::find($request->id);

            if ($request->hasFile('uploaded_applications')) {
                if ($selfAssessment && Storage::exists($selfAssessment->uploaded_application)) {
                    Storage::delete($selfAssessment->uploaded_application);
                }
                $request['uploaded_application'] = $request->uploaded_applications->store('propertyTax/self-assessment');
            }
            $selfAssessment->update($request->all());

            DB::commit();

            return true;
        } catch (\Exception $e) {
            DB::roolback();
            Log::info($e);
            return false;
        }
    }
}
