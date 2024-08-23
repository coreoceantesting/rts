<?php

namespace App\Http\Controllers\TaxProperty;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\PropertyTax\TransferPropertyCertificateRequest;
use App\Services\PropertyTax\TransferPropertyCertificateService;
use App\Services\CommonService;

class TransferPropertyController extends Controller
{
    protected $transferPropertyCertificateService;
    protected $commonService;

    public function __construct(TransferPropertyCertificateService $transferPropertyCertificateService, CommonService $commonService)
    {
        $this->transferPropertyCertificateService = $transferPropertyCertificateService;
        $this->commonService = $commonService;
    }

    public function create()
    {
        $wards = $this->commonService->getActiveWard();

        $zones = $this->commonService->getActiveZone();

        return view('property-tax.transferOfProperty.create')->with([
            'wards' => $wards,
            'zones' => $zones,
        ]);
    }

    public function store(TransferPropertyCertificateRequest $request)
    {
        $transferProperty = $this->transferPropertyCertificateService->store($request);

        if ($transferProperty) {
            return response()->json([
                'success' => 'Property transfer created successfully'
            ]);
        } else {
            return response()->json([
                'error' => 'Something went wrong, please try again'
            ]);
        }
    }

    public function edit($id)
    {
        $transferProperty = $this->transferPropertyCertificateService->edit(decrypt($id));

        $wards = $this->commonService->getActiveWard();

        $zones = $this->commonService->getActiveZone();

        return view('property-tax.transferOfProperty.edit')->with([
            'transferProperty' => $transferProperty,
            'wards' => $wards,
            'zones' => $zones,
        ]);
    }

    public function update(TransferPropertyCertificateRequest $request, $id)
    {
        $transferProperty = $this->transferPropertyCertificateService->update($request);

        if ($transferProperty) {
            return response()->json([
                'success' => 'Property transfer update successfully'
            ]);
        } else {
            return response()->json([
                'error' => 'Something went wrong, please try again'
            ]);
        }
    }
}
