<?php

namespace App\Http\Controllers\TaxProperty;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\PropertyTax\NewTaxationRequest;
use App\Services\PropertyTax\NewtaxationService;

class NewTaxationController extends Controller
{
    protected $newtaxationService;

    public function __construct(NewtaxationService $newtaxationService)
    {
        $this->newtaxationService = $newtaxationService;
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
        return view('PropertyTax.newTaxation.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(NewTaxationRequest $request)
    {
        $newTax = $this->newtaxationService->store($request);

        if ($newTax) {
            return response()->json([
                'success' => 'New tax created successfully'
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
        $newTax = $this->newtaxationService->store($id);

        return view('PropertyTax.newTaxation.edit')->with([
            'newTax' => $newTax
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(NewTaxationRequest $request, string $id)
    {
        $newTax = $this->newtaxationService->update($request);

        if ($newTax) {
            return response()->json([
                'success' => 'New tax update successfully'
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
