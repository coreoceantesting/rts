<?php

namespace App\Http\Controllers\TaxProperty;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\PropertyTax\SelfAssessmentRequest;
use App\Services\PropertyTax\SelfAssessmentService;

class SelfAssessmentController extends Controller
{
    protected $selfAssessmentService;

    public function __construct(SelfAssessmentService $selfAssessmentService)
    {
        $this->selfAssessmentService = $selfAssessmentService;
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
        return view('property-tax.selfAssessment.create');
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
        return $selfAssessment;
        return view('property-tax.selfAssessment.edit')->with([
            'selfAssessment' => $selfAssessment
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
