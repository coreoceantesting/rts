<?php

namespace App\Http\Controllers\TaxProperty;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\PropertyTax\TaxExemptionRequest;
use App\Services\PropertyTax\TaxExemptionService;
use App\Services\CommonService;

class TaxExemptionController extends Controller
{
    protected $taxExemptionService;
    protected $commonService;

    public function __construct(TaxExemptionService $taxExemptionService, CommonService $commonService)
    {
        $this->taxExemptionService = $taxExemptionService;
        $this->commonService = $commonService;
    }

    public function create()
    {
        $wards = $this->commonService->getActiveWard();

        $zones = $this->commonService->getActiveZone();

        return view('property-tax.taxExemption.create')->with([
            'wards' => $wards,
            'zones' => $zones,
        ]);
    }

    public function store(TaxExemptionRequest $request)
    {
        $taxExemption = $this->taxExemptionService->store($request);

        if ($taxExemption) {
            return response()->json([
                'success' => 'Tax exemption created successfully'
            ]);
        } else {
            return response()->json([
                'error' => 'Something went wrong, please try again'
            ]);
        }
    }

    public function edit(string $id)
    {
        $taxExemption = $this->taxExemptionService->edit(decrypt($id));

        $wards = $this->commonService->getActiveWard();

        $zones = $this->commonService->getActiveZone();

        return view('property-tax.taxExemption.edit')->with([
            'taxExemption' => $taxExemption,
            'wards' => $wards,
            'zones' => $zones,
        ]);
    }

    public function update(TaxExemptionRequest $request, string $id)
    {
        $taxExemption = $this->taxExemptionService->update($request);

        if ($taxExemption) {
            return response()->json([
                'success' => 'Tax exemption updated successfully'
            ]);
        } else {
            return response()->json([
                'error' => 'Something went wrong, please try again'
            ]);
        }
    }
}
