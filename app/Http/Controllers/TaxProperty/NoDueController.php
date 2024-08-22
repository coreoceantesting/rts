<?php

namespace App\Http\Controllers\TaxProperty;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\PropertyTax\NoDueCertificateRequest;
use App\Services\PropertyTax\NoDueCertificateService;
use App\Services\CommonService;

class NoDueController extends Controller
{
    protected $noDueCertificateService;
    protected $commonService;

    public function __construct(NoDueCertificateService $noDueCertificateService, CommonService $commonService)
    {
        $this->noDueCertificateService = $noDueCertificateService;
        $this->commonService = $commonService;
    }

    public function create()
    {
        $wards = $this->commonService->getActiveWard();

        $zones = $this->commonService->getActiveZone();

        return view('property-tax.noDues.create')->with([
            'wards' => $wards,
            'zones' => $zones,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(NoDueCertificateRequest $request)
    {
        $noDue = $this->noDueCertificateService->store($request);

        if ($noDue) {
            return response()->json([
                'success' => 'No due certificate created successfully'
            ]);
        } else {
            return response()->json([
                'error' => 'Something went wrong, please try again'
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $noDue = $this->noDueCertificateService->edit(decrypt($id));

        $wards = $this->commonService->getActiveWard();

        $zones = $this->commonService->getActiveZone();


        return view('property-tax.noDues.edit')->with([
            'noDue' => $noDue,
            'wards' => $wards,
            'zones' => $zones,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(NoDueCertificateRequest $request, string $id)
    {
        $noDue = $this->noDueCertificateService->update($request);

        if ($noDue) {
            return response()->json([
                'success' => 'No due certificate updated successfully'
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
