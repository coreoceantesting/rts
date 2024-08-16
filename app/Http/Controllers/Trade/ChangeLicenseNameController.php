<?php

namespace App\Http\Controllers\Trade;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Trade\ChangeLicenseName\CreateRequest;
use App\Http\Requests\Trade\ChangeLicenseName\UpdateRequest;
use App\Services\Trade\ChangeLicenseNameService;
use App\Models\Trade\TradeChangeLicenseName;

class ChangeLicenseNameController extends Controller
{
    protected $changeLicenseNameService;

    public function __construct(ChangeLicenseNameService $changeLicenseNameService)
    {
        $this->changeLicenseNameService = $changeLicenseNameService;
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
        return view('trade.change-license-name.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateRequest $request)
    {
        $changeLicenseNameService = $this->changeLicenseNameService->store($request);

        if ($changeLicenseNameService) {
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

        return view('trade.change-license-name.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id)
    {
        $changeLicenseNameService = $this->changeLicenseNameService->update($request, $id);

        if ($changeLicenseNameService) {
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
