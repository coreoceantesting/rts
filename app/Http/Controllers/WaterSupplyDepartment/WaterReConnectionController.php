<?php

namespace App\Http\Controllers\WaterSupplyDepartment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\WaterDepartment\Reconnection\CreateRequest;
use App\Http\Requests\WaterDepartment\Reconnection\UpdateRequest;
use App\Services\WaterDepartment\ReconnectionService;
use App\Models\WaterDepartment\WaterReconnection;

class WaterReConnectionController extends Controller
{
    protected $reconnectionService;

    public function __construct(ReconnectionService $reconnectionService)
    {
        $this->reconnectionService = $reconnectionService;
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
        return view('water-supply-department.water-reconnection.create');
    }

    /**
     * Store a newly created resource in storage.
     */
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

        return view('water-supply-department.water-reconnection.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
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

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
