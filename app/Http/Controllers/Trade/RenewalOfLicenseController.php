<?php

namespace App\Http\Controllers\Trade;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Trade\RenewalLicense\CreateRequest;
use App\Http\Requests\Trade\RenewalLicense\UpdateRequest;
use App\Services\Trade\RenewalLicense\RenewalLicenseService;
use App\Models\Trade\TradeRenewalLicensePermission;

class RenewalOfLicenseController extends Controller
{
    protected $RenewalLicenseService;

    public function __construct(RenewalLicenseService $RenewalLicenseService)
    {
        $this->RenewalLicenseService = $RenewalLicenseService;
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
        return view('Trade.RenewalOfLicense.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateRequest $request)
    {
        $RenewalLicenseService = $this->RenewalLicenseService->store($request);

        if ($RenewalLicenseService) {
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
        $data = TradeRenewalLicensePermission::findOrFail($id);
        return view('Trade.RenewalOfLicense.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id)
    {
        $RenewalLicenseService = $this->RenewalLicenseService->update($request, $id);

        if ($RenewalLicenseService) {
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
