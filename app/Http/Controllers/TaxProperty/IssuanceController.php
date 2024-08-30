<?php

namespace App\Http\Controllers\TaxProperty;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\PropertyTax\PropertyTaxAssessmentRequest;
use App\Services\PropertyTax\PropertyTaxAssessmentService;
use App\Services\CommonService;

class IssuanceController extends Controller
{
    protected $propertyTaxAssessmentService;
    protected $commonService;

    public function __construct(PropertyTaxAssessmentService $propertyTaxAssessmentService, CommonService $commonService)
    {
        $this->propertyTaxAssessmentService = $propertyTaxAssessmentService;
        $this->commonService = $commonService;
    }

    public function create()
    {
        $wards = $this->commonService->getActiveWard();

        $zones = $this->commonService->getActiveZone();

        return view('property-tax.issuanceOfPropertyTax.create')->with([
            'wards' => $wards,
            'zones' => $zones,
        ]);
    }

    public function store(PropertyTaxAssessmentRequest $request)
    {
        $propertyTaxAssessment = $this->propertyTaxAssessmentService->store($request);

        if ($propertyTaxAssessment[0]) {
            return response()->json([
                'success' => 'Property tax assessment created successfully'
            ]);
        } else {
            return response()->json([
                'error' => $propertyTaxAssessment[1]
            ]);
        }
    }

    public function edit(string $id)
    {
        $propertyTaxAssessment = $this->propertyTaxAssessmentService->edit(decrypt($id));

        $wards = $this->commonService->getActiveWard();

        $zones = $this->commonService->getActiveZone();

        return view('property-tax.issuanceOfPropertyTax.edit')->with([
            'propertyTaxAssessment' => $propertyTaxAssessment,
            'wards' => $wards,
            'zones' => $zones,
        ]);
    }


    public function update(PropertyTaxAssessmentRequest $request, string $id)
    {
        $propertyTaxAssessment = $this->propertyTaxAssessmentService->update($request);

        if ($propertyTaxAssessment[0]) {
            return response()->json([
                'success' => 'Property tax assessment updated successfully'
            ]);
        } else {
            return response()->json([
                'error' => $propertyTaxAssessment[1]
            ]);
        }
    }
}
