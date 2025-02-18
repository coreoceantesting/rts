<?php

namespace App\Http\Controllers\Trade;

use App\Http\Controllers\Controller;
use App\Services\CommonService;
use App\Services\Trade\LicenseLoadgingService;
use Illuminate\Http\Request;

class LicenseLoadgingHouseController extends Controller
{
    protected $commonService;
    protected $licenseLoadgingHouse;


    // Constructor for dependency injection
    public function __construct(LicenseLoadgingService $licenseLoadgingHouse, CommonService $commonService)
    {
        $this->licenseLoadgingHouse = $licenseLoadgingHouse;
        $this->commonService = $commonService;
    }

    // Display the create form
    public function create()
    {
        // Get active wards and zones from CommonService
        $wards = $this->commonService->getActiveWard();
        $zones = $this->commonService->getActiveZone();

        // Return the create view with wards and zones data
        return view('trade.license-loadging.create')->with([
            'wards' => $wards,
            'zones' => $zones,
        ]);
    }

    // Store the newly created abattoir license
    public function store(Request $request)
    {

        // Call the store method in the service and get the response
        $licenseLoadgingHouse = $this->licenseLoadgingHouse->store($request);

        // dd($request);
        // Check if the license was successfully saved
        if ($licenseLoadgingHouse[0]) {
            return response()->json([
                'success' => 'New License Loading House saved successfully'
            ]);
        } else {
            return response()->json([
                'error' => $licenseLoadgingHouse[1]
            ]);
        }
    }



    public function edit($id)
    {
    // return encrypt($id);
        $licenseLoadgingHouse = $this->licenseLoadgingHouse->edit(decrypt($id));

        // $advertisementPermission = AdvertisementPermission::find($id);

        //  //return $advertisementPermission;

        $wards = $this->commonService->getActiveWard();

        $zones = $this->commonService->getActiveZone();

        // $data = AdvertisementPermission::findOrFail($id);

        return view('trade.license-loadging.update')->with([
            'licenseLoadgingHouse'=>  $licenseLoadgingHouse,
            'wards' => $wards,
            'zones' => $zones,
            // 'data' => '$data',

            'advertisemenent' => $licenseLoadgingHouse
        ]);
    }
    public function update(Request $request, $id)
    {
        // dd($request->all());
        $trade = $this->licenseLoadgingHouse->update($request, $id);

        return response()->json(['success' => 'New License Loading House update successfully!']);
    }
}
