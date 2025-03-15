<?php

namespace App\Http\Controllers\fireDepartment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\FireDepartment\FinalNoObjection\CreateRequest;
use App\Http\Requests\FireDepartment\FinalNoObjection\UpdateRequest;
use App\Services\FireDepartment\FinalNoObjectionService;
use App\Models\FireDepartment\FireFinalNoObjection;

class FinalFireNoObjectionController extends Controller
{
    protected $finalNoObjectionService;

    public function __construct(FinalNoObjectionService $finalNoObjectionService)
    {
        $this->finalNoObjectionService = $finalNoObjectionService;
    }

    public function create()
    {
        return view('FireDepartment.FinalNoObjectionCertificate.create');
    }

    public function store(CreateRequest $request)
    {
        $finalNoObjectionService = $this->finalNoObjectionService->store($request);

        if ($finalNoObjectionService) {
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
        $data = FireFinalNoObjection::findOrFail(decrypt($id));

        return view('FireDepartment.FinalNoObjectionCertificate.edit', compact('data'));
    }

    public function update(UpdateRequest $request, string $id)
    {
        dd($request);
        $finalNoObjectionService = $this->finalNoObjectionService->update($request, $id);

        if ($finalNoObjectionService) {
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
