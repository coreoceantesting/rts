<?php

namespace App\Http\Controllers\TaxProperty;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\PropertyTax\TaxExemptionNonResidentPropertiesRequest;
use App\Services\PropertyTax\TaxExemptionNonResidentPropertiesService;

class TaxExemptionNonResidentController extends Controller
{
    protected $taxExemptionNonResidentPropertiesService;

    public function __construct(TaxExemptionNonResidentPropertiesService $taxExemptionNonResidentPropertiesService)
    {
        $this->taxExemptionNonResidentPropertiesService = $taxExemptionNonResidentPropertiesService;
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
        return view('property-tax.taxExemptionNonResident.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TaxExemptionNonResidentPropertiesRequest $request)
    {
        $taxExemptionNonResidentialProp = $this->taxExemptionNonResidentPropertiesService->store($request);

        if ($taxExemptionNonResidentialProp) {
            return response()->json([
                'success' => 'Tax exemption non residential property created successfully'
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
        $taxExemptionNonResidentialProp = $this->taxExemptionNonResidentPropertiesService->edit(decrypt($id));

        return view('property-tax.taxExemptionNonResident.edit')->with([
            'taxExemptionNonResidentialProp' => $taxExemptionNonResidentialProp
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TaxExemptionNonResidentPropertiesRequest $request, string $id)
    {
        $taxExemptionNonResidentialProp = $this->taxExemptionNonResidentPropertiesService->update($request);

        if ($taxExemptionNonResidentialProp) {
            return response()->json([
                'success' => 'Tax exemption non residential property updated successfully'
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
