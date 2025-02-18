<?php

namespace App\Http\Controllers\MedicalHealth;

use App\Http\Controllers\Controller;
use App\Services\CommonService;
use App\Services\MedicalHealth\RenewalNursingLicenseService;
use Illuminate\Http\Request;

class RenewalNursingLicenseController extends Controller
{
    protected $commonService;
    protected $renewNursingLicense;


    // Constructor for dependency injection
    public function __construct(RenewalNursingLicenseService $renewNursingLicense, CommonService $commonService)
    {
        $this->renewNursingLicense = $renewNursingLicense;
        $this->commonService = $commonService;
    }

    // Display the create form
    public function create()
    {
        // Get active wards and zones from CommonService
        $wards = $this->commonService->getActiveWard();
        $zones = $this->commonService->getActiveZone();

        // Return the create view with wards and zones data
        return view('medical-health.renewnursing-license.create')->with([
            'wards' => $wards,
            'zones' => $zones,
        ]);
    }

    // Store the newly created abattoir license
    public function store(Request $request)
    {

        // Call the store method in the service and get the response
        $renewNursingLicense = $this->renewNursingLicense->store($request);

        // dd($request);
        // Check if the license was successfully saved
        if ($renewNursingLicense[0]) {
            return response()->json([
                'success' => 'Renewal Nursing License saved successfully'
            ]);
        } else {
            return response()->json([
                'error' => $renewNursingLicense[1]
            ]);
        }
    }



    public function edit($id)
    {
    //    return encrypt($id);
        $renewNursingLicense = $this->renewNursingLicense->edit(decrypt($id));

        // $advertisementPermission = AdvertisementPermission::find($id);

        //  //return $advertisementPermission;

        $wards = $this->commonService->getActiveWard();

        $zones = $this->commonService->getActiveZone();

        // $data = AdvertisementPermission::findOrFail($id);

        return view('medical-health.renewnursing-license.update')->with([
            'renewNursingLicense' =>  $renewNursingLicense,
            'wards' => $wards,
            'zones' => $zones,
            // 'data' => '$data',

            'advertisemenent' => $renewNursingLicense
        ]);
    }
    public function update(Request $request, $id)
    {
        // dd($request->all());
        $renewNursingLicense = $this->renewNursingLicense->update($request, $id);

        return response()->json(['success' => 'Renewal Nursing License update successfully!']);
    }
}
