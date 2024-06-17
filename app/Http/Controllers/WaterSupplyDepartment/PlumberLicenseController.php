<?php

namespace App\Http\Controllers\WaterSupplyDepartment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\WaterDepartment\PlumberLicense\CreateRequest;
use App\Http\Requests\WaterDepartment\PlumberLicense\UpdateRequest;
use App\Services\WaterDepartment\PlumberLicense\PlumberLicenseService;
use App\Models\WaterDepartment\WaterPlumberLicense;

class PlumberLicenseController extends Controller
{
    protected $PlumberLicenseService;

    public function __construct(PlumberLicenseService $PlumberLicenseService)
    {
        $this->PlumberLicenseService = $PlumberLicenseService;
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
        return view('WaterSupplyDepartment.PlumberLicense.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateRequest $request)
    {
        $PlumberLicenseService = $this->PlumberLicenseService->store($request);

        if ($PlumberLicenseService) {
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
        $data = WaterPlumberLicense::findOrFail($id);
        return view('WaterSupplyDepartment.PlumberLicense.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id)
    {
        $PlumberLicenseService = $this->PlumberLicenseService->update($request, $id);

        if ($PlumberLicenseService) {
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
