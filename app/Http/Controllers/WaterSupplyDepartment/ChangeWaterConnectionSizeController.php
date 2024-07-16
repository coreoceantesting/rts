<?php

namespace App\Http\Controllers\WaterSupplyDepartment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\WaterDepartment\ChangeConnectionSize\CreateRequest;
use App\Http\Requests\WaterDepartment\ChangeConnectionSize\UpdateRequest;
use App\Services\WaterDepartment\ChangeConnectionSize\ChangeConnectionSizeService;
use App\Models\WaterDepartment\WaterChangeConnectionSize;

class ChangeWaterConnectionSizeController extends Controller
{
    protected $ChangeConnectionSizeService;

    public function __construct(ChangeConnectionSizeService $ChangeConnectionSizeService)
    {
        $this->ChangeConnectionSizeService = $ChangeConnectionSizeService;
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
        return view('WaterSupplyDepartment.ChangeWaterConnectionSize.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateRequest $request)
    {
        $ChangeConnectionSizeService = $this->ChangeConnectionSizeService->store($request);

        if ($ChangeConnectionSizeService) {
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
        return view('WaterSupplyDepartment.ChangeWaterConnectionSize.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id)
    {
        $ChangeConnectionSizeService = $this->ChangeConnectionSizeService->update($request, $id);

        if ($ChangeConnectionSizeService) {
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
