<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\OccupancyCertificateService;
use App\Http\Requests\PlinthCertificateRequest;
use App\Services\CommonService;

class OccupancyCertificateController extends Controller
{
    protected $occupancyCertificateService;
    protected $commonService;

    public function __construct(OccupancyCertificateService $occupancyCertificateService, CommonService $commonService)
    {
        $this->occupancyCertificateService = $occupancyCertificateService;
        $this->commonService = $commonService;
    }

    public function create()
    {
        $wards = $this->commonService->getActiveWard();

        $zones = $this->commonService->getActiveZone();

        return view('occupancy-certification.create')->with([
            'wards' => $wards,
            'zones' => $zones,
        ]);
    }

    public function store(PlinthCertificateRequest $request)
    {
        $occupancyCertificateService = $this->occupancyCertificateService->store($request);

        if ($occupancyCertificateService[0]) {
            return response()->json([
                'success' => 'Occupancy certificate save successfully'
            ]);
        } else {
            return response()->json([
                'error' => $occupancyCertificateService[1]
            ]);
        }
    }

    public function edit($id)
    {
        $occupancyCertificate = $this->occupancyCertificateService->edit(decrypt($id));

        $wards = $this->commonService->getActiveWard();

        $zones = $this->commonService->getActiveZone();

        return view('occupancy-certification.edit')->with([
            'occupancyCertificate' => $occupancyCertificate,
            'wards' => $wards,
            'zones' => $zones,
        ]);
    }

    public function update(PlinthCertificateRequest $request, $id)
    {
        $occupancyCertificateService = $this->occupancyCertificateService->update($request, $id);

        if ($occupancyCertificateService[0]) {
            return response()->json([
                'success' => 'Occupancy certificate updated successfully'
            ]);
        } else {
            return response()->json([
                'error' => $occupancyCertificateService[1]
            ]);
        }
    }
}
