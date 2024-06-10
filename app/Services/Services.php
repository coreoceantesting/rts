<?php

namespace App\Services;

use App\Models\Service;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class Services
{
    public function index()
    {
        return Service::get();
    }

    public function store($request)
    {
        DB::beginTransaction();
        try {
            if ($request->hasFile('images')) {
                $request['image'] = $request->images->store('service');
            }

            Service::create($request->all());

            DB::commit();

            return true;
        } catch (\Exception $e) {
            DB::rollback();

            Log::info($e);

            return false;
        }
    }

    public function edit($id)
    {
        return Service::find($id);
    }

    public function update($request)
    {
        DB::beginTransaction();
        try {
            $service = Service::find($request->edit_model_id);

            if (isset($request->images)) {
                if ($service && Storage::exists($service->image)) {
                    Storage::delete($service->image);
                }
                $request['image'] = $request->images->store('service');
            }

            $service->update($request->all());

            DB::commit();

            return true;
        } catch (\Exception $e) {
            DB::rollback();

            Log::info($e);

            return false;
        }
    }
}
