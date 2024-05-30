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

    public function store(Request $request)
    {
        Log::info($request->all());

        return response()->json([
            'success' => 'Marriage created successfully'
        ]);
    }

    public function edit(Request $request)
    {
        return view('marriage.edit');
    }

    public function show()
    {
    }
}
