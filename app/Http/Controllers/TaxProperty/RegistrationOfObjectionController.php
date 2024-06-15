<?php

namespace App\Http\Controllers\TaxProperty;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\PropertyTax\RegistrationOfObjectionRequest;
use App\Services\PropertyTax\RegistrationOfObjectionService;

class RegistrationOfObjectionController extends Controller
{
    protected $registrationOfObjectionService;

    public function __construct(RegistrationOfObjectionService $registrationOfObjectionService)
    {
        $this->registrationOfObjectionService = $registrationOfObjectionService;
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
        return view('PropertyTax.RegistrationOfObjection.create');
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
        $registrationofObjection = $this->registrationOfObjectionService->edit($id);

        return view('PropertyTax.RegistrationOfObjection.edit')->with([
            'registrationofObjection' => $registrationofObjection
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
