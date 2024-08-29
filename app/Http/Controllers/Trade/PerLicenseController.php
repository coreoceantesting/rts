<?php

namespace App\Http\Controllers\Trade;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Trade\PerLicense\CreateRequest;
use App\Http\Requests\Trade\PerLicense\UpdateRequest;
use App\Services\Trade\PerLicenseService;
use App\Models\Trade\TradePerLicense;
use App\Services\CommonService;

class PerLicenseController extends Controller
{
    protected $perLicenseService;
    protected $commonService;

    public function __construct(PerLicenseService $perLicenseService, CommonService $commonService)
    {
        $this->perLicenseService = $perLicenseService;
        $this->commonService = $commonService;
    }

    public function create()
    {
        $wards = $this->commonService->getActiveWard();

        $zones = $this->commonService->getActiveZone();

        return view('trade.per-license.create')->with([
            'wards' => $wards,
            'zones' => $zones,
        ]);
    }

    public function store(CreateRequest $request)
    {
        $perLicenseService = $this->perLicenseService->store($request);

        if ($perLicenseService[0]) {
            return response()->json([
                'success' => 'Detail Stored successfully'
            ]);
        } else {
            return response()->json([
                'error' => $perLicenseService[1]
            ]);
        }
    }

    public function edit(string $id)
    {
        $data = TradePerLicense::findOrFail(decrypt($id));

        $wards = $this->commonService->getActiveWard();

        $zones = $this->commonService->getActiveZone();

        return view('trade.per-license.edit')->with([
            'data' => $data,
            'wards' => $wards,
            'zones' => $zones,
        ]);
    }

    public function update(UpdateRequest $request, string $id)
    {
        $perLicenseService = $this->perLicenseService->update($request, $id);

        if ($perLicenseService[0]) {
            return response()->json([
                'success' => 'Detail updated successfully'
            ]);
        } else {
            return response()->json([
                'error' => $perLicenseService[1]
            ]);
        }
    }
}
