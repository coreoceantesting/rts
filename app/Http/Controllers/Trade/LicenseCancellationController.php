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

    public function create()
    {
        return view('trade.license-cancellation.create');
    }

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

    public function edit(string $id)
    {
        $data = TradeLicenseCancellation::findOrFail(decrypt($id));
        return view('trade.license-cancellation.edit', compact('data'));
    }

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
}
