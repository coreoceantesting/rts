<?php

namespace App\Http\Controllers;

use App\Models\GardensFilming;
use Illuminate\Http\Request;
use App\Services\CommonService;
use App\Services\GardensFilmingService;


class GardensFilmingController extends Controller
{
    protected $commonService;
    protected $gardnesfilmingservice;


    public function __construct(GardensFilmingService $gardnesfilmings, CommonService $commonService)
    {
        $this->gardnesfilmingservice = $gardnesfilmings;
        $this->commonService = $commonService;
    }

    public function create()
    {
        $wards = $this->commonService->getActiveWard();


        $zones = $this->commonService->getActiveZone();

        return view('gardens-filming.create')->with([
            'wards' => $wards,
            'zones' => $zones,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $gardnesfilmings = $this->gardnesfilmingservice->store($request);
        //dd($request->all());
        if ($gardnesfilmings[0]) {
            return response()->json([
                'success' => 'permissions Shooting save successfully'
            ]);
        } else {
            return response()->json([
                'error' => $gardnesfilmings[1]
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // return encrypt($id);
        $gardnesfilmings = $this->gardnesfilmingservice->edit(decrypt($id));

        //$permissionshooting = PermissionShooting::findOrFail->edit(decrypt($id));


        $wards = $this->commonService->getActiveWard();

        $zones = $this->commonService->getActiveZone();

        //return $permissionshooting;
        // dd($permissionshooting);
        return view('gardens-filming.update')->with([
            'wards' => $wards,
            'zones' => $zones,
            'gardnesfilmings' => $gardnesfilmings,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // dd($request->all());
        $gardnesfilmings = $this->gardnesfilmingservice->update($request, $id);

        // dd($request->all());
        //  $permissionshooting = PermissionShooting::findOrFail->update($request, $id);
        return response()->json(['success' => 'permission shooting update successfully!']);
    }
}
