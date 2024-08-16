<?php

namespace App\Http\Controllers\Trade;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Trade\NocForMandap\CreateRequest;
use App\Http\Requests\Trade\NocForMandap\UpdateRequest;
use App\Services\Trade\NocForMandapService;
use App\Models\Trade\TradeNocForMandap;

class NOCForMandapController extends Controller
{
    protected $nocForMandapService;

    public function __construct(NocForMandapService $nocForMandapService)
    {
        $this->nocForMandapService = $nocForMandapService;
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
        return view('trade.NocMandap.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateRequest $request)
    {
        $nocForMandapService = $this->nocForMandapService->store($request);

        if ($nocForMandapService) {
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
        $data = TradeNocForMandap::findOrFail(decrypt($id));

        return view('trade.NocMandap.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id)
    {
        $nocForMandapService = $this->nocForMandapService->update($request, $id);

        if ($nocForMandapService) {
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
