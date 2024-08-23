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

    public function create()
    {
        return view('trade.change-license-name.create');
    }

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

    public function edit(string $id)
    {
        $data = TradeChangeLicenseName::findOrFail(decrypt($id));

        return view('trade.change-license-name.edit', compact('data'));
    }

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
}
