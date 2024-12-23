<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CommonService;
use App\Http\Requests\AbattoirLicense\CreateRequest;
use App\Models\AbattoirLicense;
use App\Services\AbattoirLicenseService;

class AbattoirLicenseController extends Controller
{
    protected $commonService;
    protected $abattoirLicenseService;


    // Constructor for dependency injection
    public function __construct(AbattoirLicenseService $abattoirLicense, CommonService $commonService)
    {
        $this->abattoirLicenseService = $abattoirLicense;
        $this->commonService = $commonService;
    }

    // Display the create form
    public function create()
    {
        // Get active wards and zones from CommonService
        $wards = $this->commonService->getActiveWard();
        $zones = $this->commonService->getActiveZone();

        // Return the create view with wards and zones data
        return view('abattoir-license.create')->with([
            'wards' => $wards,
            'zones' => $zones,
        ]);
    }

    // Store the newly created abattoir license
    public function store(Request $request)
    {
        // Call the store method in the service and get the response
        $abattoirLicense = $this->abattoirLicenseService->store($request);

        // Check if the license was successfully saved
        if ($abattoirLicense[0]) {
            return response()->json([
                'success' => 'Abattoir License saved successfully'
            ]);
        } else {
            return response()->json([
                'error' => $abattoirLicense[1]
            ]);
        }
    }



    public function edit($id)
    {
        //return encrypt($id);
        $abattoirLicense = $this->abattoirLicenseService->edit(decrypt($id));

        // $advertisementPermission = AdvertisementPermission::find($id);

        //  //return $advertisementPermission;

        $wards = $this->commonService->getActiveWard();

        $zones = $this->commonService->getActiveZone();

        return view('abattoir-license.update')->with([
            'wards' => $wards,
            'zones' => $zones,
            'abattoirLicense' => $abattoirLicense
        ]);
    }
    public function update(Request $request, $id)
    {
        // dd($request->all());
        $abattoirLicense = $this->abattoirLicenseService->update($request, $id);

        return response()->json(['success' => 'Health License update successfully!']);
    }
}
