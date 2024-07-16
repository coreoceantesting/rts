<?php

namespace App\Http\Controllers\WaterSupplyDepartment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\WaterDepartment\DisconnectSupply\CreateRequest;
use App\Http\Requests\WaterDepartment\DisconnectSupply\UpdateRequest;
use App\Services\WaterDepartment\DisconnectSupply\DisconnectSupplyService;
use App\Models\WaterDepartment\WaterDisconnectSupply;

class DisconnectWaterSupplyController extends Controller
{
    protected $DisconnectSupplyService;

    public function __construct(DisconnectSupplyService $DisconnectSupplyService)
    {
        $this->DisconnectSupplyService = $DisconnectSupplyService;
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
        return view('WaterSupplyDepartment.DisconnectWaterSupply.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateRequest $request)
    {
        $DisconnectSupplyService = $this->DisconnectSupplyService->store($request);

        if ($DisconnectSupplyService) {
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
        $data = WaterDisconnectSupply::findOrFail(decrypt($id));

        return view('WaterSupplyDepartment.DisconnectWaterSupply.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id)
    {
        $DisconnectSupplyService = $this->DisconnectSupplyService->update($request, $id);

        if ($DisconnectSupplyService) {
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
