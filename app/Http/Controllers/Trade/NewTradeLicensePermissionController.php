<?php

namespace App\Http\Controllers\Trade;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Trade\NewLicense\CreateRequest;
use App\Http\Requests\Trade\NewLicense\UpdateRequest;
use App\Services\Trade\NewLicense\NewLicenseService;
use App\Models\Trade\TradeNewLicensePermission;

class NewTradeLicensePermissionController extends Controller
{
    protected $NewLicenseService;

    public function __construct(NewLicenseService $NewLicenseService)
    {
        $this->NewLicenseService = $NewLicenseService;
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
        return view('Trade.NewLicensePermission.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateRequest $request)
    {
        $NewLicenseService = $this->NewLicenseService->store($request);

        if ($NewLicenseService) {
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
        $data = TradeNewLicensePermission::findOrFail($id);
        return view('Trade.NewLicensePermission.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id)
    {
        $NewLicenseService = $this->NewLicenseService->update($request, $id);

        if ($NewLicenseService) {
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
