<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\Fees;
use App\Http\Requests\Admin\Masters\StoreFeesRequest;
use App\Http\Requests\Admin\Masters\UpdateFeesRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class SignatureController extends Controller
{
    public function index()
    {
        $fees = Fees::latest()->get();

        return view('master.signature')->with(['fees' => $fees]);
    }
    public function create() {}

    public function store(StoreFeesRequest $request)
    {

        //  dd($request->all());
        try {
            DB::beginTransaction();


            $input = $request->validated();

            Fees::create(Arr::only($input,['service_name','fees','dep_service_id']));
            // dd($input);

            DB::commit();

            return response()->json([
                'success' => 'Fees Added successfully!',

            ]);
        } catch (\Exception $e) {
            DB::rollBack();

            return $this->respondWithAjax($e, 'creating', 'Fees');
        }
    }
    public function edit(Fees $fee)
    {
        if ($fee)
        {
            $response = [
                'result' => 1,
                'fee' => $fee,
            ];
            // return view('admin.masters.districts', compact('district'));
        }
        else
        {
            $response = ['result' => 0];
        }
        return $response;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFeesRequest $request, Fees $fee)
    {
        // dd($request);
        try
        {
            DB::beginTransaction();
            $input = $request->validated();
            $fee->update( Arr::only( $input, ['service_name','fees','dep_service_id']) );
            DB::commit();

            return response()->json(['success'=> 'Fees updated successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'updating', 'Ward');
        }
    }

    public function destroy(Fees $fee)
    {
        try
        {
            DB::beginTransaction();
            $fee->delete();
            DB::commit();

            return response()->json(['success'=> 'Fees deleted successfully!']);
        }
        catch(\Exception $e)
        {
            return $this->respondWithAjax($e, 'deleting', 'Fees');
        }
    }
}
