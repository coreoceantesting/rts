<?php

namespace App\Http\Controllers\WaterSupplyDepartment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\WaterDepartment\ChangeConnectionSize\CreateRequest;
use App\Http\Requests\WaterDepartment\ChangeConnectionSize\UpdateRequest;
use App\Services\WaterDepartment\ChangeConnectionSizeService;
use App\Models\WaterDepartment\WaterChangeConnectionSize;
use App\Services\CommonService;

class ChangeWaterConnectionSizeController extends Controller
{
    protected $changeConnectionSizeService;
    protected $commonService;

    public function __construct(ChangeConnectionSizeService $changeConnectionSizeService, CommonService $commonService)
    {
        $this->changeConnectionSizeService = $changeConnectionSizeService;
        $this->commonService = $commonService;
    }

    public function create()
    {
        $wards = $this->commonService->getActiveWard();

        $zones = $this->commonService->getActiveZone();

        return view('water-supply-department.change-water-connection-size.create')->with([
            'wards' => $wards,
            'zones' => $zones,
        ]);
    }

    public function store(CreateRequest $request)
    {
        $changeConnectionSizeService = $this->changeConnectionSizeService->store($request);

        if ($changeConnectionSizeService[0]) {
            return response()->json([
                'success' => 'Detail Stored successfully'
            ]);
        } else {
            return response()->json([
                'error' => $changeConnectionSizeService[1]
            ]);
        }
    }

    public function edit(string $id)
    {
        $data = WaterChangeConnectionSize::findOrFail(decrypt($id));

        $wards = $this->commonService->getActiveWard();

        $zones = $this->commonService->getActiveZone();

        return view('water-supply-department.change-water-connection-size.edit')->with([
            'data' => $data,
            'wards' => $wards,
            'zones' => $zones,
        ]);
    }

    public function update(UpdateRequest $request, string $id)
    {
        $changeConnectionSizeService = $this->changeConnectionSizeService->update($request, $id);

        if ($changeConnectionSizeService[0]) {
            return response()->json([
                'success' => 'Detail updated successfully'
            ]);
        } else {
            return response()->json([
                'error' => $changeConnectionSizeService[1]
            ]);
        }
    }
}
