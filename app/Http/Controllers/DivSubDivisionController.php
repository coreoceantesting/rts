<?php

namespace App\Http\Controllers;

use App\Services\CommonService;
use Illuminate\Http\Request;
use App\Services\DivSubDivisionService;

class DivSubDivisionController extends Controller
{
    protected $commonService;
    protected $divsubdivision;


    // Constructor for dependency injection
    public function __construct(DivSubDivisionService $division, CommonService $commonService)
    {
        $this->divsubdivision = $division;
        $this->commonService = $commonService;
    }

    // Display the create form
    public function create()
    {
        // Get active wards and zones from CommonService
        $wards = $this->commonService->getActiveWard();
        $zones = $this->commonService->getActiveZone();

        // Return the create view with wards and zones data
        return view('div-sub-division.create')->with([
            'wards' => $wards,
            'zones' => $zones,
        ]);
    }

    // Store the newly created abattoir license
    public function store(Request $request)
    {

        // Call the store method in the service and get the response
        $division = $this->divsubdivision->store($request);

        // dd($request);
        // Check if the license was successfully saved
        if ($division[0]) {
            return response()->json([
                'success' => 'Division Of Property In Sub Division saved successfully'
            ]);
        } else {
            return response()->json([
                'error' => $division[1]
            ]);
        }
    }



    public function edit($id)
    {
        //    return encrypt($id);
        $division = $this->divsubdivision->edit(decrypt($id));

        // $advertisementPermission = AdvertisementPermission::find($id);

        //  //return $advertisementPermission;

        $wards = $this->commonService->getActiveWard();

        $zones = $this->commonService->getActiveZone();

        // $data = AdvertisementPermission::findOrFail($id);

        return view('div-sub-division.update')->with([
            'division' =>  $division,
            'wards' => $wards,
            'zones' => $zones,
            // 'data' => '$data',

            'advertisemenent' => $division
        ]);
    }
    public function update(Request $request, $id)
    {
        // dd($request->all());
        $division = $this->divsubdivision->update($request, $id);

        return response()->json(['success' => 'Division Of Property In Sub Division update successfully!']);
    }
}
