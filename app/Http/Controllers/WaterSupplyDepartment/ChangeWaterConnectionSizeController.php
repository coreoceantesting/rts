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

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateRequest $request)
    {
        $changeConnectionSizeService = $this->changeConnectionSizeService->store($request);

        if ($changeConnectionSizeService) {
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
        $data = WaterChangeConnectionSize::findOrFail(decrypt($id));

        $wards = $this->commonService->getActiveWard();

        $zones = $this->commonService->getActiveZone();

        return view('water-supply-department.change-water-connection-size.edit')->with([
            'data' => $data,
            'wards' => $wards,
            'zones' => $zones,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id)
    {
        $changeConnectionSizeService = $this->changeConnectionSizeService->update($request, $id);

        if ($changeConnectionSizeService) {
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
