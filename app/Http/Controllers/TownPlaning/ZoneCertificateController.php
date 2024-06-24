<?php

namespace App\Http\Controllers\TownPlaning;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CityStructure\ZoneCertificate\CreateRequest;
use App\Http\Requests\CityStructure\ZoneCertificate\UpdateRequest;
use App\Services\CityStructure\ZoneCertificate\ZoneCertificateService;
use App\Models\CityStructure\CityStructureZoneCertificate;

class ZoneCertificateController extends Controller
{
    protected $ZoneCertificateService;

    public function __construct(ZoneCertificateService $ZoneCertificateService)
    {
        $this->ZoneCertificateService = $ZoneCertificateService;
    }
    public function index()
    {
        return true;
    }

    public function create()
    {
        return view('town-planing.zone-certificate.create');
    }

    public function store(CreateRequest $request)
    {
        $ZoneCertificateService = $this->ZoneCertificateService->store($request);

        if ($ZoneCertificateService) {
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
        $data = CityStructureZoneCertificate::findOrFail($id);
        return view('town-planing.zone-certificate.edit', compact('data'));
    }

    public function update(UpdateRequest $request, string $id)
    {
        $ZoneCertificateService = $this->ZoneCertificateService->update($request, $id);

        if ($ZoneCertificateService) {
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
