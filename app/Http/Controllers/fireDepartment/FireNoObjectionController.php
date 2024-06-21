<?php

namespace App\Http\Controllers\fireDepartment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\FireDepartment\NoObjection\CreateRequest;
use App\Http\Requests\FireDepartment\NoObjection\UpdateRequest;
use App\Services\FireDepartment\NoObjection\NoObjectionService;
use App\Models\FireDepartment\FireNoObjection;

class FireNoObjectionController extends Controller
{
    protected $NoObjectionService;

    public function __construct(NoObjectionService $NoObjectionService)
    {
        $this->NoObjectionService = $NoObjectionService;
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
        return view('FireDepartment.NoObjectionCertificate.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateRequest $request)
    {
        $NoObjectionService = $this->NoObjectionService->store($request);

        if ($NoObjectionService) {
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
        $data = FireNoObjection::findOrFail($id);
        return view('FireDepartment.NoObjectionCertificate.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id)
    {
        $NoObjectionService = $this->NoObjectionService->update($request, $id);

        if ($NoObjectionService) {
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
