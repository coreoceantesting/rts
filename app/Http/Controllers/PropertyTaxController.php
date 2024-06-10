<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PropertyTaxController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('PropertyTax.issuanceOfPropertyTax.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function create_no_dues_certificate()
    {
        return view('PropertyTax.noDues.create');
    }

    public function create_transfer_of_property_certificate()
    {
        return view('PropertyTax.transferOfProperty.create');
    }

    public function create_new_taxation()
    {
        return view('PropertyTax.newTaxation.create');
    }

    public function create_retaxation()
    {
        return view('PropertyTax.reTaxation.create');
    }

    public function create_taxdemand()
    {
        return view('PropertyTax.taxDemand.create');
    }
}
