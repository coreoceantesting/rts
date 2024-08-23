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
    protected $zoneCertificateService;

    public function __construct(ZoneCertificateService $zoneCertificateService)
    {
        $this->zoneCertificateService = $zoneCertificateService;
    }

    public function create()
    {
        return view('town-planing.zone-certificate.create');
    }

    public function store(CreateRequest $request)
    {
        $zoneCertificateService = $this->zoneCertificateService->store($request);

        if ($zoneCertificateService) {
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
        $data = CityStructureZoneCertificate::findOrFail(decrypt($id));

        return view('town-planing.zone-certificate.edit', compact('data'));
    }

    public function update(UpdateRequest $request, string $id)
    {
        $zoneCertificateService = $this->zoneCertificateService->update($request, $id);

        if ($zoneCertificateService) {
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
