<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CommonService;
use App\Services\MovableAdvertisementService;

class MovableAdvertisementPermissionController extends Controller
{
    protected $commonService;
    protected $movableadvertise;



    public function __construct(MovableAdvertisementService $movableadvertisementservice, CommonService $commonService)
    {
        $this->movableadvertise = $movableadvertisementservice;
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

        return view('movable-advertisement.create')->with([
            'wards' => $wards,
            'zones' => $zones,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $movableadvertisementservice = $this->movableadvertise->store($request);
        //dd($request->all());
        if ($movableadvertisementservice[0]) {
            return response()->json([
                'success' => 'permissions Shooting save successfully'
            ]);
        } else {
            return response()->json([
                'error' => $movableadvertisementservice[1]
            ]);
        }
    }
    public function edit($id)
    {
        // return encrypt($id);
        $movableadvertisementservice = $this->movableadvertise->edit(decrypt($id));

        //$permissionshooting = PermissionShooting::findOrFail->edit(decrypt($id));


        $wards = $this->commonService->getActiveWard();

        $zones = $this->commonService->getActiveZone();

        //return $permissionshooting;
        // dd($permissionshooting);
        return view('movable-advertisement.update')->with([
            'wards' => $wards,
            'zones' => $zones,
            'movableadvertisementservice' => $movableadvertisementservice,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // dd($request->all());
        $movableadvertisementservice = $this->movableadvertise->update($request, $id);

        // dd($request->all());
        //  $permissionshooting = PermissionShooting::findOrFail->update($request, $id);
        return response()->json(['success' => 'Mobile Tower Permission update successfully!']);
    }
}
