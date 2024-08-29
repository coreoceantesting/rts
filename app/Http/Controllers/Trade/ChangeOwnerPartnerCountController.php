<?php

namespace App\Http\Controllers\Trade;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Trade\ChangeOwnerCount\CreateRequest;
use App\Http\Requests\Trade\ChangeOwnerCount\UpdateRequest;
use App\Services\Trade\ChangeOwnerCountService;
use App\Models\Trade\TradeChangeOwnerCount;
use App\Services\CommonService;

class ChangeOwnerPartnerCountController extends Controller
{
    protected $changeOwnerCountService;
    protected $commonService;

    public function __construct(ChangeOwnerCountService $changeOwnerCountService, CommonService $commonService)
    {
        $this->changeOwnerCountService = $changeOwnerCountService;
        $this->commonService = $commonService;
    }

    public function create()
    {
        $wards = $this->commonService->getActiveWard();

        $zones = $this->commonService->getActiveZone();

        return view('trade.change-owner-count.create')->with([
            'wards' => $wards,
            'zones' => $zones,
        ]);
    }

    public function store(CreateRequest $request)
    {
        $changeOwnerCountService = $this->changeOwnerCountService->store($request);

        if ($changeOwnerCountService[0]) {
            return response()->json([
                'success' => 'Detail Stored successfully'
            ]);
        } else {
            return response()->json([
                'error' => $changeOwnerCountService[1]
            ]);
        }
    }

    public function edit(string $id)
    {
        $data = TradeChangeOwnerCount::findOrFail(decrypt($id));

        $wards = $this->commonService->getActiveWard();

        $zones = $this->commonService->getActiveZone();

        return view('trade.change-owner-count.edit')->with([
            'data' => $data,
            'wards' => $wards,
            'zones' => $zones,
        ]);
    }

    public function update(UpdateRequest $request, string $id)
    {
        $changeOwnerCountService = $this->changeOwnerCountService->update($request, $id);

        if ($changeOwnerCountService[0]) {
            return response()->json([
                'success' => 'Detail updated successfully'
            ]);
        } else {
            return response()->json([
                'error' => $changeOwnerCountService[1]
            ]);
        }
    }
}
