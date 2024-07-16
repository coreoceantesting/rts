<?php

namespace App\Http\Controllers\Trade;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Trade\AutoRenewal\CreateRequest;
use App\Http\Requests\Trade\AutoRenewal\UpdateRequest;
use App\Services\Trade\AutoRenewal\AutoRenewalService;
use App\Models\Trade\TradeAutoRenewalLicensePermission;

class AutoRenewalController extends Controller
{
    protected $AutoRenewalService;

    public function __construct(AutoRenewalService $AutoRenewalService)
    {
        $this->AutoRenewalService = $AutoRenewalService;
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
        return view('Trade.AutoRenewal.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateRequest $request)
    {
        $AutoRenewalService = $this->AutoRenewalService->store($request);

        if ($AutoRenewalService) {
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
        $data = TradeAutoRenewalLicensePermission::findOrFail(decrypt($id));

        return view('Trade.AutoRenewal.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id)
    {
        $AutoRenewalService = $this->AutoRenewalService->update($request, $id);

        if ($AutoRenewalService) {
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
