<?php

namespace App\Http\Controllers\WaterSupplyDepartment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\WaterDepartment\WaterQuality\CreateRequest;
use App\Http\Requests\WaterDepartment\WaterQuality\UpdateRequest;
use App\Services\WaterDepartment\WaterQualityService;
use App\Models\WaterDepartment\WaterQualityComplaint;

class WaterQualityComplaintController extends Controller
{
    protected $waterQualityService;

    public function __construct(WaterQualityService $waterQualityService)
    {
        $this->waterQualityService = $waterQualityService;
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
        return view('WaterSupplyDepartment.WaterQualityComplaints.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateRequest $request)
    {
        $waterQualityService = $this->waterQualityService->store($request);

        if ($waterQualityService) {
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
        $data = WaterQualityComplaint::findOrFail(decrypt($id));

        return view('WaterSupplyDepartment.WaterQualityComplaints.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id)
    {
        $waterQualityService = $this->waterQualityService->update($request, $id);

        if ($waterQualityService) {
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
