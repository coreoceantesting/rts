<?php

namespace App\Http\Controllers\WaterSupplyDepartment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\WaterDepartment\WaterPressure\CreateRequest;
use App\Http\Requests\WaterDepartment\WaterPressure\UpdateRequest;
use App\Services\WaterDepartment\WaterPressureService;
use App\Models\WaterDepartment\WaterPressureComplaint;
use App\Services\CommonService;

class WaterPressureController extends Controller
{
    protected $waterPressureService;
    protected $commonService;

    public function __construct(WaterPressureService $waterPressureService, CommonService $commonService)
    {
        $this->waterPressureService = $waterPressureService;
        $this->commonService = $commonService;
    }

    public function create()
    {
        $wards = $this->commonService->getActiveWard();

        $zones = $this->commonService->getActiveZone();

        return view('water-supply-department.water-pressure.create')->with([
            'wards' => $wards,
            'zones' => $zones,
        ]);
    }

    public function store(CreateRequest $request)
    {
        $waterPressureService = $this->waterPressureService->store($request);

        if ($waterPressureService[0]) {
            return response()->json([
                'success' => 'Detail Stored successfully'
            ]);
        } else {
            return response()->json([
                'error' => $waterPressureService[1]
            ]);
        }
    }

    public function edit(string $id)
    {
        $data = WaterPressureComplaint::findOrFail(decrypt($id));

        $wards = $this->commonService->getActiveWard();

        $zones = $this->commonService->getActiveZone();

        return view('water-supply-department.water-pressure.edit')->with([
            'data' => $data,
            'wards' => $wards,
            'zones' => $zones,
        ]);
    }

    public function update(UpdateRequest $request, string $id)
    {
        $waterPressureService = $this->waterPressureService->update($request, $id);

        if ($waterPressureService[0]) {
            return response()->json([
                'success' => 'Detail updated successfully'
            ]);
        } else {
            return response()->json([
                'error' => $waterPressureService[1]
            ]);
        }
    }
}
