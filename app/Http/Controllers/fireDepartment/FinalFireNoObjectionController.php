<?php

namespace App\Http\Controllers\fireDepartment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\FireDepartment\FinalNoObjection\CreateRequest;
use App\Http\Requests\FireDepartment\FinalNoObjection\UpdateRequest;
use App\Services\FireDepartment\FinalNoObjection\FinalNoObjectionService;
use App\Models\FireDepartment\FireFinalNoObjection;

class FinalFireNoObjectionController extends Controller
{
    protected $FinalNoObjectionService;

    public function __construct(FinalNoObjectionService $FinalNoObjectionService)
    {
        $this->FinalNoObjectionService = $FinalNoObjectionService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('FireDepartment.FinalNoObjectionCertificate.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateRequest $request)
    {
        $FinalNoObjectionService = $this->FinalNoObjectionService->store($request);

        if ($FinalNoObjectionService) {
            return response()->json([
                'success' => 'Detail Stored successfully'
            ]);
        } else {
            return response()->json([
                'error' => 'Something went wrong, please try again'
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = FireFinalNoObjection::findOrFail(decrypt($id));

        return view('FireDepartment.FinalNoObjectionCertificate.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id)
    {
        $FinalNoObjectionService = $this->FinalNoObjectionService->update($request, $id);

        if ($FinalNoObjectionService) {
            return response()->json([
                'success' => 'Detail updated successfully'
            ]);
        } else {
            return response()->json([
                'error' => 'Something went wrong, please try again'
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
