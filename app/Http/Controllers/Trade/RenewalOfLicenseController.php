<?php

namespace App\Http\Controllers\Trade;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Trade\RenewalLicense\CreateRequest;
use App\Http\Requests\Trade\RenewalLicense\UpdateRequest;
use App\Services\Trade\RenewalLicenseService;
use App\Models\Trade\TradeRenewalLicensePermission;
use App\Services\CommonService;

class RenewalOfLicenseController extends Controller
{
    protected $renewalLicenseService;
    protected $commonService;

    public function __construct(RenewalLicenseService $renewalLicenseService, CommonService $commonService)
    {
        $this->renewalLicenseService = $renewalLicenseService;
        $this->commonService = $commonService;
    }

    public function create()
    {
        $wards = $this->commonService->getActiveWard();

        $zones = $this->commonService->getActiveZone();

        return view('trade.renewal-of-license.create')->with([
            'wards' => $wards,
            'zones' => $zones,
        ]);
    }

    public function store(CreateRequest $request)
    {
        $renewalLicenseService = $this->renewalLicenseService->store($request);

        if ($renewalLicenseService[0]) {
            return response()->json([
                'success' => 'Detail Stored successfully'
            ]);
        } else {
            return response()->json([
                'error' => $renewalLicenseService[1]
            ]);
        }
    }

    public function edit(string $id)
    {
        $data = TradeRenewalLicensePermission::findOrFail(decrypt($id));

        $wards = $this->commonService->getActiveWard();

        $zones = $this->commonService->getActiveZone();

        return view('trade.renewal-of-license.edit')->with([
            'data' => $data,
            'wards' => $wards,
            'zones' => $zones,
        ]);
    }

    public function update(UpdateRequest $request, string $id)
    {
        $renewalLicenseService = $this->renewalLicenseService->update($request, $id);

        if ($renewalLicenseService[0]) {
            return response()->json([
                'success' => 'Detail updated successfully'
            ]);
        } else {
            return response()->json([
                'error' => $renewalLicenseService[1]
            ]);
        }
    }
}
