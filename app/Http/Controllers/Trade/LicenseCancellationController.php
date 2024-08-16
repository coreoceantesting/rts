<?php

namespace App\Http\Controllers\Trade;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Trade\LicenseCancellation\CreateRequest;
use App\Http\Requests\Trade\LicenseCancellation\UpdateRequest;
use App\Services\Trade\LicenseCancellationService;
use App\Models\Trade\TradeLicenseCancellation;

class LicenseCancellationController extends Controller
{
    protected $licenseCancellationService;

    public function __construct(LicenseCancellationService $licenseCancellationService)
    {
        $this->licenseCancellationService = $licenseCancellationService;
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
        return view('trade.LicenseCancellation.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateRequest $request)
    {
        $licenseCancellationService = $this->licenseCancellationService->store($request);

        if ($licenseCancellationService) {
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
        $data = TradeLicenseCancellation::findOrFail(decrypt($id));
        return view('trade.LicenseCancellation.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id)
    {
        $licenseCancellationService = $this->licenseCancellationService->update($request, $id);

        if ($licenseCancellationService) {
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
