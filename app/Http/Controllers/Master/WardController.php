<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\Masters\StoreWardRequest;
use App\Http\Requests\Admin\Masters\UpdateWardRequest;
use App\Models\Ward;
use Illuminate\Support\Facades\DB;

class WardController extends Controller
{
    public function index()
    {
        $wards = Ward::latest()->get();

        return view('master.ward')->with(['wards' => $wards]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreWardRequest $request)
    {
        try {
            DB::beginTransaction();
            Ward::create($request->all());
            DB::commit();

            return response()->json(['success' => 'Office created successfully!']);
        } catch (\Exception $e) {
            return $this->json($e, 'creating', 'Office');
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
    public function edit(Ward $ward)
    {
        if ($ward) {
            $response = [
                'result' => 1,
                'ward' => $ward,
            ];
        } else {
            $response = ['result' => 0];
        }
        return $response;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateWardRequest $request, Ward $ward)
    {
        try {
            DB::beginTransaction();
            $ward->update($request->all());
            DB::commit();

            return response()->json(['success' => 'Ward updated successfully!']);
        } catch (\Exception $e) {
            return $this->respondWithAjax($e, 'updating', 'Ward');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ward $ward)
    {
        try {
            DB::beginTransaction();
            $ward->delete();
            DB::commit();

            return response()->json(['success' => 'Ward deleted successfully!']);
        } catch (\Exception $e) {
            return $this->respondWithAjax($e, 'deleting', 'Ward');
        }
    }
}
