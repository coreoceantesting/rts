<?php

namespace App\Http\Controllers\Trade;

use App\Http\Controllers\Controller;
use App\Services\CommonService;
use App\Services\Trade\IssuanceLicenseMarriageService;
use Illuminate\Http\Request;

class IssuanceLicenseMarriageController extends Controller
{
    protected $commonService;
    protected $issueLicenseMarriage;


    // Constructor for dependency injection
    public function __construct(IssuanceLicenseMarriageService $issueLicenseMarriage, CommonService $commonService)
    {
        $this->issueLicenseMarriage = $issueLicenseMarriage;
        $this->commonService = $commonService;
    }

    // Display the create form
    public function create()
    {
        // Get active wards and zones from CommonService
        $wards = $this->commonService->getActiveWard();
        $zones = $this->commonService->getActiveZone();

        // Return the create view with wards and zones data
        return view('trade.issuance-marriage.create')->with([
            'wards' => $wards,
            'zones' => $zones,
        ]);
    }

    // Store the newly created abattoir license
    public function store(Request $request)
    {

        // Call the store method in the service and get the response
        $issueLicenseMarriage = $this->issueLicenseMarriage->store($request);

        // dd($request);
        // Check if the license was successfully saved
        if ($issueLicenseMarriage[0]) {
            return response()->json([
                'success' => 'Issuance  Marriage License saved successfully'
            ]);
        } else {
            return response()->json([
                'error' => $issueLicenseMarriage[1]
            ]);
        }
    }



    public function edit($id)
    {
            //    return encrypt($id);
        $issueLicenseMarriage = $this->issueLicenseMarriage->edit(decrypt($id));

        // $advertisementPermission = AdvertisementPermission::find($id);

        //  //return $advertisementPermission;

        $wards = $this->commonService->getActiveWard();

        $zones = $this->commonService->getActiveZone();

        // $data = AdvertisementPermission::findOrFail($id);

        return view('trade.issuance-marriage.update')->with([
            'issueLicenseMarriage'=>  $issueLicenseMarriage,
            'wards' => $wards,
            'zones' => $zones,
            // 'data' => '$data',

            'advertisemenent' => $issueLicenseMarriage
        ]);
    }
    public function update(Request $request, $id)
    {
        // dd($request->all());
        $trade = $this->issueLicenseMarriage->update($request, $id);

        return response()->json(['success' => 'Issuance  Marriage License update successfully!']);
    }
}
