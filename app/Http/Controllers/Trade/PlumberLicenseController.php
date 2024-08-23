<?php

namespace App\Http\Controllers\Trade;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\WaterDepartment\PlumberLicense\CreateRequest;
use App\Http\Requests\WaterDepartment\PlumberLicense\UpdateRequest;
use App\Services\Trade\PlumberLicenseService;
use App\Models\WaterDepartment\WaterPlumberLicense;

class PlumberLicenseController extends Controller
{
    protected $plumberLicenseService;

    public function __construct(PlumberLicenseService $plumberLicenseService)
    {
        $this->plumberLicenseService = $plumberLicenseService;
    }

    public function create()
    {
        return view('trade.plumber-license.create');
    }

    public function store(CreateRequest $request)
    {
        $plumberLicenseService = $this->plumberLicenseService->store($request);

        if ($plumberLicenseService) {
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
        $data = WaterPlumberLicense::findOrFail(decrypt($id));

        return view('trade.plumber-license.edit', compact('data'));
    }

    public function update(UpdateRequest $request, string $id)
    {
        $plumberLicenseService = $this->plumberLicenseService->update($request, $id);

        if ($plumberLicenseService) {
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
