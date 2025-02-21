<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Masters\StoreSignatureRequest;
use App\Http\Requests\Admin\Masters\UpdateSignatureRequest;
use App\Models\Signature;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use App\Models\ServiceName;

class SignatureController extends Controller
{
    public function index()
    {
        $services = ServiceName::select('service_id', 'service_name', 'id')->get();
        // dd($services);
        $signature = Signature::with('service')->latest()->get();
        // dd($signature);
        return view('master.signature', compact('services'))->with(['signature' => $signature]);
    }
    public function create()
    {
        $services = ServiceName::select('service_id', 'service_name')->get();
        return view('master.create_signature')->with([
            'services' => $services // Pass districts to the create view
        ]);
    }

    public function store(StoreSignatureRequest $request)
    {

        //  dd($request->all());
        try {
            DB::beginTransaction();


            $input = $request->validated();
            //  dd($input);
            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('signatures', 'public');
                $input['image'] = $imagePath; // Save the file path in the database
            }

          $signature=  Signature::create(Arr::only($input, ['service_name_id', 'image']));
            DB::commit();

            return response()->json([
                'success' => 'Signature Added successfully!',
                'data' => $signature,
            ]);
        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json([
                'error' => 'Error creating Signature: ' . $e->getMessage(),
            ], 500);
        }
    }
    public function edit(Signature $signature)
    {
        if ($signature) {
            $response = [
                'result' => 1,
                'signature' => $signature,
            ];
            // return view('admin.masters.districts', compact('district'));
        } else {
            $response = ['result' => 0];
        }
        return $response;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSignatureRequest $request, Signature $signature)
    {
        // dd($request);
        try {
            DB::beginTransaction();
            $input = $request->validated();
            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('signatures', 'public');
                $input['image'] = $imagePath; // Save the file path in the database
            }
            $signature->update(Arr::only($input, ['service_name_id', 'image']));
            DB::commit();

            return response()->json(['success' => 'Signature updated successfully!']);
        } catch (\Exception $e) {
            return $this->respondWithAjax($e, 'updating', 'Signature');
        }
    }

    public function destroy(Signature $signature)
    {
        try {
            DB::beginTransaction();
            $signature->delete();
            DB::commit();

            return response()->json(['success' => 'Signature deleted successfully!']);
        } catch (\Exception $e) {
            return $this->respondWithAjax($e, 'deleting', 'Signature');
        }
    }
}
