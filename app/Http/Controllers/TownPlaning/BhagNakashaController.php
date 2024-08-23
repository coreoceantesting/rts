<?php

namespace App\Http\Controllers\TownPlaning;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CityStructure\PartMap\CreateRequest;
use App\Http\Requests\CityStructure\PartMap\UpdateRequest;
use App\Services\CityStructure\PartMap\PartZoneService;
use App\Models\CityStructure\CityStructurePartMap;

class BhagNakashaController extends Controller
{
    protected $partZoneService;

    public function __construct(PartZoneService $partZoneService)
    {
        $this->partZoneService = $partZoneService;
    }

    public function create()
    {
        return view('town-planing.bhag-nakasha.create');
    }

    public function store(CreateRequest $request)
    {
        $partZoneService = $this->partZoneService->store($request);

        if ($partZoneService) {
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
        $data = CityStructurePartMap::findOrFail(decrypt($id));

        return view('town-planing.bhag-nakasha.edit', compact('data'));
    }

    public function update(UpdateRequest $request, string $id)
    {
        $partZoneService = $this->partZoneService->update($request, $id);

        if ($partZoneService) {
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
