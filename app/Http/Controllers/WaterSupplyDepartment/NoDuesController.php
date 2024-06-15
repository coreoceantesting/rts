<?php

namespace App\Http\Controllers\WaterSupplyDepartment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\WaterDepartment\NoDues\CreateRequest;
use App\Http\Requests\WaterDepartment\NoDues\UpdateRequest;
use App\Services\WaterDepartment\NoDues\NoDuesService;
use App\Models\WaterDepartment\WaterNoDues;

class NoDuesController extends Controller
{
    protected $NoDuesService;

    public function __construct(NoDuesService $NoDuesService)
    {
        $this->NoDuesService = $NoDuesService;
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
        return view('WaterSupplyDepartment.NoDuesCertificate.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateRequest $request)
    {
        $NoDuesService = $this->NoDuesService->store($request);

        if ($NoDuesService) {
            return response()->json([
                'success' => 'Detail Stored successfully'
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
        $data = WaterNoDues::findOrFail($id);
        return view('WaterSupplyDepartment.NoDuesCertificate.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $NoDuesService = $this->NoDuesService->update($request, $id);

        if ($NoDuesService) {
            return response()->json([
                'success' => 'Detail updated successfully'
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
