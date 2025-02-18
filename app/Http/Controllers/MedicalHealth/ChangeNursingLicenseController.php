<?php

namespace App\Http\Controllers\MedicalHealth;

use App\Http\Controllers\Controller;
use App\Services\CommonService;
use App\Services\MedicalHealth\ChangeNursingLicenseService;
use Illuminate\Http\Request;

class ChangeNursingLicenseController extends Controller
{
    protected $commonService;
    protected $changeNursingLicense;


    // Constructor for dependency injection
    public function __construct(ChangeNursingLicenseService $changeNursingLicense, CommonService $commonService)
    {
        $this->changeNursingLicense = $changeNursingLicense;
        $this->commonService = $commonService;
    }

    // Display the create form
    public function create()
    {
        // Get active wards and zones from CommonService
        $wards = $this->commonService->getActiveWard();
        $zones = $this->commonService->getActiveZone();

        // Return the create view with wards and zones data
        return view('medical-health.changenursing-license.create')->with([
            'wards' => $wards,
            'zones' => $zones,
        ]);
    }

    // Store the newly created abattoir license
    public function store(Request $request)
    {

        // Call the store method in the service and get the response
        $changeNursingLicense = $this->changeNursingLicense->store($request);

        // dd($request);
        // Check if the license was successfully saved
        if ($changeNursingLicense[0]) {
            return response()->json([
                'success' => 'Change Nursing License saved successfully'
            ]);
        } else {
            return response()->json([
                'error' => $changeNursingLicense[1]
            ]);
        }
    }



    public function edit($id)
    {
        //   return encrypt($id);
        $changeNursingLicense = $this->changeNursingLicense->edit(decrypt($id));

        // $advertisementPermission = AdvertisementPermission::find($id);

        //  //return $advertisementPermission;

        $wards = $this->commonService->getActiveWard();

        $zones = $this->commonService->getActiveZone();

        // $data = AdvertisementPermission::findOrFail($id);

        return view('medical-health.changenursing-license.update')->with([
            'changeNursingLicense' =>  $changeNursingLicense,
            'wards' => $wards,
            'zones' => $zones,
            // 'data' => '$data',

            'advertisemenent' => $changeNursingLicense
        ]);
    }
    public function update(Request $request, $id)
    {
        // dd($request->all());
        $changeNursingLicense = $this->changeNursingLicense->update($request, $id);

        return response()->json(['success' => 'Change Nursing License update successfully!']);
    }
}
