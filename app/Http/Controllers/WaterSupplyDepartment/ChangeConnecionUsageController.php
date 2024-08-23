<?php

namespace App\Http\Controllers\WaterSupplyDepartment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\WaterDepartment\ChangeInUse\CreateRequest;
use App\Http\Requests\WaterDepartment\ChangeInUse\UpdateRequest;
use App\Services\WaterDepartment\ChangeInUseService;
use App\Services\CommonService;

class ChangeConnecionUsageController extends Controller
{
    protected $changeInUseService;
    protected $commonService;

    public function __construct(ChangeInUseService $changeInUseService, CommonService $commonService)
    {
        $this->changeInUseService = $changeInUseService;
        $this->commonService = $commonService;
    }

    public function create()
    {
        $wards = $this->commonService->getActiveWard();

        $zones = $this->commonService->getActiveZone();

        return view('water-supply-department.change-connection-usage.create')->with([
            'wards' => $wards,
            'zones' => $zones,
        ]);
    }

    public function store(CreateRequest $request)
    {
        $changeInUseService = $this->changeInUseService->store($request);

        if ($changeInUseService) {
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
        $data = $this->changeInUseService->edit(decrypt($id));

        $wards = $this->commonService->getActiveWard();

        $zones = $this->commonService->getActiveZone();

        return view('water-supply-department.change-connection-usage.edit')->with([
            'data' => $data,
            'wards' => $wards,
            'zones' => $zones,
        ]);
    }

    public function update(UpdateRequest $request, string $id)
    {
        $changeInUseService = $this->changeInUseService->update($request, $id);

        if ($changeInUseService) {
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
