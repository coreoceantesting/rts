<?php

namespace App\Http\Controllers\Trade;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Trade\ChangeOwnerName\CreateRequest;
use App\Http\Requests\Trade\ChangeOwnerName\UpdateRequest;
use App\Services\Trade\ChangeOwnerNameService;
use App\Models\Trade\TradeChangeOwnerName;
use App\Services\CommonService;

class ChangeOwnerNameController extends Controller
{
    protected $changeOwnerNameService;
    protected $commonService;

    public function __construct(ChangeOwnerNameService $changeOwnerNameService, CommonService $commonService)
    {
        $this->changeOwnerNameService = $changeOwnerNameService;
        $this->commonService = $commonService;
    }

    public function create()
    {
        $wards = $this->commonService->getActiveWard();

        $zones = $this->commonService->getActiveZone();

        return view('trade.change-owner-name.create')->with([
            'wards' => $wards,
            'zones' => $zones,
        ]);
    }

    public function store(CreateRequest $request)
    {
        $changeOwnerNameService = $this->changeOwnerNameService->store($request);

        if ($changeOwnerNameService) {
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
        $data = TradeChangeOwnerName::findOrFail(decrypt($id));

        $wards = $this->commonService->getActiveWard();

        $zones = $this->commonService->getActiveZone();

        return view('trade.change-owner-name.edit')->with([
            'data' => $data,
            'wards' => $wards,
            'zones' => $zones,
        ]);
    }

    public function update(UpdateRequest $request, string $id)
    {
        $changeOwnerNameService = $this->changeOwnerNameService->update($request, $id);

        if ($changeOwnerNameService) {
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
