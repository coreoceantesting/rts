<?php

namespace App\Http\Controllers\Trade;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\WaterDepartment\RenewalPlumber\CreateRequest;
use App\Http\Requests\WaterDepartment\RenewalPlumber\UpdateRequest;
use App\Services\Trade\RenewalPlumberService;
use App\Models\WaterDepartment\WaterRenewalOfPlumber;

class RenewalPlumberLicenseController extends Controller
{
    protected $renewalPlumberService;

    public function __construct(RenewalPlumberService $renewalPlumberService)
    {
        $this->renewalPlumberService = $renewalPlumberService;
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
        return view('trade.renewal-plumber-license.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateRequest $request)
    {
        $renewalPlumberService = $this->renewalPlumberService->store($request);

        if ($renewalPlumberService) {
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
        $data = WaterRenewalOfPlumber::findOrFail(decrypt($id));

        return view('trade.renewal-plumber-license.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id)
    {
        $renewalPlumberService = $this->renewalPlumberService->update($request, $id);

        if ($renewalPlumberService) {
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
