<?php

namespace App\Http\Controllers\Trade;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Trade\NewLicense\CreateRequest;
use App\Http\Requests\Trade\NewLicense\UpdateRequest;
use App\Services\Trade\NewLicenseService;
use App\Models\Trade\TradeNewLicensePermission;

class NewTradeLicensePermissionController extends Controller
{
    protected $newLicenseService;

    public function __construct(NewLicenseService $newLicenseService)
    {
        $this->newLicenseService = $newLicenseService;
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
        return view('trade.new-license-permission.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateRequest $request)
    {
        $newLicenseService = $this->newLicenseService->store($request);

        if ($newLicenseService) {
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
        $data = TradeNewLicensePermission::findOrFail(decrypt($id));

        return view('trade.new-license-permission.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id)
    {
        $newLicenseService = $this->newLicenseService->update($request, $id);

        if ($newLicenseService) {
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
