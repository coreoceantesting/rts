<?php

namespace App\Http\Controllers\WaterSupplyDepartment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\WaterDepartment\UnavailabilitySupply\CreateRequest;
use App\Http\Requests\WaterDepartment\UnavailabilitySupply\UpdateRequest;
use App\Services\WaterDepartment\UnavailabilitySupplyService;
use App\Models\WaterDepartment\WaterUnavailabilitySupply;

class UnavailabilityOfWaterSupplyController extends Controller
{
    protected $unavailabilitySupplyService;

    public function __construct(UnavailabilitySupplyService $unavailabilitySupplyService)
    {
        $this->unavailabilitySupplyService = $unavailabilitySupplyService;
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
        return view('WaterSupplyDepartment.UnAvalibalityWaterSupply.create');
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

        return view('WaterSupplyDepartment.UnAvalibalityWaterSupply.edit', compact('data'));
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
