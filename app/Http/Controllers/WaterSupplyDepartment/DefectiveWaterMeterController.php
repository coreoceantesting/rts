<?php

namespace App\Http\Controllers\WaterSupplyDepartment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\WaterDepartment\DefectiveWaterMeter\CreateRequest;
use App\Http\Requests\WaterDepartment\DefectiveWaterMeter\UpdateRequest;
use App\Services\WaterDepartment\DefectiveWaterMeterService;
use App\Models\WaterDepartment\WaterDefectiveMeter;

class DefectiveWaterMeterController extends Controller
{
    protected $defectiveWaterMeterService;

    public function __construct(DefectiveWaterMeterService $defectiveWaterMeterService)
    {
        $this->defectiveWaterMeterService = $defectiveWaterMeterService;
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
        return view('water-supply-department.defective-water-meter.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateRequest $request)
    {
        $defectiveWaterMeterService = $this->defectiveWaterMeterService->store($request);

        if ($defectiveWaterMeterService) {
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

        return view('water-supply-department.defective-water-meter.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id)
    {
        $defectiveWaterMeterService = $this->defectiveWaterMeterService->update($request, $id);

        if ($defectiveWaterMeterService) {
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
