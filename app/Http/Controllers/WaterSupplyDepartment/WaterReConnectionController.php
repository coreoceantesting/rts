<?php

namespace App\Http\Controllers\WaterSupplyDepartment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\WaterDepartment\Reconnection\CreateRequest;
use App\Http\Requests\WaterDepartment\Reconnection\UpdateRequest;
use App\Services\WaterDepartment\ReconnectionService;
use App\Models\WaterDepartment\WaterReconnection;
use App\Services\CommonService;

class WaterReConnectionController extends Controller
{
    protected $reconnectionService;
    protected $commonService;

    public function __construct(ReconnectionService $reconnectionService, CommonService $commonService)
    {
        $this->reconnectionService = $reconnectionService;
        $this->commonService = $commonService;
    }

    public function create()
    {
        $wards = $this->commonService->getActiveWard();

        $zones = $this->commonService->getActiveZone();

        return view('water-supply-department.water-reconnection.create')->with([
            'wards' => $wards,
            'zones' => $zones,
        ]);
    }

    public function store(CreateRequest $request)
    {
        $reconnectionService = $this->reconnectionService->store($request);

        if ($reconnectionService) {
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
        $data = WaterReconnection::findOrFail(decrypt($id));

        $wards = $this->commonService->getActiveWard();

        $zones = $this->commonService->getActiveZone();

        return view('water-supply-department.water-reconnection.edit')->with([
            'data' => $data,
            'wards' => $wards,
            'zones' => $zones,
        ]);
    }

    public function update(UpdateRequest $request, string $id)
    {
        $reconnectionService = $this->reconnectionService->update($request, $id);

        if ($reconnectionService) {
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
