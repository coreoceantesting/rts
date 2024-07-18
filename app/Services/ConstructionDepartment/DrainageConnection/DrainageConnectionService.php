<?php

namespace App\Services\ConstructionDepartment\DrainageConnection;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use App\Models\ConstructionDepartment\ConstructionDrainageConnection;

class DrainageConnectionService
{
    public function store($request)
    {
        DB::beginTransaction();

        try {
            $request['user_id'] = Auth::user()->id;
            // Handle file uploads and store original file names
            if ($request->hasFile('upload_prescribed_formats')) {
                $request['upload_prescribed_format'] = $request->upload_prescribed_formats->store('construction-department/drainage-connection');
            }

            if ($request->hasFile('upload_no_dues_certificates')) {
                $request['upload_no_dues_certificate'] = $request->upload_no_dues_certificates->store('construction-department/drainage-connection');
            }

            if ($request->hasFile('upload_property_ownerships')) {
                $request['upload_property_ownership'] = $request->upload_property_ownerships->store('construction-department/drainage-connection');
            }

            ConstructionDrainageConnection::create($request->all());

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
        return ConstructionDrainageConnection::find($id);
    }

    public function update($request, $id)
    {
        DB::beginTransaction();

        try {

            // Find the existing record
            $constructionDrainageConnection = ConstructionDrainageConnection::findOrFail($id);

            // Handle file uploads and update original file names
            if ($request->hasFile('upload_prescribed_formats')) {
                if ($constructionDrainageConnection && Storage::exists($constructionDrainageConnection->upload_prescribed_format)) {
                    Storage::delete($constructionDrainageConnection->upload_prescribed_format);
                }
                $request['upload_prescribed_format'] = $request->upload_prescribed_formats->store('construction-department/drainage-connection');
            }

            if ($request->hasFile('upload_no_dues_certificates')) {
                if ($constructionDrainageConnection && Storage::exists($constructionDrainageConnection->upload_no_dues_certificate)) {
                    Storage::delete($constructionDrainageConnection->upload_no_dues_certificate);
                }
                $request['upload_no_dues_certificate'] = $request->upload_no_dues_certificates->store('construction-department/drainage-connection');
            }

            if ($request->hasFile('upload_property_ownerships')) {
                if ($constructionDrainageConnection && Storage::exists($constructionDrainageConnection->upload_property_ownership)) {
                    Storage::delete($constructionDrainageConnection->upload_property_ownership);
                }
                $request['upload_property_ownership'] = $request->upload_property_ownerships->store('construction-department/drainage-connection');
            }

            $constructionDrainageConnection->update($request->all());

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
