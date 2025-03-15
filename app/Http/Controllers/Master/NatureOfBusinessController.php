<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Masters\StoreNatureBusinessRequest;
use App\Http\Requests\Admin\Masters\Upda;
use App\Http\Requests\Admin\Masters\UpdateNatureBusinessRequest;
use App\Models\NatureBusiness;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class NatureOfBusinessController extends Controller
{
    public function index()
    {
        $nature_busis = NatureBusiness::latest()->get();

        // dd($fees);

        return view('master.nature-business')->with(['nature_busis' => $nature_busis]);
    }
    public function create()
    {

    }

    public function store(StoreNatureBusinessRequest $request)
    {
        try {
            DB::beginTransaction();
            NatureBusiness::create($request->all());
            DB::commit();

            return response()->json(['success' => 'NatureBusiness created successfully!']);
        } catch (\Exception $e) {
            return $this->json($e, 'creating', 'NatureBusiness');
        }
    }

    public function show(string $id)
    {
        //
    }

    public function edit(NatureBusiness $nature_business)
    {
        // dd($nature_business);
        if ($nature_business) {
            $response = [
                'result' => 1,
                'nature_business' => $nature_business,
            ];
            // dd($nature_business);
            // return view('admin.masters.districts', compact('district'));
        } else {
            $response = ['result' => 0];
        }
        return $response;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateNatureBusinessRequest $request, NatureBusiness $nature_business)
    {
        //  dd($request);
        try {
            DB::beginTransaction();
            $input = $request->validated();
            $nature_business->update(Arr::only($input, ['trade_type', 'rate']));
            DB::commit();

            return response()->json(['success' => 'Nature Business updated successfully!']);
        } catch (\Exception $e) {
            return $this->respondWithAjax($e, 'updating', 'Fees');
        }
    }

    public function destroy(NatureBusiness $nature_business)
    {
        dd($nature_business);
        try {
            DB::beginTransaction();
            $nature_business->delete();
            DB::commit();

            return response()->json(['success' => 'NatureBusiness deleted successfully!']);
        } catch (\Exception $e) {
            return $this->respondWithAjax($e, 'deleting', 'NatureBusiness');
        }
    }
}
