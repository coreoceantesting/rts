<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class MarriageController extends Controller
{
    public function index(Request $request)
    {
        return view('marriage.index');
    }

    public function create()
    {
        return view('marriage.create');
    }

    // store marriage registration form
    public function storeMarriageRegistrationForm(Request $request)
    {
        return response()->json([
            'success' => 'Marriage created successfully',
            'data' => $request->all()
        ]);
    }

    // store marriage registration details
    public function storeMarriageRegistrationDetails(Request $request)
    {
        return response()->json([
            'success' => 'Marriage created successfully',
            'data' => $request->all()
        ]);
    }

    // store groom information
    public function storeGroomInformation(Request $request)
    {
        return response()->json([
            'success' => 'Marriage created successfully',
            'data' => $request->all()
        ]);
    }

    // store bride information
    public function storeBrideInformation(Request $request)
    {
        return response()->json([
            'success' => 'Marriage created successfully',
            'data' => $request->all()
        ]);
    }

    // store priest information
    public function storePriestInformation(Request $request)
    {
        return response()->json([
            'success' => 'Marriage created successfully',
            'data' => $request->all()
        ]);
    }

    // store witness information
    public function storeWitnessInformation(Request $request)
    {
        return response()->json([
            'success' => 'Marriage created successfully',
            'data' => $request->all()
        ]);
    }
}
