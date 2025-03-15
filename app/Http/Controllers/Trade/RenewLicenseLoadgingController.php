<?php

namespace App\Http\Controllers\Trade;

use App\Http\Controllers\Controller;
use App\Http\Requests\Trade\RenewLicenseLoadging\CreateRequest;
use App\Http\Requests\Trade\RenewLicenseLoadging\UpdateRequest;
use App\Services\CommonService;
use App\Services\Trade\RenewLicenseLoadgingService;
use Illuminate\Http\Request;

class RenewLicenseLoadgingController extends Controller
{
    protected $commonService;
    protected $renewLicenseLoadging;


    // Constructor for dependency injection
    public function __construct(RenewLicenseLoadgingService $renewLicenseLoadging, CommonService $commonService)
    {
        $this->renewLicenseLoadging = $renewLicenseLoadging;
        $this->commonService = $commonService;
    }

    // Display the create form
    public function create()
    {
        // Get active wards and zones from CommonService
        $wards = $this->commonService->getActiveWard();
        $zones = $this->commonService->getActiveZone();

        // Return the create view with wards and zones data
        return view('trade.renew-license-loadging.create')->with([
            'wards' => $wards,
            'zones' => $zones,
        ]);
    }

    // Store the newly created abattoir license
    public function store(CreateRequest $request)
    {
        // dd($request);
        // Call the store method in the service and get the response
        $renewLicenseLoadging = $this->renewLicenseLoadging->store($request);

        // dd($request);
        // Check if the license was successfully saved
        if ($renewLicenseLoadging[0]) {
            return response()->json([
                'success' => 'Renew License Loading House saved successfully'
            ]);
        } else {
            return response()->json([
                'error' => $renewLicenseLoadging[1]
            ]);
        }
    }



    public function edit($id)
    {
        //  return encrypt($id);
        $renewLicenseLoadging = $this->renewLicenseLoadging->edit(decrypt($id));

        // $advertisementPermission = AdvertisementPermission::find($id);

        //  //return $advertisementPermission;

        $wards = $this->commonService->getActiveWard();

        $zones = $this->commonService->getActiveZone();

        // $data = AdvertisementPermission::findOrFail($id);

        return view('trade.renew-license-loadging.update')->with([
            'renewLicenseLoadging' =>  $renewLicenseLoadging,
            'wards' => $wards,
            'zones' => $zones,
            // 'data' => '$data',

            'advertisemenent' => $renewLicenseLoadging
        ]);
    }
    public function update(UpdateRequest $request, $id)
    {
        // dd($request->all());
        $trade = $this->renewLicenseLoadging->update($request, $id);

        if ($trade) {
            return response()->json([
                'success' => 'Renew License Loading House updated successfully'
            ]);
        } else {
            return response()->json([
                'error' => 'Something went wrong, please try again'
            ]);
        }
    }
}
