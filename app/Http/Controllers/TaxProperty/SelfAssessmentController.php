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

    public function create()
    {
        $wards = $this->commonService->getActiveWard();

        $zones = $this->commonService->getActiveZone();

        return view('property-tax.selfAssessment.create')->with([
            'wards' => $wards,
            'zones' => $zones,
        ]);
    }

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
}
