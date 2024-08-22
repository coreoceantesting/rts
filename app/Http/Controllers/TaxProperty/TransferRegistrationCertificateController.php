<?php

namespace App\Http\Controllers\TaxProperty;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\PropertyTax\PropertyTaxAssessmentRequest;
use App\Services\PropertyTax\TransferRegistrationCertificateService;
use App\Services\CommonService;

class TransferRegistrationCertificateController extends Controller
{
    protected $transferRegistrationCertificateService;
    protected $commonService;

    public function __construct(TransferRegistrationCertificateService $transferRegistrationCertificateService, CommonService $commonService)
    {
        $this->transferRegistrationCertificateService = $transferRegistrationCertificateService;
        $this->commonService = $commonService;
    }

    public function create()
    {
        $wards = $this->commonService->getActiveWard();

        $zones = $this->commonService->getActiveZone();

        return view('property-tax.transferRegistrationCertificate.create')->with([
            'wards' => $wards,
            'zones' => $zones,
        ]);
    }

    public function store(PropertyTaxAssessmentRequest $request)
    {
        $transferRegistrationCertificate = $this->transferRegistrationCertificateService->store($request);

        if ($transferRegistrationCertificate) {
            return response()->json([
                'success' => 'Property registration certificate created successfully'
            ]);
        } else {
            return response()->json([
                'error' => 'Something went wrong, please try again'
            ]);
        }
    }

    public function edit($id)
    {
        $transferRegistrationCertificate = $this->transferRegistrationCertificateService->edit(decrypt($id));

        $wards = $this->commonService->getActiveWard();

        $zones = $this->commonService->getActiveZone();

        return view('property-tax.transferRegistrationCertificate.edit')->with([
            'transferRegistrationCertificate' => $transferRegistrationCertificate,
            'wards' => $wards,
            'zones' => $zones,
        ]);
    }

    public function update(PropertyTaxAssessmentRequest $request)
    {
        $transferRegistrationCertificate = $this->transferRegistrationCertificateService->update($request);

        if ($transferRegistrationCertificate) {
            return response()->json([
                'success' => 'Property registration certificate updated successfully'
            ]);
        } else {
            return response()->json([
                'error' => 'Something went wrong, please try again'
            ]);
        }
    }
}
