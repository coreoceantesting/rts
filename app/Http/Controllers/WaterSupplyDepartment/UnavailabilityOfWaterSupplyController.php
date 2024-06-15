<?php

namespace App\Http\Controllers\WaterSupplyDepartment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\WaterDepartment\UnavailabilitySupply\CreateRequest;
use App\Http\Requests\WaterDepartment\UnavailabilitySupply\UpdateRequest;
use App\Services\WaterDepartment\UnavailabilitySupply\UnavailabilitySupplyService;
use App\Models\WaterDepartment\WaterUnavailabilitySupply;

class UnavailabilityOfWaterSupplyController extends Controller
{
    protected $UnavailabilitySupplyService;

    public function __construct(UnavailabilitySupplyService $UnavailabilitySupplyService)
    {
        $this->UnavailabilitySupplyService = $UnavailabilitySupplyService;
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
        $UnavailabilitySupplyService = $this->UnavailabilitySupplyService->store($request);

        if ($UnavailabilitySupplyService) {
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
        $data = WaterUnavailabilitySupply::findOrFail($id);
        return view('WaterSupplyDepartment.UnAvalibalityWaterSupply.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id)
    {
        $UnavailabilitySupplyService = $this->UnavailabilitySupplyService->update($request, $id);

        if ($UnavailabilitySupplyService) {
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
