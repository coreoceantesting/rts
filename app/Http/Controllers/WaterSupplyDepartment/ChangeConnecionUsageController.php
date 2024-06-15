<?php

namespace App\Http\Controllers\WaterSupplyDepartment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\WaterDepartment\ChangeInUse\CreateRequest;
use App\Http\Requests\WaterDepartment\ChangeInUse\UpdateRequest;
use App\Services\WaterDepartment\ChangeInUse\ChangeInUseService;
use App\Models\WaterDepartment\WaterChangeInUse;

class ChangeConnecionUsageController extends Controller
{
    protected $ChangeInUseService;

    public function __construct(ChangeInUseService $ChangeInUseService)
    {
        $this->ChangeInUseService = $ChangeInUseService;
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
        return view('WaterSupplyDepartment.ChangeConnectionUsage.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateRequest $request)
    {
        $ChangeInUseService = $this->ChangeInUseService->store($request);

        if ($ChangeInUseService) {
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
        $data = WaterChangeInUse::findOrFail($id);
        return view('WaterSupplyDepartment.ChangeConnectionUsage.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id)
    {
        $ChangeInUseService = $this->ChangeInUseService->update($request, $id);

        if ($ChangeInUseService) {
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
