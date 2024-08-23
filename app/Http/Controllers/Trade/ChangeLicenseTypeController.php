<?php

namespace App\Http\Controllers\Trade;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Trade\ChangeLicenseType\CreateRequest;
use App\Http\Requests\Trade\ChangeLicenseType\UpdateRequest;
use App\Services\Trade\ChangeLicenseTypeService;
use App\Models\Trade\TradeChangeLicenseType;

class ChangeLicenseTypeController extends Controller
{
    protected $changeLicenseTypeService;

    public function __construct(ChangeLicenseTypeService $changeLicenseTypeService)
    {
        $this->changeLicenseTypeService = $changeLicenseTypeService;
    }

    public function create()
    {
        return view('trade.change-license-type.create');
    }

    public function store(CreateRequest $request)
    {
        $changeLicenseTypeService = $this->changeLicenseTypeService->store($request);

        if ($changeLicenseTypeService) {
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
        $data = TradeChangeLicenseType::findOrFail(decrypt($id));

        return view('trade.change-license-type.edit', compact('data'));
    }

    public function update(Request $request, string $id)
    {
        $changeLicenseTypeService = $this->changeLicenseTypeService->update($request, $id);

        if ($changeLicenseTypeService) {
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
