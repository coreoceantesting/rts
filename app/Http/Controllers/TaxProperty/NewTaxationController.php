<?php

namespace App\Http\Controllers\TaxProperty;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\PropertyTax\NewTaxationRequest;
use App\Services\PropertyTax\NewtaxationService;
use App\Services\CommonService;

class NewTaxationController extends Controller
{
    protected $newtaxationService;
    protected $commonService;

    public function __construct(NewtaxationService $newtaxationService, CommonService $commonService)
    {
        $this->newtaxationService = $newtaxationService;
        $this->commonService = $commonService;
    }

    public function create()
    {
        $wards = $this->commonService->getActiveWard();

        $zones = $this->commonService->getActiveZone();

        return view('property-tax.newTaxation.create')->with([
            'wards' => $wards,
            'zones' => $zones,
        ]);
    }


    public function store(NewTaxationRequest $request)
    {
        $newTax = $this->newtaxationService->store($request);

        if ($newTax[0]) {
            return response()->json([
                'success' => 'New tax created successfully'
            ]);
        } else {
            return response()->json([
                'error' => $newTax[1]
            ]);
        }
    }

    public function edit(string $id)
    {
        $newTax = $this->newtaxationService->edit(decrypt($id));

        $wards = $this->commonService->getActiveWard();

        $zones = $this->commonService->getActiveZone();

        return view('property-tax.newTaxation.edit')->with([
            'newTax' => $newTax,
            'wards' => $wards,
            'zones' => $zones,
        ]);
    }


    public function update(NewTaxationRequest $request, string $id)
    {
        $newTax = $this->newtaxationService->update($request);

        if ($newTax[0]) {
            return response()->json([
                'success' => 'New tax update successfully'
            ]);
        } else {
            return response()->json([
                'error' => $newTax[1]
            ]);
        }
    }
}
