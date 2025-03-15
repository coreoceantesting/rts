<?php

namespace App\Http\Controllers\TownPlaning;

 use App\Http\Requests\TownPlanning\OccupancyCertificate\CreateRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\TownPlanning\OccupancyCertificate\UpdateRequest;
use App\Services\CommonService;
use App\Services\TownPlanning\OccupancyCertificateService;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;

class OccupancyCetificateController extends Controller
{
    protected $commonService;
    protected $occupancyCertificateService;


    // Constructor for dependency injection
    public function __construct(OccupancyCertificateService $occupancyCertificateService, CommonService $commonService)
    {
        $this->occupancyCertificateService = $occupancyCertificateService;
        $this->commonService = $commonService;
    }

    // Display the create form
    public function create()
    {
        // Get active wards and zones from CommonService
        $wards = $this->commonService->getActiveWard();
        $zones = $this->commonService->getActiveZone();

        // Return the create view with wards and zones data
        return view('town-planing.occupancy-certificate.create')->with([
            'wards' => $wards,
            'zones' => $zones,
        ]);
    }

    // Store the newly created abattoir license
    public function store(CreateRequest $request)
    {

        // Call the store method in the service and get the response
        $occupancyCertificateService = $this->occupancyCertificateService->store($request);

        // dd($request);
        // Check if the license was successfully saved
        if ($occupancyCertificateService[0]) {
            return response()->json([
                'success' => 'Occupancy Certificate saved successfully'
            ]);
        } else {
            return response()->json([
                'error' => $occupancyCertificateService[1]
            ]);
        }
    }



    public function edit($id)
    {
    //  return encrypt($id);
        $occupancyCertificateService = $this->occupancyCertificateService->edit(decrypt($id));

        // $advertisementPermission = AdvertisementPermission::find($id);

        //  //return $advertisementPermission;

        $wards = $this->commonService->getActiveWard();

        $zones = $this->commonService->getActiveZone();

        // $data = AdvertisementPermission::findOrFail($id);

        return view('town-planing.occupancy-certificate.update')->with([
            'occupancyCertificateService'=>  $occupancyCertificateService,
            'wards' => $wards,
            'zones' => $zones,
            // 'data' => '$data',

            'occupancyCertificateService' => $occupancyCertificateService
        ]);
    }
    public function update(UpdateRequest $request, $id)
    {
        $occupancyCertificateService = $this->occupancyCertificateService->update($request, $id);

        if ($occupancyCertificateService) {
            return response()->json([
                'success' => 'Occupancy Certificate updated successfully'
            ]);
        } else {
            return response()->json([
                'error' => 'Something went wrong, please try again'
            ]);
        }
    }
}
