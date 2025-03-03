<?php

namespace App\Http\Controllers\MedicalHealth;

use App\Http\Controllers\Controller;
use App\Http\Requests\MedicalHealth\GrantNursingLicense\CreateRequest;
use App\Http\Requests\MedicalHealth\GrantNursingLicense\UpdateRequest;
use App\Services\CommonService;
use App\Services\MedicalHealth\GrantNursingLicenseService;
use GuzzleHttp\Promise\Create;
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
    public function store(CreateRequest $request)
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
        //    return encrypt($id);
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
    public function update(UpdateRequest $request, $id)
    {
        // dd($request->all());
        $grantNursingLicense = $this->grantNursingLicense->update($request, $id);

        if ($grantNursingLicense) {
            return response()->json([
                'success' => 'Grant Nursing License updated successfully'
            ]);
        } else {
            return response()->json([
                'error' => 'Something went wrong, please try again'
            ]);
        }
    }
}
