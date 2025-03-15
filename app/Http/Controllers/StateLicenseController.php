<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CommonService;
use App\Services\StateLicenseService;


class StateLicenseController extends Controller
{
    protected $commonService;
    protected $statelicenseservice;

    public function __construct(StateLicenseService $statelicense, CommonService $commonService)
    {
        $this->statelicenseservice = $statelicense;
        $this->commonService = $commonService;
    }

    public function index()
    {
        //
    }


    public function create()
    {
        $wards = $this->commonService->getActiveWard();


        $zones = $this->commonService->getActiveZone();


        return view('state-license.create')->with([
            'wards' => $wards,
            'zones' => $zones,
        ]);
    }

    public function store(Request $request)
    {
        $statelicense = $this->statelicenseservice->store($request);
        // dd($request->all());
        if ($statelicense[0]) {
            return response()->json([
                'success' => 'State License save successfully'
            ]);
        } else {
            return response()->json([
                'error' => $statelicense[1]
            ]);
        }
    }

    public function edit($id)
    {
        // return encrypt($id);
        $statelicense = $this->statelicenseservice->edit(decrypt($id));

        //$permissionshooting = PermissionShooting::findOrFail->edit(decrypt($id));


        $wards = $this->commonService->getActiveWard();

        $zones = $this->commonService->getActiveZone();

        //return $permissionshooting;
        // dd($permissionshooting);
        return view('state-license.update')->with([
            'wards' => $wards,
            'zones' => $zones,
            'statelicenseservice' => $statelicense,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // dd($request->all());
        $statelicense = $this->statelicenseservice->update($request, $id);

        // dd($request->all());
        //  $permissionshooting = PermissionShooting::findOrFail->update($request, $id);
        return response()->json(['success' => 'State License update successfully!']);
    }
}
