<?php

namespace App\Http\Controllers\Trade;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Trade\LicenseTransfer\CreateRequest;
use App\Http\Requests\Trade\LicenseTransfer\UpdateRequest;
use App\Services\Trade\LicenseTransferService;
use App\Models\Trade\TradeLicenseTransfer;
use App\Services\CommonService;

class LicenseTransferController extends Controller
{
    protected $licenseTransferService;
    protected $commonService;

    public function __construct(LicenseTransferService $licenseTransferService, CommonService $commonService)
    {
        $this->licenseTransferService = $licenseTransferService;
        $this->commonService = $commonService;
    }

    public function create()
    {
        $wards = $this->commonService->getActiveWard();

        $zones = $this->commonService->getActiveZone();

        return view('trade.license-transfer.create')->with([
            'wards' => $wards,
            'zones' => $zones,
        ]);
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

        $wards = $this->commonService->getActiveWard();

        $zones = $this->commonService->getActiveZone();

        return view('trade.license-transfer.edit')->with([
            'data' => $data,
            'wards' => $wards,
            'zones' => $zones,
        ]);
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
