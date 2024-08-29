<?php

namespace App\Http\Controllers\Trade;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\WaterDepartment\RenewalPlumber\CreateRequest;
use App\Http\Requests\WaterDepartment\RenewalPlumber\UpdateRequest;
use App\Services\Trade\RenewalPlumberService;
use App\Models\WaterDepartment\WaterRenewalOfPlumber;
use App\Services\CommonService;

class RenewalPlumberLicenseController extends Controller
{
    protected $renewalPlumberService;
    protected $commonService;

    public function __construct(RenewalPlumberService $renewalPlumberService, CommonService $commonService)
    {
        $this->renewalPlumberService = $renewalPlumberService;
        $this->commonService = $commonService;
    }

    public function create()
    {
        $wards = $this->commonService->getActiveWard();

        $zones = $this->commonService->getActiveZone();

        return view('trade.renewal-plumber-license.create')->with([
            'wards' => $wards,
            'zones' => $zones,
        ]);
    }

    public function store(CreateRequest $request)
    {
        $renewalPlumberService = $this->renewalPlumberService->store($request);

        if ($renewalPlumberService[0]) {
            return response()->json([
                'success' => 'Detail Stored successfully'
            ]);
        } else {
            return response()->json([
                'error' => $renewalPlumberService[1]
            ]);
        }
    }

    public function edit(string $id)
    {
        $data = WaterRenewalOfPlumber::findOrFail(decrypt($id));

        $wards = $this->commonService->getActiveWard();

        $zones = $this->commonService->getActiveZone();

        return view('trade.renewal-plumber-license.edit')->with([
            'data' => $data,
            'wards' => $wards,
            'zones' => $zones,
        ]);
    }

    public function update(UpdateRequest $request, string $id)
    {
        $renewalPlumberService = $this->renewalPlumberService->update($request, $id);

        if ($renewalPlumberService[0]) {
            return response()->json([
                'success' => 'Detail updated successfully'
            ]);
        } else {
            return response()->json([
                'error' => $renewalPlumberService[1]
            ]);
        }
    }
}
