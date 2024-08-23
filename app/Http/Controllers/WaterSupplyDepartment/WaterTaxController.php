<?php

namespace App\Http\Controllers\WaterSupplyDepartment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\WaterDepartment\TaxBill\CreateRequest;
use App\Http\Requests\WaterDepartment\TaxBill\UpdateRequest;
use App\Services\WaterDepartment\TaxBillService;
use App\Models\WaterDepartment\WaterTaxBill;
use App\Services\CommonService;

class WaterTaxController extends Controller
{
    protected $taxBillService;
    protected $commonService;

    public function __construct(TaxBillService $taxBillService, CommonService $commonService)
    {
        $this->taxBillService = $taxBillService;
        $this->commonService = $commonService;
    }

    public function create()
    {
        $wards = $this->commonService->getActiveWard();

        $zones = $this->commonService->getActiveZone();

        return view('water-supply-department.water-tax-bill.create')->with([
            'wards' => $wards,
            'zones' => $zones,
        ]);
    }

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

    public function edit(string $id)
    {
        $data = WaterTaxBill::findOrFail(decrypt($id));

        $wards = $this->commonService->getActiveWard();

        $zones = $this->commonService->getActiveZone();

        return view('water-supply-department.water-tax-bill.edit')->with([
            'data' => $data,
            'wards' => $wards,
            'zones' => $zones,
        ]);
    }

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
}
