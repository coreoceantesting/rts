<?php

namespace App\Http\Controllers\Trade;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Trade\AutoRenewal\CreateRequest;
use App\Http\Requests\Trade\AutoRenewal\UpdateRequest;
use App\Services\Trade\AutoRenewalService;
use App\Models\Trade\TradeAutoRenewalLicensePermission;
use App\Services\CommonService;

class AutoRenewalController extends Controller
{
    protected $autoRenewalService;
    protected $commonService;

    public function __construct(AutoRenewalService $autoRenewalService, CommonService $commonService)
    {
        $this->autoRenewalService = $autoRenewalService;
        $this->commonService = $commonService;
    }

    public function create()
    {
        $wards = $this->commonService->getActiveWard();

        $zones = $this->commonService->getActiveZone();

        return view('trade.auto-renewal.create')->with([
            'wards' => $wards,
            'zones' => $zones,
        ]);
    }

    public function store(CreateRequest $request)
    {
        $autoRenewalService = $this->autoRenewalService->store($request);

        if ($autoRenewalService[0]) {
            return response()->json([
                'success' => 'Detail Stored successfully'
            ]);
        } else {
            return response()->json([
                'error' => $autoRenewalService[1]
            ]);
        }
    }

    public function edit(string $id)
    {
        $data = TradeAutoRenewalLicensePermission::findOrFail(decrypt($id));

        $wards = $this->commonService->getActiveWard();

        $zones = $this->commonService->getActiveZone();

        return view('trade.auto-renewal.edit')->with([
            'data' => $data,
            'wards' => $wards,
            'zones' => $zones,
        ]);
    }

    public function update(UpdateRequest $request, string $id)
    {
        $autoRenewalService = $this->autoRenewalService->update($request, $id);

        if ($autoRenewalService[0]) {
            return response()->json([
                'success' => 'Detail updated successfully'
            ]);
        } else {
            return response()->json([
                'error' => $autoRenewalService[1]
            ]);
        }
    }
}
