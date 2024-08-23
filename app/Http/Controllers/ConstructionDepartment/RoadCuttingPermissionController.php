<?php

namespace App\Http\Controllers\ConstructionDepartment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ConstructionDepartment\RoadCutting\CreateRequest;
use App\Http\Requests\ConstructionDepartment\RoadCutting\UpdateRequest;
use App\Services\ConstructionDepartment\RoadCutting\RoadCuttingService;
use App\Models\ConstructionDepartment\ConstructionRoadCutting;

class RoadCuttingPermissionController extends Controller
{
    protected $RoadCuttingService;

    public function __construct(RoadCuttingService $RoadCuttingService)
    {
        $this->RoadCuttingService = $RoadCuttingService;
    }

    public function create()
    {
        return view('construction-department.road-cutting.create');
    }

    public function store(CreateRequest $request)
    {
        $RoadCuttingService = $this->RoadCuttingService->store($request);

        if ($RoadCuttingService) {
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
        $data = ConstructionRoadCutting::findOrFail(decrypt($id));

        return view('construction-department.road-cutting.edit', compact('data'));
    }

    public function update(UpdateRequest $request, string $id)
    {
        $RoadCuttingService = $this->RoadCuttingService->update($request, $id);

        if ($RoadCuttingService) {
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
