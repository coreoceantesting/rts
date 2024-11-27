<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\PlinthCertificateService;
use App\Http\Requests\PlinthCertificateRequest;
use App\Services\CommonService;

class PlinthCertificateController extends Controller
{
    protected $plinthCertificateService;
    protected $commonService;

    public function __construct(PlinthCertificateService $plinthCertificateService, CommonService $commonService)
    {
        $this->plinthCertificateService = $plinthCertificateService;
        $this->commonService = $commonService;
    }

    public function create()
    {
        $wards = $this->commonService->getActiveWard();

        $zones = $this->commonService->getActiveZone();

        return view('plinth-certification.create')->with([
            'wards' => $wards,
            'zones' => $zones,
        ]);
    }

    public function store(PlinthCertificateRequest $request)
    {
        $plinthCertificateService = $this->plinthCertificateService->store($request);

        if ($plinthCertificateService[0]) {
            return response()->json([
                'success' => 'Plinth certificate stored successfully'
            ]);
        } else {
            return response()->json([
                'error' => $plinthCertificateService[1]
            ]);
        }
    }

    public function edit($id)
    {
        // return encrypt($id);
        $plinthCertificate = $this->plinthCertificateService->edit(decrypt($id));

        $wards = $this->commonService->getActiveWard();

        $zones = $this->commonService->getActiveZone();

        return view('plinth-certification.edit')->with([
            'plinthCertificate' => $plinthCertificate,
            'wards' => $wards,
            'zones' => $zones,
        ]);
    }

    public function update(PlinthCertificateRequest $request, $id)
    {
        $plinthCertificateService = $this->plinthCertificateService->update($request, $id);

        if ($plinthCertificateService[0]) {
            return response()->json([
                'success' => 'Plinth certificate updated successfully'
            ]);
        } else {
            return response()->json([
                'error' => $plinthCertificateService[1]
            ]);
        }
    }
}
