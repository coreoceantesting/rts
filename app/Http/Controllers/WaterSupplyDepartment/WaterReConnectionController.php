<?php

namespace App\Http\Controllers\WaterSupplyDepartment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\WaterDepartment\Reconnection\CreateRequest;
use App\Http\Requests\WaterDepartment\Reconnection\UpdateRequest;
use App\Services\WaterDepartment\Reconnection\ReconnectionService;
use App\Models\WaterDepartment\WaterReconnection;

class WaterReConnectionController extends Controller
{
    protected $ReconnectionService;

    public function __construct(ReconnectionService $ReconnectionService)
    {
        $this->ReconnectionService = $ReconnectionService;
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
        return view('WaterSupplyDepartment.WaterReconnection.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateRequest $request)
    {
        $ReconnectionService = $this->ReconnectionService->store($request);

        if ($ReconnectionService) {
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
        $data = WaterReconnection::findOrFail(decrypt($id));

        return view('WaterSupplyDepartment.WaterReconnection.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id)
    {
        $ReconnectionService = $this->ReconnectionService->update($request, $id);

        if ($ReconnectionService) {
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
