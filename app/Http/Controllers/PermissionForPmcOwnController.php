<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CommonService;
use App\Services\PermissionForPmcOwnService;



class PermissionForPmcOwnController extends Controller
{
    protected $commonService;
    protected $permissionforpmc;

    public function __construct(PermissionForPmcOwnService $permissionforpmcown, CommonService $commonService)
    {
        $this->permissionforpmc = $permissionforpmcown;
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

        return view('pmc-owned.create')->with([
            'wards' => $wards,
            'zones' => $zones,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $permissionforpmcown = $this->permissionforpmc->store($request);
        //dd($request->all());
        if ($permissionforpmcown[0]) {
            return response()->json([
                'success' => 'permissions Shooting save successfully'
            ]);
        } else {
            return response()->json([
                'error' => $permissionforpmcown[1]
            ]);
        }
    }
    public function edit($id)
    {
        // return encrypt($id);
        $permissionforpmcown = $this->permissionforpmc->edit(decrypt($id));

        //$permissionshooting = PermissionShooting::findOrFail->edit(decrypt($id));


        $wards = $this->commonService->getActiveWard();

        $zones = $this->commonService->getActiveZone();

        //return $permissionshooting;
        // dd($permissionshooting);
        return view('pmc-owned.update')->with([
            'wards' => $wards,
            'zones' => $zones,
            'permissionforpmcown' => $permissionforpmcown,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // dd($request->all());
        $permissionforpmcown = $this->permissionforpmc->update($request, $id);

        // dd($request->all());
        //  $permissionshooting = PermissionShooting::findOrFail->update($request, $id);
        return response()->json(['success' => 'Park Culture Permission update successfully!']);
    }
}
