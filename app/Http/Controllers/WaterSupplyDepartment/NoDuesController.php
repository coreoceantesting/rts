<?php

namespace App\Http\Controllers\WaterSupplyDepartment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\WaterDepartment\NoDues\CreateRequest;
use App\Http\Requests\WaterDepartment\NoDues\UpdateRequest;
use App\Services\WaterDepartment\NoDuesService;
use App\Models\WaterDepartment\WaterNoDues;
use App\Services\CommonService;

class NoDuesController extends Controller
{
    protected $noDuesService;
    protected $commonService;

    public function __construct(NoDuesService $noDuesService, CommonService $commonService)
    {
        $this->noDuesService = $noDuesService;
        $this->commonService = $commonService;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $wards = $this->commonService->getActiveWard();

        $zones = $this->commonService->getActiveZone();

        return view('water-supply-department.no-dues-certificate.create')->with([
            'wards' => $wards,
            'zones' => $zones,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateRequest $request)
    {
        $noDuesService = $this->noDuesService->store($request);

        if ($noDuesService) {
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
        $data = WaterNoDues::findOrFail(decrypt($id));

        $wards = $this->commonService->getActiveWard();

        $zones = $this->commonService->getActiveZone();

        return view('water-supply-department.no-dues-certificate.edit')->with([
            'data' => $data,
            'wards' => $wards,
            'zones' => $zones,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $noDuesService = $this->noDuesService->update($request, $id);

        if ($noDuesService) {
            return response()->json([
                'success' => 'Detail updated successfully'
            ]);
        } else {
            return response()->json([
                'error' => 'Something went wrong, please try again'
            ]);
        }
    }
}
