<?php

namespace App\Http\Controllers\WaterSupplyDepartment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\WaterDepartment\ChangeConnectionSize\CreateRequest;
use App\Http\Requests\WaterDepartment\ChangeConnectionSize\UpdateRequest;
use App\Services\WaterDepartment\ChangeConnectionSizeService;
use App\Models\WaterDepartment\WaterChangeConnectionSize;

class ChangeWaterConnectionSizeController extends Controller
{
    protected $changeConnectionSizeService;

    public function __construct(ChangeConnectionSizeService $changeConnectionSizeService)
    {
        $this->changeConnectionSizeService = $changeConnectionSizeService;
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
        return view('water-supply-department.change-water-connection-size.create');
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
        return view('water-supply-department.change-water-connection-size.edit', compact('data'));
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
