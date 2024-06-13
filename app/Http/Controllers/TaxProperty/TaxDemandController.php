<?php

namespace App\Http\Controllers\TaxProperty;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\PropertyTax\TaxDemandRequest;
use App\Services\PropertyTax\TaxDemandService;

class TaxDemandController extends Controller
{
    protected $taxDemandService;

    public function __construct(TaxDemandService $taxDemandService)
    {
        $this->taxDemandService = $taxDemandService;
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
        return view('PropertyTax.taxDemand.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TaxDemandRequest $request)
    {
        $taxDemand = $this->taxDemandService->store($request);

        if ($taxDemand) {
            return response()->json([
                'success' => 'Tax demand created successfully'
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TaxDemandRequest $request, string $id)
    {
        $taxDemand = $this->taxDemandService->update($request);

        if ($taxDemand) {
            return response()->json([
                'success' => 'Tax demand updated successfully'
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
