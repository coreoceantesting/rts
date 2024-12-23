<?php

namespace App\Http\Controllers;

use App\Models\PermissionShooting;
use Illuminate\Http\Request;
use App\Services\CommonService;
use App\Services\PermissionShootingService;

class PermissionShootingController extends Controller
{


    protected $commonService;
    protected $permissionShootingService;

    public function __construct(PermissionShootingService $permissionShootingService, CommonService $commonService)
    {
        $this->permissionShootingService = $permissionShootingService;
        $this->commonService = $commonService;
    }



    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $wards = $this->commonService->getActiveWard();


        $zones = $this->commonService->getActiveZone();

        return view('permission-shooting.create')->with([
            'wards' => $wards,
            'zones' => $zones,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $PermissionShootingService = $this->permissionShootingService->store($request);
        //dd($request->all());
        if ($PermissionShootingService[0]) {
            return response()->json([
                'success' => 'permissions Shooting save successfully'
            ]);
        } else {
            return response()->json([
                'error' => $PermissionShootingService[1]
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(PermissionShooting $permissionShooting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // return encrypt($id);
        $permissionshooting = $this->permissionShootingService->edit(decrypt($id));

        //$permissionshooting = PermissionShooting::findOrFail->edit(decrypt($id));


        $wards = $this->commonService->getActiveWard();

        $zones = $this->commonService->getActiveZone();

        //return $permissionshooting;
        // dd($permissionshooting);
        return view('permission-shooting.update')->with([
            'wards' => $wards,
            'zones' => $zones,
            'permissionshooting' => $permissionshooting,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // dd($request->all());
        $permissionShootingService = $this->permissionShootingService->update($request, $id);

        // dd($request->all());
        //  $permissionshooting = PermissionShooting::findOrFail->update($request, $id);
        return response()->json(['success' => 'permission shooting update successfully!']);
    }
}
