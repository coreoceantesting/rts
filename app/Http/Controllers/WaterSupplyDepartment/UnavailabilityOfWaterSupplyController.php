<?php

namespace App\Http\Controllers\WaterSupplyDepartment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\WaterDepartment\UnavailabilitySupply\CreateRequest;
use App\Http\Requests\WaterDepartment\UnavailabilitySupply\UpdateRequest;
use App\Services\WaterDepartment\UnavailabilitySupplyService;
use App\Models\WaterDepartment\WaterUnavailabilitySupply;
use App\Services\CommonService;

class UnavailabilityOfWaterSupplyController extends Controller
{
    protected $unavailabilitySupplyService;
    protected $commonService;

    public function __construct(UnavailabilitySupplyService $unavailabilitySupplyService, CommonService $commonService)
    {
        $this->unavailabilitySupplyService = $unavailabilitySupplyService;
        $this->commonService = $commonService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $wards = $this->commonService->getActiveWard();

        $zones = $this->commonService->getActiveZone();

        return view('water-supply-department.unavalibality-water-supply.create')->with([
            'wards' => $wards,
            'zones' => $zones,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateRequest $request)
    {
        $unavailabilitySupplyService = $this->unavailabilitySupplyService->store($request);

        if ($unavailabilitySupplyService) {
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
        $data = WaterUnavailabilitySupply::findOrFail(decrypt($id));

        $wards = $this->commonService->getActiveWard();

        $zones = $this->commonService->getActiveZone();

        return view('water-supply-department.unavalibality-water-supply.edit')->with([
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
        $unavailabilitySupplyService = $this->unavailabilitySupplyService->update($request, $id);

        if ($unavailabilitySupplyService) {
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
