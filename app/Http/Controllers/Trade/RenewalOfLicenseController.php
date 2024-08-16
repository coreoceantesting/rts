<?php

namespace App\Http\Controllers\Trade;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Trade\RenewalLicense\CreateRequest;
use App\Http\Requests\Trade\RenewalLicense\UpdateRequest;
use App\Services\Trade\RenewalLicenseService;
use App\Models\Trade\TradeRenewalLicensePermission;

class RenewalOfLicenseController extends Controller
{
    protected $renewalLicenseService;

    public function __construct(RenewalLicenseService $renewalLicenseService)
    {
        $this->renewalLicenseService = $renewalLicenseService;
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
        return view('trade.RenewalOfLicense.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateRequest $request)
    {
        $renewalLicenseService = $this->renewalLicenseService->store($request);

        if ($renewalLicenseService) {
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
        $data = TradeRenewalLicensePermission::findOrFail(decrypt($id));

        return view('trade.RenewalOfLicense.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id)
    {
        $renewalLicenseService = $this->renewalLicenseService->update($request, $id);

        if ($renewalLicenseService) {
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
