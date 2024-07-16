<?php

namespace App\Http\Controllers\WaterSupplyDepartment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\WaterDepartment\DefectiveWaterMeter\CreateRequest;
use App\Http\Requests\WaterDepartment\DefectiveWaterMeter\UpdateRequest;
use App\Services\WaterDepartment\DefectiveWaterMeter\DefectiveWaterMeterService;
use App\Models\WaterDepartment\WaterDefectiveMeter;

class DefectiveWaterMeterController extends Controller
{
    protected $DefectiveWaterMeterService;

    public function __construct(DefectiveWaterMeterService $DefectiveWaterMeterService)
    {
        $this->DefectiveWaterMeterService = $DefectiveWaterMeterService;
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
        return view('WaterSupplyDepartment.DefectiveWaterMeter.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateRequest $request)
    {
        $DefectiveWaterMeterService = $this->DefectiveWaterMeterService->store($request);

        if ($DefectiveWaterMeterService) {
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
        $data = WaterDefectiveMeter::findOrFail(decrypt($id));

        return view('WaterSupplyDepartment.DefectiveWaterMeter.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id)
    {
        $DefectiveWaterMeterService = $this->DefectiveWaterMeterService->update($request, $id);

        if ($DefectiveWaterMeterService) {
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
