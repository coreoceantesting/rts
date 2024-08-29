<?php

namespace App\Http\Controllers\Trade;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Trade\NewLicense\CreateRequest;
use App\Http\Requests\Trade\NewLicense\UpdateRequest;
use App\Services\Trade\NewLicenseService;
use App\Models\Trade\TradeNewLicensePermission;
use App\Services\CommonService;

class NewTradeLicensePermissionController extends Controller
{
    protected $newLicenseService;
    protected $commonService;

    public function __construct(NewLicenseService $newLicenseService, CommonService $commonService)
    {
        $this->newLicenseService = $newLicenseService;
        $this->commonService = $commonService;
    }

    public function create()
    {
        $wards = $this->commonService->getActiveWard();

        $zones = $this->commonService->getActiveZone();

        return view('trade.new-license-permission.create')->with([
            'wards' => $wards,
            'zones' => $zones,
        ]);
    }

    public function store(CreateRequest $request)
    {
        $newLicenseService = $this->newLicenseService->store($request);

        if ($newLicenseService[0]) {
            return response()->json([
                'success' => 'Detail Stored successfully'
            ]);
        } else {
            return response()->json([
                'error' => $newLicenseService[1]
            ]);
        }
    }

    public function edit(string $id)
    {
        $data = TradeNewLicensePermission::findOrFail(decrypt($id));

        $wards = $this->commonService->getActiveWard();

        $zones = $this->commonService->getActiveZone();

        return view('trade.new-license-permission.edit')->with([
            'data' => $data,
            'wards' => $wards,
            'zones' => $zones,
        ]);
    }

    public function update(UpdateRequest $request, string $id)
    {
        $newLicenseService = $this->newLicenseService->update($request, $id);

        if ($newLicenseService[0]) {
            return response()->json([
                'success' => 'Detail updated successfully'
            ]);
        } else {
            return response()->json([
                'error' => $newLicenseService[1]
            ]);
        }
    }
}
