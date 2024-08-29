<?php

namespace App\Http\Controllers\Trade;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\WaterDepartment\PlumberLicense\CreateRequest;
use App\Http\Requests\WaterDepartment\PlumberLicense\UpdateRequest;
use App\Services\Trade\PlumberLicenseService;
use App\Models\WaterDepartment\WaterPlumberLicense;
use App\Services\CommonService;

class PlumberLicenseController extends Controller
{
    protected $plumberLicenseService;
    protected $commonService;

    public function __construct(PlumberLicenseService $plumberLicenseService, CommonService $commonService)
    {
        $this->plumberLicenseService = $plumberLicenseService;
        $this->commonService = $commonService;
    }

    public function create()
    {
        $wards = $this->commonService->getActiveWard();

        $zones = $this->commonService->getActiveZone();

        return view('trade.plumber-license.create')->with([
            'wards' => $wards,
            'zones' => $zones,
        ]);
    }

    public function store(CreateRequest $request)
    {
        $plumberLicenseService = $this->plumberLicenseService->store($request);

        if ($plumberLicenseService[0]) {
            return response()->json([
                'success' => 'Detail Stored successfully'
            ]);
        } else {
            return response()->json([
                'error' => $plumberLicenseService[1]
            ]);
        }
    }

    public function edit(string $id)
    {
        $data = WaterPlumberLicense::findOrFail(decrypt($id));

        $wards = $this->commonService->getActiveWard();

        $zones = $this->commonService->getActiveZone();

        return view('trade.plumber-license.edit')->with([
            'data' => $data,
            'wards' => $wards,
            'zones' => $zones,
        ]);
    }

    public function update(UpdateRequest $request, string $id)
    {
        $plumberLicenseService = $this->plumberLicenseService->update($request, $id);

        if ($plumberLicenseService[0]) {
            return response()->json([
                'success' => 'Detail updated successfully'
            ]);
        } else {
            return response()->json([
                'error' => $plumberLicenseService[1]
            ]);
        }
    }
}
