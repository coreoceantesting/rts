<?php

namespace App\Http\Controllers\TaxProperty;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\PropertyTax\TaxExemptionRequest;
use App\Services\PropertyTax\TaxExemptionService;

class TaxExemptionController extends Controller
{
    protected $taxExemptionService;

    public function __construct(TaxExemptionService $taxExemptionService)
    {
        $this->taxExemptionService = $taxExemptionService;
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
        return view('property-tax.taxExemption.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TaxExemptionRequest $request)
    {
        $taxExemption = $this->taxExemptionService->store(decrypt($request));

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
        $taxExemption = $this->taxExemptionService->edit($id);

        return view('property-tax.taxExemption.edit')->with([
            'taxExemption' => $taxExemption
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
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

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
