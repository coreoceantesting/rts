<?php

namespace App\Http\Controllers\WaterSupplyDepartment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\WaterDepartment\IllegalWaterConnection\CreateRequest;
use App\Http\Requests\WaterDepartment\IllegalWaterConnection\UpdateRequest;
use App\Services\WaterDepartment\IllegalWaterConnectionService;
use App\Models\WaterDepartment\Illegalwaterconnection;

class IllegalWaterConnectionController extends Controller
{

    protected $illegalWaterConnectionService;

    public function __construct(IllegalWaterConnectionService $illegalWaterConnectionService)
    {
        $this->illegalWaterConnectionService = $illegalWaterConnectionService;
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
        return view('water-supply-department.illegal-water-connection.create');
    }

    /**
     * Store a newly created resource in storage.
     */
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
        $data = Illegalwaterconnection::findOrFail(decrypt($id));

        return view('water-supply-department.illegal-water-connection.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
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

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
