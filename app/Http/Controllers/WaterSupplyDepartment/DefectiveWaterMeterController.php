<?php

namespace App\Http\Controllers\WaterSupplyDepartment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\WaterDepartment\DefectiveWaterMeter\CreateRequest;
use App\Http\Requests\WaterDepartment\DefectiveWaterMeter\UpdateRequest;
use App\Services\WaterDepartment\DefectiveWaterMeterService;
use App\Models\WaterDepartment\WaterDefectiveMeter;
use App\Services\CommonService;

class DefectiveWaterMeterController extends Controller
{
    protected $defectiveWaterMeterService;
    protected $commonService;

    public function __construct(DefectiveWaterMeterService $defectiveWaterMeterService, CommonService $commonService)
    {
        $this->defectiveWaterMeterService = $defectiveWaterMeterService;
        $this->commonService = $commonService;
    }

    public function create()
    {
        $wards = $this->commonService->getActiveWard();

        $zones = $this->commonService->getActiveZone();

        return view('water-supply-department.defective-water-meter.create')->with([
            'wards' => $wards,
            'zones' => $zones,
        ]);
    }

    public function store(CreateRequest $request)
    {
        $defectiveWaterMeterService = $this->defectiveWaterMeterService->store($request);

        if ($defectiveWaterMeterService[0]) {
            return response()->json([
                'success' => 'Detail Stored successfully'
            ]);
        } else {
            return response()->json([
                'error' => $defectiveWaterMeterService[1]
            ]);
        }
    }

    public function edit(string $id)
    {
        $data = WaterDefectiveMeter::findOrFail(decrypt($id));

        $wards = $this->commonService->getActiveWard();

        $zones = $this->commonService->getActiveZone();

        return view('water-supply-department.defective-water-meter.edit')->with([
            'data' => $data,
            'wards' => $wards,
            'zones' => $zones,
        ]);
    }

    public function update(UpdateRequest $request, string $id)
    {
        $defectiveWaterMeterService = $this->defectiveWaterMeterService->update($request, $id);

        if ($defectiveWaterMeterService[0]) {
            return response()->json([
                'success' => 'Detail updated successfully'
            ]);
        } else {
            return response()->json([
                'error' => $defectiveWaterMeterService[1]
            ]);
        }
    }
}
