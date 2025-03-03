<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewTaxAssessment\UpdateRequest;
use App\Http\Requests\NewTaxAssessment\CreateRequest;
use App\Services\CommonService;
use App\Services\NewTaxAssessmentService;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;

class NewTaxAssessmentController extends Controller
{
    protected $commonService;
    protected $newtaxassessment;


    // Constructor for dependency injection
    public function __construct(NewTaxAssessmentService $assesment, CommonService $commonService)
    {
        $this->newtaxassessment = $assesment;
        $this->commonService = $commonService;
    }

    // Display the create form
    public function create()
    {
        // Get active wards and zones from CommonService
        $wards = $this->commonService->getActiveWard();
        $zones = $this->commonService->getActiveZone();

        // Return the create view with wards and zones data
        return view('newtax_assessment.create')->with([
            'wards' => $wards,
            'zones' => $zones,
        ]);
    }

    // Store the newly created abattoir license
    public function store(CreateRequest $request)
    {
        dd($request);
        // Call the store method in the service and get the response
        $assesment = $this->newtaxassessment->store($request);

        // dd($request);
        // Check if the license was successfully saved
        if ($assesment[0]) {
            return response()->json([
                'success' => 'New Tax Assesment saved successfully'
            ]);
        } else {
            return response()->json([
                'error' => $assesment[1]
            ]);
        }
    }



    public function edit($id)
    {
    // return encrypt($id);
        $assesment = $this->newtaxassessment->edit(decrypt($id));

        // $advertisementPermission = AdvertisementPermission::find($id);

        //  //return $advertisementPermission;

        $wards = $this->commonService->getActiveWard();

        $zones = $this->commonService->getActiveZone();

        // $data = AdvertisementPermission::findOrFail($id);

        return view('newtax_assessment.update')->with([
            'assesment'=>  $assesment,
            'wards' => $wards,
            'zones' => $zones,
            // 'data' => '$data',

            'advertisemenent' => $assesment
        ]);
    }
    public function update(UpdateRequest $request, $id)
    {
        // dd($request->all());
        $assesment = $this->newtaxassessment->update($request, $id);

        if ($assesment) {
            return response()->json([
                'success' => 'New Tax Assesment updated successfully'
            ]);
        } else {
            return response()->json([
                'error' => 'Something went wrong, please try again'
            ]);
        }
    }

}
