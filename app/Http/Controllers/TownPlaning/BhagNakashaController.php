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
    protected $PartZoneService;

    public function __construct(PartZoneService $PartZoneService)
    {
        $this->PartZoneService = $PartZoneService;
    }
    public function index()
    {
        return true;
    }

    public function create()
    {
        return view('town-planing.bhag-nakasha.create');
    }

    public function store(CreateRequest $request)
    {
        $PartZoneService = $this->PartZoneService->store($request);

        if ($PartZoneService) {
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
        $PartZoneService = $this->PartZoneService->update($request, $id);

        if ($PartZoneService) {
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
