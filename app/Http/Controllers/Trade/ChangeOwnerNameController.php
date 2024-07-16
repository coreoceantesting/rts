<?php

namespace App\Http\Controllers\Trade;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Trade\ChangeOwnerName\CreateRequest;
use App\Http\Requests\Trade\ChangeOwnerName\UpdateRequest;
use App\Services\Trade\ChangeOwnerName\ChangeOwnerNameService;
use App\Models\Trade\TradeChangeOwnerName;

class ChangeOwnerNameController extends Controller
{
    protected $ChangeOwnerNameService;

    public function __construct(ChangeOwnerNameService $ChangeOwnerNameService)
    {
        $this->ChangeOwnerNameService = $ChangeOwnerNameService;
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
        return view('Trade.ChangeOwnerName.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateRequest $request)
    {
        $ChangeOwnerNameService = $this->ChangeOwnerNameService->store($request);

        if ($ChangeOwnerNameService) {
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
        $data = TradeChangeOwnerName::findOrFail(decrypt($id));

        return view('Trade.ChangeOwnerName.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id)
    {
        $ChangeOwnerNameService = $this->ChangeOwnerNameService->update($request, $id);

        if ($ChangeOwnerNameService) {
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
