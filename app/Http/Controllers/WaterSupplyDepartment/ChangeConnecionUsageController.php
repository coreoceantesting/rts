<?php

namespace App\Http\Controllers\WaterSupplyDepartment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\WaterDepartment\ChangeInUse\CreateRequest;
use App\Http\Requests\WaterDepartment\ChangeInUse\UpdateRequest;
use App\Services\WaterDepartment\ChangeInUseService;

class ChangeConnecionUsageController extends Controller
{
    protected $changeInUseService;

    public function __construct(ChangeInUseService $changeInUseService)
    {
        $this->changeInUseService = $changeInUseService;
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
        $changeInUseService = $this->changeInUseService->store($request);

        if ($changeInUseService) {
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
        $data = $this->changeInUseService->edit(decrypt($id));

        return view('WaterSupplyDepartment.ChangeConnectionUsage.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id)
    {
        $changeInUseService = $this->changeInUseService->update($request, $id);

        if ($changeInUseService) {
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
