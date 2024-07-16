<?php

namespace App\Http\Controllers\Trade;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Trade\ChangeLicenseType\CreateRequest;
use App\Http\Requests\Trade\ChangeLicenseType\UpdateRequest;
use App\Services\Trade\ChangeLicenseType\ChangeLicenseTypeService;
use App\Models\Trade\TradeChangeLicenseType;

class ChangeLicenseTypeController extends Controller
{
    protected $ChangeLicenseTypeService;

    public function __construct(ChangeLicenseTypeService $ChangeLicenseTypeService)
    {
        $this->ChangeLicenseTypeService = $ChangeLicenseTypeService;
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
        return view('Trade.ChangeLicenseType.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateRequest $request)
    {
        $ChangeLicenseTypeService = $this->ChangeLicenseTypeService->store($request);

        if ($ChangeLicenseTypeService) {
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
        $data = TradeChangeLicenseType::findOrFail(decrypt($id));

        return view('Trade.ChangeLicenseType.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $ChangeLicenseTypeService = $this->ChangeLicenseTypeService->update($request, $id);

        if ($ChangeLicenseTypeService) {
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
