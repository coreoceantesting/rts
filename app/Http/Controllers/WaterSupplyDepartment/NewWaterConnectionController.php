<?php

namespace App\Http\Controllers\WaterSupplyDepartment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\WaterDepartment\NewWaterConnection\CreateNewConnectionRequest;
use App\Http\Requests\WaterDepartment\NewWaterConnection\UpdateNewConnectionRequest;
use App\Services\WaterDepartment\NewWaterConnectionService;
use App\Models\WaterDepartment\Waternewconnection;

class NewWaterConnectionController extends Controller
{

    protected $newWaterConnectionService;

    public function __construct(NewWaterConnectionService $newWaterConnectionService)
    {
        $this->newWaterConnectionService = $newWaterConnectionService;
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
        return view('water-supply-department.new-water-connection.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateNewConnectionRequest $request)
    {
        $newWaterConnectionService = $this->newWaterConnectionService->store($request);

        if ($newWaterConnectionService) {
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

        return view('water-supply-department.new-water-connection.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateNewConnectionRequest $request, string $id)
    {
        $newWaterConnectionService = $this->newWaterConnectionService->update($request, $id);

        if ($newWaterConnectionService) {
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
