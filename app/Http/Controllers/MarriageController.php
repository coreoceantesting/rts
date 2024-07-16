<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\Marriage\BrideInformationRequest;
use App\Http\Requests\Marriage\GroomInformationRequest;
use App\Http\Requests\Marriage\MarriageRegistrationDetailsRequest;
use App\Http\Requests\Marriage\MarriageRegistrationFormRequest;
use App\Http\Requests\Marriage\PriestInformationRequest;
use App\Http\Requests\Marriage\WitnessInformationRequest;
use App\Services\MarriageRegistrationService;

class MarriageController extends Controller
{
    protected $marriageRegistrationService;

    public function __construct(MarriageRegistrationService $marriageRegistrationService)
    {
        set_time_limit(0);

        $this->marriageRegistrationService = $marriageRegistrationService;
    }

    public function index(Request $request)
    {
        return view('marriage.index');
    }

    public function create()
    {
        return view('marriage.create');
    }

    public function edit($id)
    {
        $marriageRegistration = $this->marriageRegistrationService->edit(decrypt($id));

        return view('marriage.edit')->with([
            'marriageRegistration' => $marriageRegistration
        ]);
    }

    // store marriage registration form
    public function storeMarriageRegistrationForm(MarriageRegistrationFormRequest $request)
    {
        $storeMarriageRegistrationForm = $this->marriageRegistrationService->storeMarriageRegistrationForm($request);

        if ($storeMarriageRegistrationForm) {
            return response()->json([
                'success' => 'Marriage created successfully',
                'data' => $storeMarriageRegistrationForm
            ]);
        } else {
            return response()->json([
                'error' => 'Something went wrong, please try again'
            ]);
        }
    }

    // store marriage registration details
    public function storeMarriageRegistrationDetails(MarriageRegistrationDetailsRequest $request)
    {
        $storeMarriageRegistrationDetails = $this->marriageRegistrationService->storeMarriageRegistrationDetails($request);

        if ($storeMarriageRegistrationDetails) {
            return response()->json([
                'success' => 'Marriage created successfully',
                'data' => $storeMarriageRegistrationDetails
            ]);
        } else {
            return response()->json([
                'error' => 'Something went wrong, please try again'
            ]);
        }
    }

    // store groom information
    public function storeGroomInformation(GroomInformationRequest $request)
    {
        $storeGroomInformation = $this->marriageRegistrationService->storeGroomInformation($request);

        if ($storeGroomInformation) {
            return response()->json([
                'success' => 'Marriage created successfully',
                'data' => $storeGroomInformation
            ]);
        } else {
            return response()->json([
                'error' => 'Something went wrong, please try again',
            ]);
        }
    }

    // store bride information
    public function storeBrideInformation(BrideInformationRequest $request)
    {
        $storeBrideInformation = $this->marriageRegistrationService->storeBrideInformation($request);

        if ($storeBrideInformation) {
            return response()->json([
                'success' => 'Marriage created successfully',
                'data' => $storeBrideInformation
            ]);
        } else {
            return response()->json([
                'error' => 'Something went wrong, please try again',
            ]);
        }
    }

    // store priest information
    public function storePriestInformation(PriestInformationRequest $request)
    {
        $storePriestInformation = $this->marriageRegistrationService->storePriestInformation($request);

        if ($storePriestInformation) {
            return response()->json([
                'success' => 'Marriage created successfully',
                'data' => $storePriestInformation
            ]);
        } else {
            return response()->json([
                'error' => 'Something went wrong, please try again',
            ]);
        }
    }

    // store witness information
    public function storeWitnessInformation(WitnessInformationRequest $request)
    {
        $storeWitnessInformation = $this->marriageRegistrationService->storeWitnessInformation($request);

        if ($storeWitnessInformation) {
            return response()->json([
                'success' => 'Marriage created successfully',
                'data' => $storeWitnessInformation
            ]);
        } else {
            return response()->json([
                'error' => 'Something went wrong, please try again',
            ]);
        }
    }
}
