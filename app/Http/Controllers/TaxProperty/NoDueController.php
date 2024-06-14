<?php

namespace App\Http\Controllers\TaxProperty;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\PropertyTax\NoDueCertificateRequest;
use App\Services\PropertyTax\NoDueCertificateService;

class NoDueController extends Controller
{
    protected $noDueCertificateService;

    public function __construct(NoDueCertificateService $noDueCertificateService)
    {
        $this->noDueCertificateService = $noDueCertificateService;
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
        return view('PropertyTax.noDues.create');
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
        $noDue = $this->noDueCertificateService->edit($id);

        return view('PropertyTax.noDues.create')->with([
            'noDue' => $noDue
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
