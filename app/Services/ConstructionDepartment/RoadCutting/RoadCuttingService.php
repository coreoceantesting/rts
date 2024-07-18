<?php

namespace App\Services\ConstructionDepartment\RoadCutting;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use App\Models\ConstructionDepartment\ConstructionRoadCutting;

class RoadCuttingService
{
    public function store($request)
    {
        DB::beginTransaction();

        try {
            $request['user_id'] = Auth::user()->id;
            // Handle file uploads and store original file names
            if ($request->hasFile('upload_prescribed_formats')) {
                $request['upload_prescribed_format'] = $request->upload_prescribed_formats->store('construction-department/road-cutting');
            }

            if ($request->hasFile('upload_no_dues_certificates')) {
                $request['upload_no_dues_certificate'] = $request->upload_no_dues_certificates->store('construction-department/road-cutting');
            }

            if ($request->hasFile('upload_gov_instructed_docs')) {
                $request['upload_gov_instructed_doc'] = $request->upload_gov_instructed_docs->store('construction-department/road-cutting');
            }

            ConstructionRoadCutting::create($request->all());

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
        return ConstructionRoadCutting::find($id);
    }

    public function update($request, $id)
    {
        DB::beginTransaction();

        try {

            // Find the existing record
            $constructionRoadCutting = ConstructionRoadCutting::findOrFail($id);

            // Handle file uploads and update original file names
            if ($request->hasFile('upload_prescribed_formats')) {
                if ($constructionRoadCutting && Storage::exists($constructionRoadCutting->upload_prescribed_format)) {
                    Storage::delete($constructionRoadCutting->upload_prescribed_format);
                }
                $request['upload_prescribed_format'] = $request->upload_prescribed_formats->store('construction-department/road-cutting');
            }

            if ($request->hasFile('upload_no_dues_certificates')) {
                if ($constructionRoadCutting && Storage::exists($constructionRoadCutting->upload_no_dues_certificate)) {
                    Storage::delete($constructionRoadCutting->upload_no_dues_certificate);
                }
                $request['upload_no_dues_certificate'] = $request->upload_no_dues_certificates->store('construction-department/road-cutting');
            }

            if ($request->hasFile('upload_gov_instructed_docs')) {
                if ($constructionRoadCutting && Storage::exists($constructionRoadCutting->upload_gov_instructed_doc)) {
                    Storage::delete($constructionRoadCutting->upload_gov_instructed_doc);
                }
                $request['upload_gov_instructed_doc'] = $request->upload_gov_instructed_docs->store('construction-department/road-cutting');
            }

            $constructionRoadCutting->update($request->all());

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
