<?php

namespace App\Http\Controllers\Trade;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Trade\NocForMandap\CreateRequest;
use App\Http\Requests\Trade\NocForMandap\UpdateRequest;
use App\Services\Trade\NocForMandapService;
use App\Models\Trade\TradeNocForMandap;
use App\Services\CommonService;

class NOCForMandapController extends Controller
{
    protected $nocForMandapService;
    protected $commonService;

    public function __construct(NocForMandapService $nocForMandapService, CommonService $commonService)
    {
        $this->nocForMandapService = $nocForMandapService;
        $this->commonService = $commonService;
    }

    public function create()
    {
        $wards = $this->commonService->getActiveWard();

        $zones = $this->commonService->getActiveZone();

        return view('trade.noc-mandap.create')->with([
            'wards' => $wards,
            'zones' => $zones,
        ]);
    }

    public function store(CreateRequest $request)
    {
        $nocForMandapService = $this->nocForMandapService->store($request);

        if ($nocForMandapService[0]) {
            return response()->json([
                'success' => 'Detail Stored successfully'
            ]);
        } else {
            return response()->json([
                'error' => $nocForMandapService[1]
            ]);
        }
    }

    public function edit(string $id)
    {
        $data = TradeNocForMandap::findOrFail(decrypt($id));

        $wards = $this->commonService->getActiveWard();

        $zones = $this->commonService->getActiveZone();

        return view('trade.noc-mandap.edit')->with([
            'data' => $data,
            'wards' => $wards,
            'zones' => $zones,
        ]);
    }

    public function update(UpdateRequest $request, string $id)
    {
        $nocForMandapService = $this->nocForMandapService->update($request, $id);

        if ($nocForMandapService[0]) {
            return response()->json([
                'success' => 'Detail updated successfully'
            ]);
        } else {
            return response()->json([
                'error' => $nocForMandapService[1]
            ]);
        }
    }
}
