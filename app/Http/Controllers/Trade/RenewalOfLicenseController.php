<?php

namespace App\Http\Controllers\Trade;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Trade\RenewalLicense\CreateRequest;
use App\Http\Requests\Trade\RenewalLicense\UpdateRequest;
use App\Services\Trade\RenewalLicenseService;
use App\Models\Trade\TradeRenewalLicensePermission;

class RenewalOfLicenseController extends Controller
{
    protected $renewalLicenseService;

    public function __construct(RenewalLicenseService $renewalLicenseService)
    {
        $this->renewalLicenseService = $renewalLicenseService;
    }

    public function create()
    {
        return view('trade.renewal-of-license.create');
    }

    public function store(CreateRequest $request)
    {
        $renewalLicenseService = $this->renewalLicenseService->store($request);

        if ($renewalLicenseService) {
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
        $data = TradeRenewalLicensePermission::findOrFail(decrypt($id));

        return view('trade.renewal-of-license.edit', compact('data'));
    }

    public function update(UpdateRequest $request, string $id)
    {
        $renewalLicenseService = $this->renewalLicenseService->update($request, $id);

        if ($renewalLicenseService) {
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
