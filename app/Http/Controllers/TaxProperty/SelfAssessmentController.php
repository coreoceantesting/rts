<?php

namespace App\Http\Controllers\TaxProperty;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\PropertyTax\SelfAssessmentRequest;
use App\Services\PropertyTax\SelfAssessmentService;
use App\Services\CommonService;

class SelfAssessmentController extends Controller
{
    protected $selfAssessmentService;
    protected $commonService;

    public function __construct(SelfAssessmentService $selfAssessmentService, CommonService $commonService)
    {
        $this->selfAssessmentService = $selfAssessmentService;
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

        return view('property-tax.selfAssessment.create')->with([
            'wards' => $wards,
            'zones' => $zones,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SelfAssessmentRequest $request)
    {
        $selfAssessment = $this->selfAssessmentService->store($request);

        if ($selfAssessment) {
            return response()->json([
                'success' => 'Self assessment created successfully'
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
    public function edit($id)
    {
        $selfAssessment = $this->selfAssessmentService->edit(decrypt($id));

        $wards = $this->commonService->getActiveWard();

        $zones = $this->commonService->getActiveZone();

        return view('property-tax.selfAssessment.edit')->with([
            'selfAssessment' => $selfAssessment,
            'wards' => $wards,
            'zones' => $zones,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SelfAssessmentRequest $request, string $id)
    {
        $selfAssessment = $this->selfAssessmentService->update($request);

        if ($selfAssessment) {
            return response()->json([
                'success' => 'Self assessment updated successfully'
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
