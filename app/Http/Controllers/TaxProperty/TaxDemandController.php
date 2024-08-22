<?php

namespace App\Http\Controllers\TaxProperty;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\PropertyTax\TaxDemandRequest;
use App\Services\PropertyTax\TaxDemandService;
use App\Services\CommonService;

class TaxDemandController extends Controller
{
    protected $taxDemandService;
    protected $commonService;

    public function __construct(TaxDemandService $taxDemandService, CommonService $commonService)
    {
        $this->taxDemandService = $taxDemandService;
        $this->commonService = $commonService;
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
        $wards = $this->commonService->getActiveWard();

        $zones = $this->commonService->getActiveZone();

        return view('property-tax.taxDemand.create')->with([
            'wards' => $wards,
            'zones' => $zones,
        ]);
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
        $taxDemand = $this->taxDemandService->edit(decrypt($id));

        $wards = $this->commonService->getActiveWard();

        $zones = $this->commonService->getActiveZone();

        return view('property-tax.taxDemand.edit')->with([
            'taxDemand' => $taxDemand,
            'wards' => $wards,
            'zones' => $zones,
        ]);
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
