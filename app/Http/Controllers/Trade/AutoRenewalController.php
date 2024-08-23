<?php

namespace App\Http\Controllers\Trade;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Trade\AutoRenewal\CreateRequest;
use App\Http\Requests\Trade\AutoRenewal\UpdateRequest;
use App\Services\Trade\AutoRenewalService;
use App\Models\Trade\TradeAutoRenewalLicensePermission;

class AutoRenewalController extends Controller
{
    protected $autoRenewalService;

    public function __construct(AutoRenewalService $autoRenewalService)
    {
        $this->autoRenewalService = $autoRenewalService;
    }

    public function create()
    {
        return view('trade.auto-renewal.create');
    }

    public function store(CreateRequest $request)
    {
        $autoRenewalService = $this->autoRenewalService->store($request);

        if ($autoRenewalService) {
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
        $data = TradeAutoRenewalLicensePermission::findOrFail(decrypt($id));

        return view('trade.auto-renewal.edit', compact('data'));
    }

    public function update(UpdateRequest $request, string $id)
    {
        $autoRenewalService = $this->autoRenewalService->update($request, $id);

        if ($autoRenewalService) {
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
