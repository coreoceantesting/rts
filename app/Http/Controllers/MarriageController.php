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

    // store marriage registration form
    public function storeMarriageRegistrationForm(MarriageRegistrationFormRequest $request)
    {
        $storeMarriageRegistrationForm = $this->marriageRegistrationService->storeMarriageRegistrationForm($request);

        return response()->json([
            'success' => 'Marriage created successfully',
            'data' => $request->all()
        ]);
    }

    // store marriage registration details
    public function storeMarriageRegistrationDetails(MarriageRegistrationDetailsRequest $request)
    {
        $storeMarriageRegistrationDetails = $this->marriageRegistrationService->storeMarriageRegistrationDetails($request);

        return response()->json([
            'success' => 'Marriage created successfully',
            'data' => $request->all()
        ]);
    }

    // store groom information
    public function storeGroomInformation(GroomInformationRequest $request)
    {
        $storeGroomInformation = $this->marriageRegistrationService->storeGroomInformation($request);

        return response()->json([
            'success' => 'Marriage created successfully',
            'data' => $request->all()
        ]);
    }

    // store bride information
    public function storeBrideInformation(BrideInformationRequest $request)
    {
        $storeBrideInformation = $this->marriageRegistrationService->storeBrideInformation($request);

        return response()->json([
            'success' => 'Marriage created successfully',
            'data' => $request->all()
        ]);
    }

    // store priest information
    public function storePriestInformation(PriestInformationRequest $request)
    {
        $storePriestInformation = $this->marriageRegistrationService->storePriestInformation($request);

        return response()->json([
            'success' => 'Marriage created successfully',
            'data' => $request->all()
        ]);
    }

    // store witness information
    public function storeWitnessInformation(WitnessInformationRequest $request)
    {
        $storeWitnessInformation = $this->marriageRegistrationService->storeWitnessInformation($request);

        return response()->json([
            'success' => 'Marriage created successfully',
            'data' => $request->all()
        ]);
    }
}
