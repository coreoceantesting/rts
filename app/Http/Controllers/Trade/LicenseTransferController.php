<?php

namespace App\Http\Controllers\Trade;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Trade\LicenseTransfer\CreateRequest;
use App\Http\Requests\Trade\LicenseTransfer\UpdateRequest;
use App\Services\Trade\LicenseTransfer\LicenseTransferService;
use App\Models\Trade\TradeLicenseTransfer;

class LicenseTransferController extends Controller
{
    protected $LicenseTransferService;

    public function __construct(LicenseTransferService $LicenseTransferService)
    {
        $this->LicenseTransferService = $LicenseTransferService;
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
        return view('Trade.LicenseTransfer.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateRequest $request)
    {
        $LicenseTransferService = $this->LicenseTransferService->store($request);

        if ($LicenseTransferService) {
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
        $data = TradeLicenseTransfer::findOrFail(decrypt($id));

        return view('Trade.LicenseTransfer.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id)
    {
        $LicenseTransferService = $this->LicenseTransferService->update($request, $id);

        if ($LicenseTransferService) {
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
