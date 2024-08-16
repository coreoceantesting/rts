<?php

namespace App\Http\Controllers\Trade;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\WaterDepartment\PlumberLicense\CreateRequest;
use App\Http\Requests\WaterDepartment\PlumberLicense\UpdateRequest;
use App\Services\Trade\PlumberLicenseService;
use App\Models\WaterDepartment\WaterPlumberLicense;

class PlumberLicenseController extends Controller
{
    protected $plumberLicenseService;

    public function __construct(PlumberLicenseService $plumberLicenseService)
    {
        $this->plumberLicenseService = $plumberLicenseService;
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
        return view('trade.PlumberLicense.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateRequest $request)
    {
        $plumberLicenseService = $this->plumberLicenseService->store($request);

        if ($plumberLicenseService) {
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
        $data = WaterPlumberLicense::findOrFail(decrypt($id));

        return view('trade.PlumberLicense.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id)
    {
        $plumberLicenseService = $this->plumberLicenseService->update($request, $id);

        if ($plumberLicenseService) {
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
