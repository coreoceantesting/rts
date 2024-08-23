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

    public function create()
    {
        return view('trade.change-owner-count.create');
    }

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

    public function edit(string $id)
    {
        $data = TradeChangeOwnerCount::findOrFail(decrypt($id));

        return view('trade.change-owner-count.edit', compact('data'));
    }

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
}
