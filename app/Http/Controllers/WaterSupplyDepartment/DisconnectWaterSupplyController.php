<?php

namespace App\Http\Controllers\WaterSupplyDepartment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\WaterDepartment\DisconnectSupply\CreateRequest;
use App\Http\Requests\WaterDepartment\DisconnectSupply\UpdateRequest;
use App\Services\WaterDepartment\DisconnectSupplyService;
use App\Models\WaterDepartment\WaterDisconnectSupply;
use App\Services\CommonService;

class DisconnectWaterSupplyController extends Controller
{
    protected $disconnectSupplyService;
    protected $commonService;

    public function __construct(DisconnectSupplyService $disconnectSupplyService, CommonService $commonService)
    {
        $this->disconnectSupplyService = $disconnectSupplyService;
        $this->commonService = $commonService;
    }

    public function create()
    {
        $wards = $this->commonService->getActiveWard();

        $zones = $this->commonService->getActiveZone();

        return view('water-supply-department.disconnect-water-supply.create')->with([
            'wards' => $wards,
            'zones' => $zones,
        ]);
    }

    public function store(CreateRequest $request)
    {
        $disconnectSupplyService = $this->disconnectSupplyService->store($request);

        if ($disconnectSupplyService) {
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
        $data = WaterDisconnectSupply::findOrFail(decrypt($id));

        $wards = $this->commonService->getActiveWard();

        $zones = $this->commonService->getActiveZone();

        return view('water-supply-department.disconnect-water-supply.edit')->with([
            'data' => $data,
            'wards' => $wards,
            'zones' => $zones,
        ]);
    }

    public function update(UpdateRequest $request, string $id)
    {
        $disconnectSupplyService = $this->disconnectSupplyService->update($request, $id);

        if ($disconnectSupplyService) {
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
