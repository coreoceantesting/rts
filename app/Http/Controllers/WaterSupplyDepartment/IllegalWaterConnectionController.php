<?php

namespace App\Http\Controllers\WaterSupplyDepartment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\WaterDepartment\IllegalWaterConnection\CreateRequest;
use App\Http\Requests\WaterDepartment\IllegalWaterConnection\UpdateRequest;
use App\Services\WaterDepartment\IllegalWaterConnectionService;
use App\Models\WaterDepartment\Illegalwaterconnection;
use App\Services\CommonService;

class IllegalWaterConnectionController extends Controller
{
    protected $illegalWaterConnectionService;
    protected $commonService;

    public function __construct(IllegalWaterConnectionService $illegalWaterConnectionService, CommonService $commonService)
    {
        $this->illegalWaterConnectionService = $illegalWaterConnectionService;
        $this->commonService = $commonService;
    }

    public function create()
    {
        $wards = $this->commonService->getActiveWard();

        $zones = $this->commonService->getActiveZone();

        return view('water-supply-department.illegal-water-connection.create')->with([
            'wards' => $wards,
            'zones' => $zones,
        ]);
    }

    public function store(CreateRequest $request)
    {
        $illegalWaterConnectionService = $this->illegalWaterConnectionService->store($request);

        if ($illegalWaterConnectionService) {
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
        $data = Illegalwaterconnection::findOrFail(decrypt($id));

        $wards = $this->commonService->getActiveWard();

        $zones = $this->commonService->getActiveZone();

        return view('water-supply-department.illegal-water-connection.edit')->with([
            'data' => $data,
            'wards' => $wards,
            'zones' => $zones,
        ]);
    }

    public function update(UpdateRequest $request, string $id)
    {
        $illegalWaterConnectionService = $this->illegalWaterConnectionService->update($request, $id);

        if ($illegalWaterConnectionService) {
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
