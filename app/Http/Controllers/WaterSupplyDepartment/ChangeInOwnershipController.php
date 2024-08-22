<?php

namespace App\Http\Controllers\WaterSupplyDepartment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\WaterDepartment\ChangeOwnership\CreateRequest;
use App\Http\Requests\WaterDepartment\ChangeOwnership\UpdateRequest;
use App\Services\WaterDepartment\ChangeOwnershipService;
use App\Models\WaterDepartment\WaterChangeOwnership;
use App\Services\CommonService;

class ChangeInOwnershipController extends Controller
{
    protected $changeOwnershipService;
    protected $commonService;

    public function __construct(ChangeOwnershipService $changeOwnershipService, CommonService $commonService)
    {
        $this->changeOwnershipService = $changeOwnershipService;
        $this->commonService = $commonService;
    }

    public function create()
    {
        $wards = $this->commonService->getActiveWard();

        $zones = $this->commonService->getActiveZone();

        return view('water-supply-department.change-in-ownership.create')->with([
            'wards' => $wards,
            'zones' => $zones,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateRequest $request)
    {
        $changeOwnershipService = $this->changeOwnershipService->store($request);

        if ($changeOwnershipService) {
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
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = WaterChangeOwnership::findOrFail(decrypt($id));

        $wards = $this->commonService->getActiveWard();

        $zones = $this->commonService->getActiveZone();

        return view('water-supply-department.change-in-ownership.edit')->with([
            'data' => $data,
            'wards' => $wards,
            'zones' => $zones,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id)
    {
        $changeOwnershipService = $this->changeOwnershipService->update($request, $id);

        if ($changeOwnershipService) {
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
