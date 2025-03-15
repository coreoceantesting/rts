<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Services\CommonService;
use App\Services\ParkCultureService;

class ParkCulturePermissionController extends Controller
{
    protected $commonService;
    protected $parkculture;

    public function __construct(ParkCultureService $parkculturepermission, CommonService $commonService)
    {
        $this->parkculture = $parkculturepermission;
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

        return view('park-culture.create')->with([
            'wards' => $wards,
            'zones' => $zones,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $parkculturepermission = $this->parkculture->store($request);
        //dd($request->all());
        if ($parkculturepermission[0]) {
            return response()->json([
                'success' => 'permissions Shooting save successfully'
            ]);
        } else {
            return response()->json([
                'error' => $parkculturepermission[1]
            ]);
        }
    }
    public function edit($id)
    {
        // return encrypt($id);
        $parkculturepermission = $this->parkculture->edit(decrypt($id));

        //$permissionshooting = PermissionShooting::findOrFail->edit(decrypt($id));


        $wards = $this->commonService->getActiveWard();

        $zones = $this->commonService->getActiveZone();

        //return $permissionshooting;
        // dd($permissionshooting);
        return view('park-culture.update')->with([
            'wards' => $wards,
            'zones' => $zones,
            'parkculturepermission' => $parkculturepermission,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // dd($request->all());
        $parkculturepermission = $this->parkculture->update($request, $id);

        // dd($request->all());
        //  $permissionshooting = PermissionShooting::findOrFail->update($request, $id);
        return response()->json(['success' => 'Park Culture Permission update successfully!']);
    }
}
