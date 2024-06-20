<?php

namespace App\Http\Controllers\Trade;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Trade\ChangeOwnerCount\CreateRequest;
use App\Http\Requests\Trade\ChangeOwnerCount\UpdateRequest;
use App\Services\Trade\ChangeOwnerCount\ChangeOwnerCountService;
use App\Models\Trade\TradeChangeOwnerCount;

class ChangeOwnerCountController extends Controller
{
    protected $ChangeOwnerCountService;

    public function __construct(ChangeOwnerCountService $ChangeOwnerCountService)
    {
        $this->ChangeOwnerCountService = $ChangeOwnerCountService;
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
        return view('Trade.ChangeOwnerCount.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateRequest $request)
    {
        $ChangeOwnerCountService = $this->ChangeOwnerCountService->store($request);

        if ($ChangeOwnerCountService) {
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
        $data = TradeChangeOwnerCount::findOrFail($id);
        return view('Trade.ChangeOwnerCount.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id)
    {
        $ChangeOwnerCountService = $this->ChangeOwnerCountService->update($request, $id);

        if ($ChangeOwnerCountService) {
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
