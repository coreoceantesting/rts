<?php

namespace App\Http\Controllers\Trade;

use App\Http\Controllers\Controller;
use App\Services\CommonService;
use App\Services\Trade\MovieShootingService;
use Illuminate\Http\Request;

class MovieShootingController extends Controller
{
    protected $commonService;
    protected $movieshooting;


    // Constructor for dependency injection
    public function __construct(MovieShootingService $movieshooting, CommonService $commonService)
    {
        $this->movieshooting = $movieshooting;
        $this->commonService = $commonService;
    }

    // Display the create form
    public function create()
    {
        // Get active wards and zones from CommonService
        $wards = $this->commonService->getActiveWard();
        $zones = $this->commonService->getActiveZone();

        // Return the create view with wards and zones data
        return view('trade.movie-shooting.create')->with([
            'wards' => $wards,
            'zones' => $zones,
        ]);
    }

    // Store the newly created abattoir license
    public function store(Request $request)
    {

        // Call the store method in the service and get the response
        $movieshooting = $this->movieshooting->store($request);
        //  dd($request);

        // dd($request);
        // Check if the license was successfully saved
        if ($movieshooting[0]) {
            return response()->json([
                'success' => 'Movie Shooting saved successfully'
            ]);
        } else {
            return response()->json([
                'error' => $movieshooting[1]
            ]);
        }
    }



    public function edit($id)
    {
    //  return encrypt($id);
        $movieshooting = $this->movieshooting->edit(decrypt($id));

        // $advertisementPermission = AdvertisementPermission::find($id);

        //  //return $advertisementPermission;

        $wards = $this->commonService->getActiveWard();

        $zones = $this->commonService->getActiveZone();

        // $data = AdvertisementPermission::findOrFail($id);

        return view('trade.movie-shooting.update')->with([
            'movieshooting'=>  $movieshooting,
            'wards' => $wards,
            'zones' => $zones,
            // 'data' => '$data',

            'movieshooting' => $movieshooting
        ]);
    }
    public function update(Request $request, $id)
    {
        // dd($request->all());
        $movieshooting = $this->movieshooting->update($request, $id);

        return response()->json(['success' => 'Movie Shooting update successfully!']);
    }
}
