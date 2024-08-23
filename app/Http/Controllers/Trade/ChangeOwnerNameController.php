<?php

namespace App\Http\Controllers\Trade;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Trade\ChangeOwnerName\CreateRequest;
use App\Http\Requests\Trade\ChangeOwnerName\UpdateRequest;
use App\Services\Trade\ChangeOwnerNameService;
use App\Models\Trade\TradeChangeOwnerName;

class ChangeOwnerNameController extends Controller
{
    protected $changeOwnerNameService;

    public function __construct(ChangeOwnerNameService $changeOwnerNameService)
    {
        $this->changeOwnerNameService = $changeOwnerNameService;
    }

    public function create()
    {
        return view('trade.change-owner-name.create');
    }

    public function store(CreateRequest $request)
    {
        $changeOwnerNameService = $this->changeOwnerNameService->store($request);

        if ($changeOwnerNameService) {
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
        $data = TradeChangeOwnerName::findOrFail(decrypt($id));

        return view('trade.change-owner-name.edit', compact('data'));
    }

    public function update(UpdateRequest $request, string $id)
    {
        $changeOwnerNameService = $this->changeOwnerNameService->update($request, $id);

        if ($changeOwnerNameService) {
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
