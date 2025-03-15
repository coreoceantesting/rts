<?php

namespace App\Http\Controllers;

use App\Http\Requests\HoardingPermission\CreateRequest;
use App\Http\Requests\HoardingPermission\UpdateRequest;
use Illuminate\Http\Request;
use App\Services\CommonService;
use App\Services\HoardingPermissionService;
use App\Models\HoardingPermission;


class HoardingPermissionController extends Controller
{
    protected $commonService;
    protected $HoardingPermissionService;


    public function __construct(HoardingPermissionService $hoardingPermission, CommonService $commonService)
    {
        $this->HoardingPermissionService = $hoardingPermission;
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

        return view('hoarding-permission.create')->with([
            'wards' => $wards,
            'zones' => $zones,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateRequest $request)
    {
        //dd($request->all());
        $hoardingPermission = $this->HoardingPermissionService->store($request);

        if ($hoardingPermission[0]) {
            return response()->json([
                'success' => 'Hoarding Permission save successfully'
            ]);
        } else {
            return response()->json([
                'error' => $hoardingPermission[1]
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

        $hoardingPermission = $this->HoardingPermissionService->edit(decrypt($id));

        $wards = $this->commonService->getActiveWard();

        $zones = $this->commonService->getActiveZone();

        return view('hoarding-permission.update')->with([
            'wards' => $wards,
            'zones' => $zones,
            'hoardingPermission' => $hoardingPermission,

        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, $id)
    {
        $hoardingPermission = $this->HoardingPermissionService->update($request, $id);

      if ($hoardingPermission) {
        return response()->json([
            'success' => 'Hoarding Permission updated successfully'
        ]);
    } else {
        return response()->json([
            'error' => 'Something went wrong, please try again'
        ]);
    }
}

}
