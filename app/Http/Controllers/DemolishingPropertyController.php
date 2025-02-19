<?php

namespace App\Http\Controllers;

use App\Services\CommonService;
use Illuminate\Http\Request;
use App\Services\DemolishingPropertyService;


class DemolishingPropertyController extends Controller
{
    protected $commonService;
    protected $demolishingproperty;


    // Constructor for dependency injection
    public function __construct(DemolishingPropertyService $demolishingprop, CommonService $commonService)
    {
        $this->demolishingproperty = $demolishingprop;
        $this->commonService = $commonService;
    }

    // Display the create form
    public function create()
    {
        // Get active wards and zones from CommonService
        $wards = $this->commonService->getActiveWard();
        $zones = $this->commonService->getActiveZone();

        // Return the create view with wards and zones data
        return view('demolishing-property.create')->with([
            'wards' => $wards,
            'zones' => $zones,
        ]);
    }

    // Store the newly created abattoir license
    public function store(Request $request)
    {

        // Call the store method in the service and get the response
        $demolishingprop = $this->demolishingproperty->store($request);

        // dd($request);
        // Check if the license was successfully saved
        if ($demolishingprop[0]) {
            return response()->json([
                'success' => 'Demolishing and Reconstrction saved successfully'
            ]);
        } else {
            return response()->json([
                'error' => $demolishingprop[1]
            ]);
        }
    }



    public function edit($id)
    {
    // return encrypt($id);
        $demolishingprop = $this->demolishingproperty->edit(decrypt($id));

        // $advertisementPermission = AdvertisementPermission::find($id);

        //  //return $advertisementPermission;

        $wards = $this->commonService->getActiveWard();

        $zones = $this->commonService->getActiveZone();

        // $data = AdvertisementPermission::findOrFail($id);

        return view('demolishing-property.update')->with([
            'demolishingprop'=>  $demolishingprop,
            'wards' => $wards,
            'zones' => $zones,
            // 'data' => '$data',

            'advertisemenent' => $demolishingprop
        ]);
    }
    public function update(Request $request, $id)
    {
        // dd($request->all());
        $demolishingprop = $this->demolishingproperty->update($request, $id);

        return response()->json(['success' => 'Demolishing and Reconstrction update successfully!']);
    }
}
