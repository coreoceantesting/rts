<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CommonService;
use App\Services\AdvertisementPermissionService;
use App\Models\AdvertisementPermission;


class AdvertisementPermissionController extends Controller
{
    protected $commonService;
    protected $advertisemenentpermission;


    // Constructor for dependency injection
    public function __construct(AdvertisementPermissionService $advertisemenent, CommonService $commonService)
    {
        $this->advertisemenentpermission = $advertisemenent;
        $this->commonService = $commonService;
    }

    // Display the create form
    public function create()
    {
        // Get active wards and zones from CommonService
        $wards = $this->commonService->getActiveWard();
        $zones = $this->commonService->getActiveZone();

        // Return the create view with wards and zones data
        return view('advertisement-permission.create')->with([
            'wards' => $wards,
            'zones' => $zones,
        ]);
    }

    // Store the newly created abattoir license
    public function store(Request $request)
    {

        // Call the store method in the service and get the response
        $advertisemenent = $this->advertisemenentpermission->store($request);

        // Check if the license was successfully saved
        if ($advertisemenent[0]) {
            return response()->json([
                'success' => 'Abattoir License saved successfully'
            ]);
        } else {
            return response()->json([
                'error' => $advertisemenent[1]
            ]);
        }
    }



    public function edit($id)
    {
        //return encrypt($id);
        $advertisemenent = $this->advertisemenentpermission->edit(decrypt($id));

        // $advertisementPermission = AdvertisementPermission::find($id);

        //  //return $advertisementPermission;

        $wards = $this->commonService->getActiveWard();

        $zones = $this->commonService->getActiveZone();

        // $data = AdvertisementPermission::findOrFail($id);

        return view('advertisement-permission.update')->with([
            'wards' => $wards,
            'zones' => $zones,
            // 'data' => '$data',

            'advertisemenent' => $advertisemenent
        ]);
    }
    public function update(Request $request, $id)
    {
        // dd($request->all());
        $advertisemenent = $this->advertisemenentpermission->update($request, $id);

        return response()->json(['success' => 'Health License update successfully!']);
    }
}
