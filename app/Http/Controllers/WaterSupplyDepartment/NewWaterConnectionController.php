<?php

namespace App\Http\Controllers\WaterSupplyDepartment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\WaterDepartment\NewWaterConnection\CreateNewConnectionRequest;
use App\Http\Requests\WaterDepartment\NewWaterConnection\UpdateNewConnectionRequest;
use App\Services\WaterDepartment\NewWaterConnection\NewWaterConnectionService;
use App\Models\WaterDepartment\Waternewconnection;

class NewWaterConnectionController extends Controller
{

    protected $NewWaterConnectionService;

    public function __construct(NewWaterConnectionService $NewWaterConnectionService)
    {
        $this->NewWaterConnectionService = $NewWaterConnectionService;
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
        return view('WaterSupplyDepartment.NewWaterConnection.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateNewConnectionRequest $request)
    {
        $NewWaterConnectionService = $this->NewWaterConnectionService->store($request);

        if ($NewWaterConnectionService) {
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
        $data = Waternewconnection::findOrFail(decrypt($id));

        return view('WaterSupplyDepartment.NewWaterConnection.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateNewConnectionRequest $request, string $id)
    {
        $NewWaterConnectionService = $this->NewWaterConnectionService->update($request, $id);

        if ($NewWaterConnectionService) {
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
