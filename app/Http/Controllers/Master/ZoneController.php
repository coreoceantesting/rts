<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\Masters\StoreWardRequest;
use App\Http\Requests\Admin\Masters\UpdateWardRequest;
use App\Models\Zone;
use Illuminate\Support\Facades\DB;

class ZoneController extends Controller
{
    public function index()
    {
        $zones = Zone::latest()->get();

        return view('master.zone')->with(['zones' => $zones]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreWardRequest $request)
    {
        try {
            DB::beginTransaction();
            Zone::create($request->all());
            DB::commit();

            return response()->json(['success' => 'Zone created successfully!']);
        } catch (\Exception $e) {
            return $this->respondWithAjax($e, 'creating', 'Zone');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Zone $zone)
    {
        if ($zone) {
            $response = [
                'result' => 1,
                'zone' => $zone,
            ];
        } else {
            $response = ['result' => 0];
        }
        return $response;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateWardRequest $request, Zone $zone)
    {
        try {
            DB::beginTransaction();
            $zone->update($request->all());
            DB::commit();

            return response()->json(['success' => 'Zone updated successfully!']);
        } catch (\Exception $e) {
            return $this->respondWithAjax($e, 'updating', 'Zone');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Zone $zone)
    {
        try {
            DB::beginTransaction();
            $zone->delete();
            DB::commit();

            return response()->json(['success' => 'Zone deleted successfully!']);
        } catch (\Exception $e) {
            return $this->respondWithAjax($e, 'deleting', 'Zone');
        }
    }
}
