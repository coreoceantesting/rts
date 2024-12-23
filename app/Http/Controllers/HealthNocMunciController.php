<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CommonService;
use App\Services\HealthNocMuniciService;

class HealthNocMunciController extends Controller
{
    protected $commonService;
    protected $healthlicenses;

    public function __construct(HealthNocMuniciService $healthNocmuniciservice, CommonService $commonService)
    {
        $this->healthlicenses = $healthNocmuniciservice;
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


        return view('healthnoc-munici.create')->with([
            'wards' => $wards,
            'zones' => $zones,
        ]);
    }

    public function store(Request $request)
    {
        $healthNocmuniciservice = $this->healthlicenses->store($request);
        // dd($request->all());
        if ($healthNocmuniciservice[0]) {
            return response()->json([
                'success' => 'Stall Board License save successfully'
            ]);
        } else {
            return response()->json([
                'error' => $healthNocmuniciservice[1]
            ]);
        }
    }

    public function edit($id)
    {
        // return encrypt($id);
        $healthNocmuniciservice = $this->healthlicenses->edit(decrypt($id));

        //$permissionshooting = PermissionShooting::findOrFail->edit(decrypt($id));


        $wards = $this->commonService->getActiveWard();

        $zones = $this->commonService->getActiveZone();

        //return $permissionshooting;
        // dd($permissionshooting);
        return view('healthnoc-munici.update')->with([
            'wards' => $wards,
            'zones' => $zones,
            'healthlicenses' => $healthNocmuniciservice,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // dd($request->all());
        $healthNocmuniciservice = $this->healthlicenses->update($request, $id);

        // dd($request->all());
        //  $permissionshooting = PermissionShooting::findOrFail->update($request, $id);
        return response()->json(['success' => 'permission shooting update successfully!']);
    }
}
