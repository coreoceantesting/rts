<?php

namespace App\Http\Controllers\TaxProperty;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\PropertyTax\RetaxationRequest;
use App\Services\PropertyTax\ReTaxationService;
use App\Services\CommonService;

class RetaxationController extends Controller
{
    protected $reTaxationService;
    protected $commonService;

    public function __construct(ReTaxationService $reTaxationService, CommonService $commonService)
    {
        $this->reTaxationService = $reTaxationService;
        $this->commonService = $commonService;
    }

    public function create()
    {
        $wards = $this->commonService->getActiveWard();

        $zones = $this->commonService->getActiveZone();

        return view('property-tax.reTaxation.create')->with([
            'wards' => $wards,
            'zones' => $zones,
        ]);
    }

    public function store(RetaxationRequest $request)
    {
        $retax = $this->reTaxationService->store($request);

        if ($retax[0]) {
            return response()->json([
                'success' => 'Re taxation created successfully'
            ]);
        } else {
            return response()->json([
                'error' => $retax[1]
            ]);
        }
    }

    public function edit(string $id)
    {
        $retax = $this->reTaxationService->edit(decrypt($id));

        $wards = $this->commonService->getActiveWard();

        $zones = $this->commonService->getActiveZone();

        return view('property-tax.reTaxation.edit')->with([
            'retax' => $retax,
            'wards' => $wards,
            'zones' => $zones,
        ]);
    }

    public function update(RetaxationRequest $request, string $id)
    {
        $retax = $this->reTaxationService->update($request);

        if ($retax[0]) {
            return response()->json([
                'success' => 'Re taxation updated successfully'
            ]);
        } else {
            return response()->json([
                'error' => $retax[1]
            ]);
        }
    }
}
