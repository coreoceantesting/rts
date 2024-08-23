<?php

namespace App\Http\Controllers\Trade;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Trade\ChangeLicenseType\CreateRequest;
use App\Http\Requests\Trade\ChangeLicenseType\UpdateRequest;
use App\Services\Trade\ChangeLicenseTypeService;
use App\Models\Trade\TradeChangeLicenseType;
use App\Services\CommonService;

class ChangeLicenseTypeController extends Controller
{
    protected $changeLicenseTypeService;
    protected $commonService;

    public function __construct(ChangeLicenseTypeService $changeLicenseTypeService, CommonService $commonService)
    {
        $this->changeLicenseTypeService = $changeLicenseTypeService;
        $this->commonService = $commonService;
    }

    public function create()
    {
        $wards = $this->commonService->getActiveWard();

        $zones = $this->commonService->getActiveZone();

        return view('trade.change-license-type.create')->with([
            'wards' => $wards,
            'zones' => $zones,
        ]);
    }

    public function store(CreateRequest $request)
    {
        $changeLicenseTypeService = $this->changeLicenseTypeService->store($request);

        if ($changeLicenseTypeService) {
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
        $data = TradeChangeLicenseType::findOrFail(decrypt($id));

        $wards = $this->commonService->getActiveWard();

        $zones = $this->commonService->getActiveZone();

        return view('trade.change-license-type.edit')->with([
            'data' => $data,
            'wards' => $wards,
            'zones' => $zones,
        ]);
    }

    public function update(Request $request, string $id)
    {
        $changeLicenseTypeService = $this->changeLicenseTypeService->update($request, $id);

        if ($changeLicenseTypeService) {
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
