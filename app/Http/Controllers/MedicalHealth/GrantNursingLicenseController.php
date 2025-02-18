<?php

namespace App\Http\Controllers\MedicalHealth;

use App\Http\Controllers\Controller;
use App\Services\CommonService;
use App\Services\MedicalHealth\GrantNursingLicenseService;
use Illuminate\Http\Request;


class GrantNursingLicenseController extends Controller
{
    protected $commonService;
    protected $grantNursingLicense;


    // Constructor for dependency injection
    public function __construct(GrantNursingLicenseService $grantNursingLicense, CommonService $commonService)
    {
        $this->grantNursingLicense = $grantNursingLicense;
        $this->commonService = $commonService;
    }

    // Display the create form
    public function create()
    {
        // Get active wards and zones from CommonService
        $wards = $this->commonService->getActiveWard();
        $zones = $this->commonService->getActiveZone();

        // Return the create view with wards and zones data
        return view('medical-health.grantnursing-license.create')->with([
            'wards' => $wards,
            'zones' => $zones,
        ]);
    }

    // Store the newly created abattoir license
    public function store(Request $request)
    {

        // Call the store method in the service and get the response
        $grantNursingLicense = $this->grantNursingLicense->store($request);

        // dd($request);
        // Check if the license was successfully saved
        if ($grantNursingLicense[0]) {
            return response()->json([
                'success' => 'Grant Nursing License saved successfully'
            ]);
        } else {
            return response()->json([
                'error' => $grantNursingLicense[1]
            ]);
        }
    }



    public function edit($id)
    {
        //   return encrypt($id);
        $grantNursingLicense = $this->grantNursingLicense->edit(decrypt($id));

        // $advertisementPermission = AdvertisementPermission::find($id);

        //  //return $advertisementPermission;

        $wards = $this->commonService->getActiveWard();

        $zones = $this->commonService->getActiveZone();

        // $data = AdvertisementPermission::findOrFail($id);

        return view('medical-health.grantnursing-license.update')->with([
            'grantNursingLicense' =>  $grantNursingLicense,
            'wards' => $wards,
            'zones' => $zones,
            // 'data' => '$data',

            'advertisemenent' => $grantNursingLicense
        ]);
    }
    public function update(Request $request, $id)
    {
        // dd($request->all());
        $grantNursingLicense = $this->grantNursingLicense->update($request, $id);

        return response()->json(['success' => 'Grant Nursing License update successfully!']);
    }
}
