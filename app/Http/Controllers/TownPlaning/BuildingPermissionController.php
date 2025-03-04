<?php

namespace App\Http\Controllers\TownPlaning;

use App\Http\Controllers\Controller;
use App\Services\CommonService;
use App\Services\TownPlanning\BuildingPermissionService;
use Illuminate\Http\Request;

class BuildingPermissionController extends Controller
{
    protected $commonService;
    protected $buildingpermission;


    // Constructor for dependency injection
    public function __construct(BuildingPermissionService $buildingpermission, CommonService $commonService)
    {
        $this->buildingpermission = $buildingpermission;
        $this->commonService = $commonService;
    }

    // Display the create form
    public function create()
    {
        // Get active wards and zones from CommonService
        $wards = $this->commonService->getActiveWard();
        $zones = $this->commonService->getActiveZone();

        // Return the create view with wards and zones data
        return view('town-planing.building-permission.create')->with([
            'wards' => $wards,
            'zones' => $zones,
        ]);
    }

    // Store the newly created abattoir license
    public function store(Request $request)
    {

        // Call the store method in the service and get the response
        $buildingpermission = $this->buildingpermission->store($request);
        //  dd($request);

        // dd($request);
        // Check if the license was successfully saved
        if ($buildingpermission[0]) {
            return response()->json([
                'success' => 'Building Permission saved successfully'
            ]);
        } else {
            return response()->json([
                'error' => $buildingpermission[1]
            ]);
        }
    }



    public function edit($id)
    {
    //  return encrypt($id);
        $buildingpermission = $this->buildingpermission->edit(decrypt($id));

        // $advertisementPermission = AdvertisementPermission::find($id);

        //  //return $advertisementPermission;

        $wards = $this->commonService->getActiveWard();

        $zones = $this->commonService->getActiveZone();

        // $data = AdvertisementPermission::findOrFail($id);

        return view('town-planing.building-permission.update')->with([
            'buildingpermission'=>  $buildingpermission,
            'wards' => $wards,
            'zones' => $zones,
            // 'data' => '$data',

            'buildingpermission' => $buildingpermission
        ]);
    }
    public function update(Request $request, $id)
    {
        // dd($request->all());
        $buildingpermission = $this->buildingpermission->update($request, $id);

        if ($buildingpermission) {
            return response()->json([
                'success' => 'Occupancy Certificate updated successfully'
            ]);
        } else {
            return response()->json([
                'error' => 'Something went wrong, please try again'
            ]);
        }
    }
}

