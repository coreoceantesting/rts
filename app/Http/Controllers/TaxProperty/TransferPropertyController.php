<?php

namespace App\Http\Controllers\TaxProperty;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\PropertyTax\TransferPropertyCertificateRequest;
use App\Services\PropertyTax\TransferPropertyCertificateService;

class TransferPropertyController extends Controller
{
    protected $transferPropertyCertificateService;

    public function __construct(TransferPropertyCertificateService $transferPropertyCertificateService)
    {
        $this->transferPropertyCertificateService = $transferPropertyCertificateService;
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
        return view('PropertyTax.transferOfProperty.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TransferPropertyCertificateRequest $request)
    {
        $transferProperty = $this->transferPropertyCertificateService->store($request);

        if ($transferProperty) {
            return response()->json([
                'success' => 'Property transfer created successfully'
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
        $transferProperty = $this->transferPropertyCertificateService->store($id);

        return view('PropertyTax.transferOfProperty.edit')->with([
            'transferProperty' => $transferProperty
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TransferPropertyCertificateRequest $request, string $id)
    {
        $transferProperty = $this->transferPropertyCertificateService->update($request);

        if ($transferProperty) {
            return response()->json([
                'success' => 'Property transfer update successfully'
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
