<?php

namespace App\Http\Controllers\ConstructionDepartment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ConstructionDepartment\DrainageConnection\CreateRequest;
use App\Http\Requests\ConstructionDepartment\DrainageConnection\UpdateRequest;
use App\Services\ConstructionDepartment\DrainageConnectionService;
use App\Models\ConstructionDepartment\ConstructionDrainageConnection;

class DrainageConnectionController extends Controller
{
    protected $drainageConnectionService;

    public function __construct(DrainageConnectionService $drainageConnectionService)
    {
        $this->drainageConnectionService = $drainageConnectionService;
    }
    public function index() {}

    public function create()
    {
        return view('construction-department.drainage-connection.create');
    }

    public function store(CreateRequest $request)
    {
        $drainageConnectionService = $this->drainageConnectionService->store($request);

        if ($drainageConnectionService) {
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
        $data = ConstructionDrainageConnection::findOrFail(decrypt($id));

        return view('construction-department.drainage-connection.edit', compact('data'));
    }

    public function update(UpdateRequest $request, string $id)
    {
        $drainageConnectionService = $this->drainageConnectionService->update($request, $id);

        if ($drainageConnectionService) {
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
