<?php

namespace App\Http\Controllers\Trade;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Trade\ChangeLicenseName\CreateRequest;
use App\Http\Requests\Trade\ChangeLicenseName\UpdateRequest;
use App\Services\Trade\ChangeLicenseName\ChangeLicenseNameService;
use App\Models\Trade\TradeChangeLicenseName;

class ChangeLicenseNameController extends Controller
{
    protected $ChangeLicenseNameService;

    public function __construct(ChangeLicenseNameService $ChangeLicenseNameService)
    {
        $this->ChangeLicenseNameService = $ChangeLicenseNameService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Trade.ChangeLicenseName.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateRequest $request)
    {
        $ChangeLicenseNameService = $this->ChangeLicenseNameService->store($request);

        if ($ChangeLicenseNameService) {
            return response()->json([
                'success' => 'Detail Stored successfully'
            ]);
        } else {
            return response()->json([
                'error' => 'Something went wrong, please try again'
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = TradeChangeLicenseName::findOrFail(decrypt($id));

        return view('Trade.ChangeLicenseName.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id)
    {
        $ChangeLicenseNameService = $this->ChangeLicenseNameService->update($request, $id);

        if ($ChangeLicenseNameService) {
            return response()->json([
                'success' => 'Detail updated successfully'
            ]);
        } else {
            return response()->json([
                'error' => 'Something went wrong, please try again'
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
