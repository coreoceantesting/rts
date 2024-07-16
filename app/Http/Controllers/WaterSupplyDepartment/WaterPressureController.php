<?php

namespace App\Http\Controllers\WaterSupplyDepartment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\WaterDepartment\WaterPressure\CreateRequest;
use App\Http\Requests\WaterDepartment\WaterPressure\UpdateRequest;
use App\Services\WaterDepartment\WaterPressure\WaterPressureService;
use App\Models\WaterDepartment\WaterPressureComplaint;

class WaterPressureController extends Controller
{
    protected $WaterPressureService;

    public function __construct(WaterPressureService $WaterPressureService)
    {
        $this->WaterPressureService = $WaterPressureService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('WaterSupplyDepartment.WaterPressure.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateRequest $request)
    {
        $WaterPressureService = $this->WaterPressureService->store($request);

        if ($WaterPressureService) {
            return response()->json([
                'success' => 'Detail Stored successfully'
            ]);
        } else {
            return response()->json([
                'error' => 'Something went wrong, please try again'
            ]);
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
    public function edit(string $id)
    {
        $data = WaterPressureComplaint::findOrFail(decrypt($id));

        return view('WaterSupplyDepartment.WaterPressure.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id)
    {
        $WaterPressureService = $this->WaterPressureService->update($request, $id);

        if ($WaterPressureService) {
            return response()->json([
                'success' => 'Detail updated successfully'
            ]);
        } else {
            return response()->json([
                'error' => 'Something went wrong, please try again'
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
