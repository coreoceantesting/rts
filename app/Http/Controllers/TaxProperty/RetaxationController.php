<?php

namespace App\Http\Controllers\TaxProperty;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\PropertyTax\RetaxationRequest;
use App\Services\PropertyTax\ReTaxationService;

class RetaxationController extends Controller
{
    protected $reTaxationService;

    public function __construct(ReTaxationService $reTaxationService)
    {
        $this->reTaxationService = $reTaxationService;
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
        return view('PropertyTax.reTaxation.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RetaxationRequest $request)
    {
        $retax = $this->reTaxationService->store($request);

        if ($retax) {
            return response()->json([
                'success' => 'Re taxation created successfully'
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
        $retax = $this->reTaxationService->store($id);

        return view('PropertyTax.reTaxation.edit')->with([
            'retax' => $retax
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RetaxationRequest $request, string $id)
    {
        $retax = $this->reTaxationService->update($request);

        if ($retax) {
            return response()->json([
                'success' => 'Re taxation updated successfully'
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
