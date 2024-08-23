<?php

namespace App\Http\Controllers\WaterSupplyDepartment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\WaterDepartment\WaterQuality\CreateRequest;
use App\Http\Requests\WaterDepartment\WaterQuality\UpdateRequest;
use App\Services\WaterDepartment\WaterQualityService;
use App\Models\WaterDepartment\WaterQualityComplaint;
use App\Services\CommonService;

class WaterQualityComplaintController extends Controller
{
    protected $waterQualityService;
    protected $commonService;

    public function __construct(WaterQualityService $waterQualityService, CommonService $commonService)
    {
        $this->waterQualityService = $waterQualityService;
        $this->commonService = $commonService;
    }

    public function create()
    {
        $wards = $this->commonService->getActiveWard();

        $zones = $this->commonService->getActiveZone();

        return view('water-supply-department.water-quality-complaints.create')->with([
            'wards' => $wards,
            'zones' => $zones,
        ]);
    }

    public function store(CreateRequest $request)
    {
        $waterQualityService = $this->waterQualityService->store($request);

        if ($waterQualityService) {
            return response()->json([
                'success' => 'Detail Stored successfully'
            ]);
        } else {
            return response()->json([
                'error' => 'Something went wrong, please try again'
            ]);
        }
    }

    public function edit(string $id)
    {
        $data = WaterQualityComplaint::findOrFail(decrypt($id));

        $wards = $this->commonService->getActiveWard();

        $zones = $this->commonService->getActiveZone();

        return view('water-supply-department.water-quality-complaints.edit')->with([
            'data' => $data,
            'wards' => $wards,
            'zones' => $zones,
        ]);
    }

    public function update(UpdateRequest $request, string $id)
    {
        $waterQualityService = $this->waterQualityService->update($request, $id);

        if ($waterQualityService) {
            return response()->json([
                'success' => 'Detail updated successfully'
            ]);
        } else {
            return response()->json([
                'error' => 'Something went wrong, please try again'
            ]);
        }
    }
}
