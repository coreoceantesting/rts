<?php

namespace App\Http\Controllers\WaterSupplyDepartment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\WaterDepartment\NewWaterConnection\CreateNewConnectionRequest;
use App\Http\Requests\WaterDepartment\NewWaterConnection\UpdateNewConnectionRequest;
use App\Services\WaterDepartment\NewWaterConnectionService;
use App\Models\WaterDepartment\Waternewconnection;
use App\Services\CommonService;

class NewWaterConnectionController extends Controller
{
    protected $newWaterConnectionService;
    protected $commonService;

    public function __construct(NewWaterConnectionService $newWaterConnectionService, CommonService $commonService)
    {
        $this->newWaterConnectionService = $newWaterConnectionService;
        $this->commonService = $commonService;
    }

    public function create()
    {
        $wards = $this->commonService->getActiveWard();

        $zones = $this->commonService->getActiveZone();

        return view('water-supply-department.new-water-connection.create')->with([
            'wards' => $wards,
            'zones' => $zones,
        ]);
    }

    public function store(CreateNewConnectionRequest $request)
    {
        $newWaterConnectionService = $this->newWaterConnectionService->store($request);

        if ($newWaterConnectionService[0]) {
            return response()->json([
                'success' => 'Detail Stored successfully'
            ]);
        } else {
            return response()->json([
                'error' => $newWaterConnectionService[1]
            ]);
        }
    }

    public function edit(string $id)
    {
        $data = Waternewconnection::findOrFail(decrypt($id));

        $wards = $this->commonService->getActiveWard();

        $zones = $this->commonService->getActiveZone();

        return view('water-supply-department.new-water-connection.edit')->with([
            'data' => $data,
            'wards' => $wards,
            'zones' => $zones,
        ]);
    }

    public function update(UpdateNewConnectionRequest $request, string $id)
    {
        $newWaterConnectionService = $this->newWaterConnectionService->update($request, $id);

        if ($newWaterConnectionService[0]) {
            return response()->json([
                'success' => 'Detail updated successfully'
            ]);
        } else {
            return response()->json([
                'error' => $newWaterConnectionService[1]
            ]);
        }
    }
}
