<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CommonService;
use App\Services\stallBoardLicenseService;


class StallBoardLicenseController extends Controller
{
    protected $commonService;
    protected $stallboard;

    public function __construct(StallBoardLicenseService $stallboardlicense, CommonService $commonService)
    {
        $this->stallboard = $stallboardlicense;
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


        return view('stallboard-license.create')->with([
            'wards' => $wards,
            'zones' => $zones,
        ]);
    }

    public function store(Request $request)
    {
        $stallboardlicense = $this->stallboard->store($request);
        // dd($request->all());
        if ($stallboardlicense[0]) {
            return response()->json([
                'success' => 'Stall Board License save successfully'
            ]);
        } else {
            return response()->json([
                'error' => $stallboardlicense[1]
            ]);
        }
    }

    public function edit($id)
    {
        // return encrypt($id);
        $stallboardlicense = $this->stallboard->edit(decrypt($id));

        //$permissionshooting = PermissionShooting::findOrFail->edit(decrypt($id));


        $wards = $this->commonService->getActiveWard();

        $zones = $this->commonService->getActiveZone();

        //return $permissionshooting;
        // dd($permissionshooting);
        return view('stallboard-license.update')->with([
            'wards' => $wards,
            'zones' => $zones,
            'stallboard' => $stallboardlicense,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // dd($request->all());
        $stallboardlicense = $this->stallboard->update($request, $id);

        // dd($request->all());
        //  $permissionshooting = PermissionShooting::findOrFail->update($request, $id);
        return response()->json(['success' => 'permission shooting update successfully!']);
    }
}
