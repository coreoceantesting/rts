<?php

namespace App\Http\Controllers\Trade;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Trade\ChangeLicenseName\CreateRequest;
use App\Http\Requests\Trade\ChangeLicenseName\UpdateRequest;
use App\Services\Trade\ChangeLicenseNameService;
use App\Models\Trade\TradeChangeLicenseName;
use App\Services\CommonService;

class ChangeLicenseNameController extends Controller
{
    protected $changeLicenseNameService;
    protected $commonService;

    public function __construct(ChangeLicenseNameService $changeLicenseNameService, CommonService $commonService)
    {
        $this->changeLicenseNameService = $changeLicenseNameService;
        $this->commonService = $commonService;
    }

    public function create()
    {
        $wards = $this->commonService->getActiveWard();

        $zones = $this->commonService->getActiveZone();

        return view('trade.change-license-name.create')->with([
            'wards' => $wards,
            'zones' => $zones,
        ]);
    }

    public function store(CreateRequest $request)
    {
        $changeLicenseNameService = $this->changeLicenseNameService->store($request);

        if ($changeLicenseNameService) {
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
        $data = TradeChangeLicenseName::findOrFail(decrypt($id));

        $wards = $this->commonService->getActiveWard();

        $zones = $this->commonService->getActiveZone();

        return view('trade.change-license-name.edit')->with([
            'data' => $data,
            'wards' => $wards,
            'zones' => $zones,
        ]);
    }

    public function update(UpdateRequest $request, string $id)
    {
        $changeLicenseNameService = $this->changeLicenseNameService->update($request, $id);

        if ($changeLicenseNameService) {
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
