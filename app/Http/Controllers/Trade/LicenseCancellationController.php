<?php

namespace App\Http\Controllers\Trade;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Trade\LicenseCancellation\CreateRequest;
use App\Http\Requests\Trade\LicenseCancellation\UpdateRequest;
use App\Services\Trade\LicenseCancellationService;
use App\Models\Trade\TradeLicenseCancellation;
use App\Services\CommonService;

class LicenseCancellationController extends Controller
{
    protected $licenseCancellationService;
    protected $commonService;

    public function __construct(LicenseCancellationService $licenseCancellationService, CommonService $commonService)
    {
        $this->licenseCancellationService = $licenseCancellationService;
        $this->commonService = $commonService;
    }

    public function create()
    {
        $wards = $this->commonService->getActiveWard();

        $zones = $this->commonService->getActiveZone();

        return view('trade.license-cancellation.create')->with([
            'wards' => $wards,
            'zones' => $zones,
        ]);
    }

    public function store(CreateRequest $request)
    {
        $licenseCancellationService = $this->licenseCancellationService->store($request);

        if ($licenseCancellationService) {
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
        $data = TradeLicenseCancellation::findOrFail(decrypt($id));

        $wards = $this->commonService->getActiveWard();

        $zones = $this->commonService->getActiveZone();

        return view('trade.license-cancellation.edit')->with([
            'data' => $data,
            'wards' => $wards,
            'zones' => $zones,
        ]);
    }

    public function update(UpdateRequest $request, string $id)
    {
        $licenseCancellationService = $this->licenseCancellationService->update($request, $id);

        if ($licenseCancellationService) {
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
