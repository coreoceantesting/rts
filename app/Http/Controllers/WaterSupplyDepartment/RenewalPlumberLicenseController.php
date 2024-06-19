<?php

namespace App\Http\Controllers\WaterSupplyDepartment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\WaterDepartment\RenewalPlumber\CreateRequest;
use App\Http\Requests\WaterDepartment\RenewalPlumber\UpdateRequest;
use App\Services\WaterDepartment\RenewalPlumber\RenewalPlumberService;
use App\Models\WaterDepartment\WaterRenewalOfPlumber;

class RenewalPlumberLicenseController extends Controller
{
    protected $RenewalPlumberService;

    public function __construct(RenewalPlumberService $RenewalPlumberService)
    {
        $this->RenewalPlumberService = $RenewalPlumberService;
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
        return view('WaterSupplyDepartment.RenewalPlumberLicense.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateRequest $request)
    {
        $RenewalPlumberService = $this->RenewalPlumberService->store($request);

        if ($RenewalPlumberService) {
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
        $data = WaterRenewalOfPlumber::findOrFail($id);
        return view('WaterSupplyDepartment.RenewalPlumberLicense.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id)
    {
        $RenewalPlumberService = $this->RenewalPlumberService->update($request, $id);

        if ($RenewalPlumberService) {
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
