<?php

namespace App\Http\Controllers\Trade;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Trade\LicenseCancellation\CreateRequest;
use App\Http\Requests\Trade\LicenseCancellation\UpdateRequest;
use App\Services\Trade\LicenseCancellation\LicenseCancellationService;
use App\Models\Trade\TradeLicenseCancellation;

class LicenseCancellationController extends Controller
{
    protected $LicenseCancellationService;

    public function __construct(LicenseCancellationService $LicenseCancellationService)
    {
        $this->LicenseCancellationService = $LicenseCancellationService;
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
        return view('Trade.LicenseCancellation.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateRequest $request)
    {
        $LicenseCancellationService = $this->LicenseCancellationService->store($request);

        if ($LicenseCancellationService) {
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
        $data = TradeLicenseCancellation::findOrFail($id);
        return view('Trade.LicenseCancellation.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id)
    {
        $LicenseCancellationService = $this->LicenseCancellationService->update($request, $id);

        if ($LicenseCancellationService) {
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
