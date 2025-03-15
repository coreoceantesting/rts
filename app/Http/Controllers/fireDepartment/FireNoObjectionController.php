<?php

namespace App\Http\Controllers\fireDepartment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\FireDepartment\NoObjection\CreateRequest;
use App\Http\Requests\FireDepartment\NoObjection\UpdateRequest;
use App\Services\FireDepartment\NoObjectionService;
use App\Models\FireDepartment\FireNoObjection;

class FireNoObjectionController extends Controller
{
    protected $noObjectionService;

    public function __construct(NoObjectionService $noObjectionService)
    {
        $this->noObjectionService = $noObjectionService;
    }

    public function create()
    {
        return view('FireDepartment.NoObjectionCertificate.create');
    }

    public function store(CreateRequest $request)
    {
        // dd($request->all());
        $noObjectionService = $this->noObjectionService->store($request);


        if ($noObjectionService) {
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
        $data = FireNoObjection::findOrFail(decrypt($id));

        return view('FireDepartment.NoObjectionCertificate.edit', compact('data'));
    }

    public function update(UpdateRequest $request, string $id)
    {
        $noObjectionService = $this->noObjectionService->update($request, $id);

        if ($noObjectionService) {
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
