<?php

namespace App\Http\Controllers\Nulm;

use App\Http\Controllers\Controller;
use App\Http\Requests\Nulm\HawkerRegister\CreateRequest;
use App\Http\Requests\Nulm\HawkerRegister\UpdateRequest;
use App\Services\CommonService;
use App\Services\Nulm\HawkerRegisterService;
use Illuminate\Http\Request;

class HawkerRegisterController extends Controller
{
    protected $commonService;
    protected $hawkerRegister;


    // Constructor for dependency injection
    public function __construct(HawkerRegisterService $hawkerRegister, CommonService $commonService)
    {
        $this->hawkerRegister = $hawkerRegister;
        $this->commonService = $commonService;
    }

    // Display the create form
    public function create()
    {
        // Get active wards and zones from CommonService
        $wards = $this->commonService->getActiveWard();
        $zones = $this->commonService->getActiveZone();

        // Return the create view with wards and zones data
        return view('nulm.hawkerregister.create')->with([
            'wards' => $wards,
            'zones' => $zones,
        ]);
    }

    // Store the newly created abattoir license
    public function store(CreateRequest $request)
    {

        // Call the store method in the service and get the response
        $hawkerRegister = $this->hawkerRegister->store($request);

        // dd($request);
        // Check if the license was successfully saved
        if ($hawkerRegister[0]) {
            return response()->json([
                'success' => 'Hawker Register saved successfully'
            ]);
        } else {
            return response()->json([
                'error' => $hawkerRegister[1]
            ]);
        }
    }



    public function edit($id)
    {
        //   return encrypt($id);
        $hawkerRegister = $this->hawkerRegister->edit(decrypt($id));

        // $advertisementPermission = AdvertisementPermission::find($id);

        //  //return $advertisementPermission;

        $wards = $this->commonService->getActiveWard();

        $zones = $this->commonService->getActiveZone();

        // $data = AdvertisementPermission::findOrFail($id);

        return view('nulm.hawkerregister.update')->with([
            'hawkerRegister' =>  $hawkerRegister,
            'wards' => $wards,
            'zones' => $zones,
            // 'data' => '$data',

            'advertisemenent' => $hawkerRegister
        ]);
    }
    public function update(UpdateRequest $request, $id)
    {
        // dd($request->all());
        $hawkerRegister = $this->hawkerRegister->update($request, $id);
        if ($hawkerRegister) {
            return response()->json([
                'success' => 'Hawker Register updated successfully'
            ]);
        } else {
            return response()->json([
                'error' => 'Something went wrong, please try again'
            ]);
        }
    }
}
