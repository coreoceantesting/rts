<?php

namespace App\Http\Controllers\Trade;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Trade\PerLicense\CreateRequest;
use App\Http\Requests\Trade\PerLicense\UpdateRequest;
use App\Services\Trade\PerLicenseService;
use App\Models\Trade\TradePerLicense;

class PerLicenseController extends Controller
{
    protected $perLicenseService;

    public function __construct(PerLicenseService $perLicenseService)
    {
        $this->perLicenseService = $perLicenseService;
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
        return view('trade.per-license.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateRequest $request)
    {
        $perLicenseService = $this->perLicenseService->store($request);

        if ($perLicenseService) {
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
        $data = TradePerLicense::findOrFail(decrypt($id));
        return view('trade.per-license.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id)
    {
        $perLicenseService = $this->perLicenseService->update($request, $id);

        if ($perLicenseService) {
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
