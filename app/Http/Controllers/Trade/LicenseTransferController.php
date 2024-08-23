<?php

namespace App\Http\Controllers\Trade;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Trade\LicenseTransfer\CreateRequest;
use App\Http\Requests\Trade\LicenseTransfer\UpdateRequest;
use App\Services\Trade\LicenseTransferService;
use App\Models\Trade\TradeLicenseTransfer;

class LicenseTransferController extends Controller
{
    protected $licenseTransferService;

    public function __construct(LicenseTransferService $licenseTransferService)
    {
        $this->licenseTransferService = $licenseTransferService;
    }

    public function create()
    {
        return view('trade.license-transfer.create');
    }

    public function store(CreateRequest $request)
    {
        $licenseTransferService = $this->licenseTransferService->store($request);

        if ($licenseTransferService) {
            return response()->json([
                'success' => 'Detail Stored successfully'
            ]);
        } else {
            return response()->json([
                'error' => 'Something went wrong, please try again'
            ]);
        }
    }

    public function edit(string $id)
    {
        $data = TradeLicenseTransfer::findOrFail(decrypt($id));

        return view('trade.license-transfer.edit', compact('data'));
    }

    public function update(UpdateRequest $request, string $id)
    {
        $licenseTransferService = $this->licenseTransferService->update($request, $id);

        if ($licenseTransferService) {
            return response()->json([
                'success' => 'Detail updated successfully'
            ]);
        } else {
            return response()->json([
                'error' => 'Something went wrong, please try again'
            ]);
        }
    }
}
