<?php

namespace App\Http\Controllers\Pwd;

use App\Http\Controllers\Controller;
use App\Services\CommonService;
use App\Services\Pwd\GrantingTelecomService;
use Illuminate\Http\Request;

class GrantingTelecomController extends Controller
{
    protected $commonService;
    protected $grantingTelecom;


    // Constructor for dependency injection
    public function __construct(GrantingTelecomService $grantingTelecom, CommonService $commonService)
    {
        $this->grantingTelecom = $grantingTelecom;
        $this->commonService = $commonService;
    }

    // Display the create form
    public function create()
    {
        // Get active wards and zones from CommonService
        $wards = $this->commonService->getActiveWard();
        $zones = $this->commonService->getActiveZone();

        // Return the create view with wards and zones data
        return view('pwd.granting-telecom.create')->with([
            'wards' => $wards,
            'zones' => $zones,
        ]);
    }

    // Store the newly created abattoir license
    public function store(Request $request)
    {

        // Call the store method in the service and get the response
        $grantingTelecom = $this->grantingTelecom->store($request);

        // dd($request);
        // Check if the license was successfully saved
        if ($grantingTelecom[0]) {
            return response()->json([
                'success' => 'Granting Telecommunication saved successfully'
            ]);
        } else {
            return response()->json([
                'error' => $grantingTelecom[1]
            ]);
        }
    }



    public function edit($id)
    {
        //    return encrypt($id);
        $grantingTelecom = $this->grantingTelecom->edit(decrypt($id));

        // $advertisementPermission = AdvertisementPermission::find($id);

        //  //return $advertisementPermission;

        $wards = $this->commonService->getActiveWard();

        $zones = $this->commonService->getActiveZone();

        // $data = AdvertisementPermission::findOrFail($id);

        return view('pwd.granting-telecom.update')->with([
            'grantingTelecom' =>  $grantingTelecom,
            'wards' => $wards,
            'zones' => $zones,
            // 'data' => '$data',

            'advertisemenent' => $grantingTelecom
        ]);
    }
    public function update(Request $request, $id)
    {
        // dd($request->all());
        $grantingTelecom = $this->grantingTelecom->update($request, $id);

        return response()->json(['success' => 'Granting Telecommunication update successfully!']);
    }
}
