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

    public function create()
    {
        $wards = $this->commonService->getActiveWard();

        $zones = $this->commonService->getActiveZone();

        return view('property-tax.RegistrationOfObjection.create')->with([
            'wards' => $wards,
            'zones' => $zones,
        ]);
    }

    public function store(RegistrationOfObjectionRequest $request)
    {
        $registrationofObjection = $this->registrationOfObjectionService->store($request);

        if ($registrationofObjection[0]) {
            return response()->json([
                'success' => 'Registration of objection created successfully'
            ]);
        } else {
            return response()->json([
                'error' => $registrationofObjection[1]
            ]);
        }
    }

    public function show(string $id)
    {
        //
    }


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

    public function update(RegistrationOfObjectionRequest $request, string $id)
    {
        $registrationofObjection = $this->registrationOfObjectionService->update($request);

        if ($registrationofObjection[0]) {
            return response()->json([
                'success' => 'Registration of objection updated successfully'
            ]);
        } else {
            return response()->json([
                'error' => $registrationofObjection[1]
            ]);
        }
    }
}
