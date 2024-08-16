<?php

namespace App\Http\Controllers\WaterSupplyDepartment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\WaterDepartment\TaxBill\CreateRequest;
use App\Http\Requests\WaterDepartment\TaxBill\UpdateRequest;
use App\Services\WaterDepartment\TaxBillService;
use App\Models\WaterDepartment\WaterTaxBill;

class WaterTaxController extends Controller
{
    protected $taxBillService;

    public function __construct(TaxBillService $taxBillService)
    {
        $this->taxBillService = $taxBillService;
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
        return view('WaterSupplyDepartment.WaterTaxBill.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateRequest $request)
    {
        $taxBillService = $this->taxBillService->store($request);

        if ($taxBillService) {
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
        $data = WaterTaxBill::findOrFail(decrypt($id));

        return view('WaterSupplyDepartment.WaterTaxBill.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id)
    {
        $taxBillService = $this->taxBillService->update($request, $id);

        if ($taxBillService) {
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
