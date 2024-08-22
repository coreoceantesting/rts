<?php

namespace App\Http\Controllers\TaxProperty;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\PropertyTax\RegistrationOfObjectionRequest;
use App\Services\PropertyTax\RegistrationOfObjectionService;
use App\Services\CommonService;

class RegistrationOfObjectionController extends Controller
{
    protected $registrationOfObjectionService;
    protected $commonService;

    public function __construct(RegistrationOfObjectionService $registrationOfObjectionService, CommonService $commonService)
    {
        $this->registrationOfObjectionService = $registrationOfObjectionService;
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

        return view('property-tax.RegistrationOfObjection.create')->with([
            'wards' => $wards,
            'zones' => $zones,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RegistrationOfObjectionRequest $request)
    {
        $registrationofObjection = $this->registrationOfObjectionService->store($request);

        if ($registrationofObjection) {
            return response()->json([
                'success' => 'Registration of objection created successfully'
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
        $wards = $this->commonService->getActiveWard();

        $zones = $this->commonService->getActiveZone();

        $registrationofObjection = $this->registrationOfObjectionService->edit(decrypt($id));

        return view('property-tax.RegistrationOfObjection.edit')->with([
            'registrationofObjection' => $registrationofObjection,
            'wards' => $wards,
            'zones' => $zones,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RegistrationOfObjectionRequest $request, string $id)
    {
        $registrationofObjection = $this->registrationOfObjectionService->update($request);

        if ($registrationofObjection) {
            return response()->json([
                'success' => 'Registration of objection updated successfully'
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
