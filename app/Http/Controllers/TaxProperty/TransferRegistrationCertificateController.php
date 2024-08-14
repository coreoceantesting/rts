<?php

namespace App\Http\Controllers\TaxProperty;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\PropertyTax\PropertyTaxAssessmentRequest;
use App\Services\PropertyTax\TransferRegistrationCertificateService;

class TransferRegistrationCertificateController extends Controller
{
    protected $transferRegistrationCertificateService;

    public function __construct(TransferRegistrationCertificateService $transferRegistrationCertificateService)
    {
        $this->transferRegistrationCertificateService = $transferRegistrationCertificateService;
    }

    public function create()
    {
        return view('property-tax.transferRegistrationCertificate.create');
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

        return view('property-tax.transferRegistrationCertificate.edit')->with([
            'transferRegistrationCertificate' => $transferRegistrationCertificate
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
