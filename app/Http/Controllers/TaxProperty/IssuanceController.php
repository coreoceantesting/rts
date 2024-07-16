<?php

namespace App\Http\Controllers\TaxProperty;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\PropertyTax\PropertyTaxAssessmentRequest;
use App\Services\PropertyTax\PropertyTaxAssessmentService;

class IssuanceController extends Controller
{
    protected $propertyTaxAssessmentService;

    public function __construct(PropertyTaxAssessmentService $propertyTaxAssessmentService)
    {
        $this->propertyTaxAssessmentService = $propertyTaxAssessmentService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('PropertyTax.issuanceOfPropertyTax.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PropertyTaxAssessmentRequest $request)
    {
        $propertyTaxAssessment = $this->propertyTaxAssessmentService->store($request);

        if ($propertyTaxAssessment) {
            return response()->json([
                'success' => 'Property tax assessment created successfully'
            ]);
        } else {
            return response()->json([
                'error' => 'Something went wrong, please try again'
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $propertyTaxAssessment = $this->propertyTaxAssessmentService->edit(decrypt($id));

        return view('PropertyTax.issuanceOfPropertyTax.edit')->with([
            'propertyTaxAssessment' => $propertyTaxAssessment
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PropertyTaxAssessmentRequest $request, string $id)
    {
        $propertyTaxAssessment = $this->propertyTaxAssessmentService->update($request);

        if ($propertyTaxAssessment) {
            return response()->json([
                'success' => 'Property tax assessment updated successfully'
            ]);
        } else {
            return response()->json([
                'error' => 'Something went wrong, please try again'
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
