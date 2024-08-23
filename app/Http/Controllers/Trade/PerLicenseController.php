<?php

namespace App\Http\Controllers\Trade;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Trade\PerLicense\CreateRequest;
use App\Http\Requests\Trade\PerLicense\UpdateRequest;
use App\Services\Trade\PerLicenseService;
use App\Models\Trade\TradePerLicense;

class PerLicenseController extends Controller
{
    protected $perLicenseService;

    public function __construct(PerLicenseService $perLicenseService)
    {
        $this->perLicenseService = $perLicenseService;
    }

    public function create()
    {
        return view('trade.per-license.create');
    }

    public function store(CreateRequest $request)
    {
        $perLicenseService = $this->perLicenseService->store($request);

        if ($perLicenseService) {
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
        $data = TradePerLicense::findOrFail(decrypt($id));
        return view('trade.per-license.edit', compact('data'));
    }

    public function update(UpdateRequest $request, string $id)
    {
        $perLicenseService = $this->perLicenseService->update($request, $id);

        if ($perLicenseService) {
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
