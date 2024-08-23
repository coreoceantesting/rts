<?php

namespace App\Http\Controllers\Trade;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Trade\NocForMandap\CreateRequest;
use App\Http\Requests\Trade\NocForMandap\UpdateRequest;
use App\Services\Trade\NocForMandapService;
use App\Models\Trade\TradeNocForMandap;

class NOCForMandapController extends Controller
{
    protected $nocForMandapService;

    public function __construct(NocForMandapService $nocForMandapService)
    {
        $this->nocForMandapService = $nocForMandapService;
    }

    public function create()
    {
        return view('trade.noc-mandap.create');
    }

    public function store(CreateRequest $request)
    {
        $nocForMandapService = $this->nocForMandapService->store($request);

        if ($nocForMandapService) {
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
        $data = TradeNocForMandap::findOrFail(decrypt($id));

        return view('trade.noc-mandap.edit', compact('data'));
    }

    public function update(UpdateRequest $request, string $id)
    {
        $nocForMandapService = $this->nocForMandapService->update($request, $id);

        if ($nocForMandapService) {
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
