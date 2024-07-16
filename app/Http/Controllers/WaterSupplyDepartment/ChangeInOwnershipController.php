<?php

namespace App\Http\Controllers\WaterSupplyDepartment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\WaterDepartment\ChangeOwnership\CreateRequest;
use App\Http\Requests\WaterDepartment\ChangeOwnership\UpdateRequest;
use App\Services\WaterDepartment\ChangeOwnership\ChangeOwnershipService;
use App\Models\WaterDepartment\WaterChangeOwnership;

class ChangeInOwnershipController extends Controller
{
    protected $ChangeOwnershipService;

    public function __construct(ChangeOwnershipService $ChangeOwnershipService)
    {
        $this->ChangeOwnershipService = $ChangeOwnershipService;
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
        return view('WaterSupplyDepartment.ChangeInOwnership.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateRequest $request)
    {
        $ChangeOwnershipService = $this->ChangeOwnershipService->store($request);

        if ($ChangeOwnershipService) {
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
        $data = WaterChangeOwnership::findOrFail(decrypt($id));
        return view('WaterSupplyDepartment.ChangeInOwnership.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id)
    {
        $ChangeOwnershipService = $this->ChangeOwnershipService->update($request, $id);

        if ($ChangeOwnershipService) {
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
