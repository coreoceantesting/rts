<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CommonService;
use App\Services\TenstsPermissionService;

class TentsPermissionController extends Controller
{
    protected $commonService;
    protected $tentsperm;

    public function __construct(TenstsPermissionService $tenstsPermissionService, CommonService $commonService)
    {
        $this->tentsperm = $tenstsPermissionService;
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

        return view('tents-permission.create')->with([
            'wards' => $wards,
            'zones' => $zones,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $tenstsPermissionService = $this->tentsperm->store($request);
        //dd($request->all());
        if ($tenstsPermissionService[0]) {
            return response()->json([
                'success' => 'permissions Shooting save successfully'
            ]);
        } else {
            return response()->json([
                'error' => $tenstsPermissionService[1]
            ]);
        }
    }
    public function edit($id)
    {
        // return encrypt($id);
        $tenstsPermissionService = $this->tentsperm->edit(decrypt($id));

        //$permissionshooting = PermissionShooting::findOrFail->edit(decrypt($id));


        $wards = $this->commonService->getActiveWard();

        $zones = $this->commonService->getActiveZone();

        //return $permissionshooting;
        // dd($permissionshooting);
        return view('tents-permission.update')->with([
            'wards' => $wards,
            'zones' => $zones,
            'tenstsPermissionService' => $tenstsPermissionService,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // dd($request->all());
        $tenstsPermissionService = $this->tentsperm->update($request, $id);

        // dd($request->all());
        //  $permissionshooting = PermissionShooting::findOrFail->update($request, $id);
        return response()->json(['success' => 'Park Culture Permission update successfully!']);
    }
}
