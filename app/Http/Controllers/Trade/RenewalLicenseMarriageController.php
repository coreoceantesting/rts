<?php

namespace App\Http\Controllers\Trade;

use App\Http\Controllers\Controller;
use App\Services\CommonService;
use App\Http\Requests\Trade\RenewMarriageLicense\CreateRequest;
use App\Http\Requests\Trade\RenewMarriageLicense\UpdateRequest;
use App\Services\Trade\RenewLicenseMarriageService;
use Illuminate\Http\Request;

class RenewalLicenseMarriageController extends Controller
{
    protected $commonService;
    protected $renewLicenseMarriage;


    // Constructor for dependency injection
    public function __construct(RenewLicenseMarriageService $renewLicenseMarriage, CommonService $commonService)
    {
        $this->renewLicenseMarriage = $renewLicenseMarriage;
        $this->commonService = $commonService;
    }

    // Display the create form
    public function create()
    {
        // Get active wards and zones from CommonService
        $wards = $this->commonService->getActiveWard();
        $zones = $this->commonService->getActiveZone();
        // Return the create view with wards and zones data
        return view('trade.renew-license-marriage.create')->with([
            'wards' => $wards,
            'zones' => $zones,
        ]);
    }

    // Store the newly created abattoir license
    public function store(CreateRequest $request)
    {

        // Call the store method in the service and get the response
        $renewLicenseMarriage = $this->renewLicenseMarriage->store($request);

        // dd($request);
        // Check if the license was successfully saved
        if ($renewLicenseMarriage[0]) {
            return response()->json([
                'success' => ' Renewal License Marriage saved successfully'
            ]);
        } else {
            return response()->json([
                'error' => $renewLicenseMarriage[1]
            ]);
        }
    }



    public function edit($id)
    {
    //  return encrypt($id);
        $renewLicenseMarriage = $this->renewLicenseMarriage->edit(decrypt($id));

        // $advertisementPermission = AdvertisementPermission::find($id);

        //  //return $advertisementPermission;

        $wards = $this->commonService->getActiveWard();

        $zones = $this->commonService->getActiveZone();

        // $data = AdvertisementPermission::findOrFail($id);

        return view('trade.renew-license-marriage.update')->with([
            'renewLicenseMarriage'=>  $renewLicenseMarriage,
            'wards' => $wards,
            'zones' => $zones,
            // 'data' => '$data',

            'advertisemenent' => $renewLicenseMarriage
        ]);
    }
    public function update(UpdateRequest $request, $id)
    {
        // dd($request->all());
        $renewLicenseMarriage = $this->renewLicenseMarriage->update($request, $id);

        if ($renewLicenseMarriage) {
            return response()->json([
                'success' => 'Renewal License Marriage updated successfully'
            ]);
        } else {
            return response()->json([
                'error' => 'Something went wrong, please try again'
            ]);
        }
}

}
