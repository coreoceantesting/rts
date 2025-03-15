<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Admin\Controller;
use App\Models\Fees;
use App\Http\Requests\Admin\Masters\StoreFeesRequest;
use App\Http\Requests\Admin\Masters\UpdateFeesRequest;
use App\Models\Service;
use App\Models\ServiceCredential;
use App\Models\ServiceName;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class FeesController extends Controller
{
    public function index()
    {

        $services = ServiceName::select('service_id', 'service_name', 'id')->get();

        $fees = Fees::with('service')->latest()->get();

        // dd($fees);

        return view('master.fees', compact('services'))->with(['fees' => $fees]);
    }
    public function create()
    {
        $services = ServiceName::select('service_id', 'service_name')->get();
        // dd($services);
        //  $servicesss=ServiceCredential::select('service_id')->get();
        //  dd($servicesss);
        return view('master.create_fees')->with([
            'services' => $services // Pass districts to the create view
        ]);
    }

    public function store(StoreFeesRequest $request)
    {
        //  dd($request);

        try {
            DB::beginTransaction();


            $input = $request->validated();
            // dd($input);
            $fees = Fees::create(Arr::only($input, ['service_name_id', 'fees']));
            //  dd($fees);

            DB::commit();

            return response()->json([
                'success' => 'Fees Added successfully!',
                'data' => $fees,

            ]);
        } catch (\Exception $e) {
            DB::rollBack();

            return $this->respondWithAjax($e, 'creating', 'Fees');
        }
    }
    public function edit(Fees $fee)
    {
        // dd($fee);
        if ($fee) {
            $response = [
                'result' => 1,
                'fee' => $fee->load('service'),
            ];
            // dd($fee);
            // return view('admin.masters.districts', compact('district'));
        } else {
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
        try {
            DB::beginTransaction();
            $input = $request->validated();
            $fee->update(Arr::only($input, ['service_name', 'fees']));
            DB::commit();

            return response()->json(['success' => 'Fees updated successfully!']);
        } catch (\Exception $e) {
            return $this->respondWithAjax($e, 'updating', 'Fees');
        }
    }

    public function destroy(Fees $fee)
    {
        try {
            DB::beginTransaction();
            $fee->delete();
            DB::commit();

            return response()->json(['success' => 'Fees deleted successfully!']);
        } catch (\Exception $e) {
            return $this->respondWithAjax($e, 'deleting', 'Fees');
        }
    }
}
