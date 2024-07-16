<?php

namespace App\Http\Controllers\Trade;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Trade\PerLicense\CreateRequest;
use App\Http\Requests\Trade\PerLicense\UpdateRequest;
use App\Services\Trade\PerLicense\PerLicenseService;
use App\Models\Trade\TradePerLicense;

class PerLicenseController extends Controller
{
    protected $PerLicenseService;

    public function __construct(PerLicenseService $PerLicenseService)
    {
        $this->PerLicenseService = $PerLicenseService;
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
        return view('Trade.PerLicense.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateRequest $request)
    {
        $PerLicenseService = $this->PerLicenseService->store($request);

        if ($PerLicenseService) {
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
        return view('Trade.PerLicense.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id)
    {
        $PerLicenseService = $this->PerLicenseService->update($request, $id);

        if ($PerLicenseService) {
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
