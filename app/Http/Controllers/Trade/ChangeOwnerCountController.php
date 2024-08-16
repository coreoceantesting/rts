<?php

namespace App\Http\Controllers\Trade;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Trade\ChangeOwnerCount\CreateRequest;
use App\Http\Requests\Trade\ChangeOwnerCount\UpdateRequest;
use App\Services\Trade\ChangeOwnerCountService;
use App\Models\Trade\TradeChangeOwnerCount;

class ChangeOwnerCountController extends Controller
{
    protected $changeOwnerCountService;

    public function __construct(ChangeOwnerCountService $changeOwnerCountService)
    {
        $this->changeOwnerCountService = $changeOwnerCountService;
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
        return view('trade.ChangeOwnerCount.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateRequest $request)
    {
        $changeOwnerCountService = $this->changeOwnerCountService->store($request);

        if ($changeOwnerCountService) {
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
        $data = TradeChangeOwnerCount::findOrFail(decrypt($id));

        return view('trade.ChangeOwnerCount.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id)
    {
        $changeOwnerCountService = $this->changeOwnerCountService->update($request, $id);

        if ($changeOwnerCountService) {
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
