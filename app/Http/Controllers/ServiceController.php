<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Services;
use App\Http\Requests\ServiceRequest;

class ServiceController extends Controller
{
    protected $service;

    public function __construct(Services $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $services = $this->service->index();

        return view('master.service')->with([
            'services' => $services
        ]);
    }

    public function store(ServiceRequest $request)
    {

        if ($request->ajax()) {
            $service = $this->service->store($request);

            if ($service) {
                return response()->json([
                    'success' => 'Service created successfully!'
                ]);
            } else {
                return response()->json([
                    'error' => 'Something went wrong please try again!'
                ]);
            }
        }
    }

    public function edit(Request $request, $id)
    {
        if ($request->ajax()) {
            $service = $this->service->edit($id);

            return response()->json([
                'service' => $service
            ]);
        }
    }


    public function update(ServiceRequest $request)
    {
        if ($request->ajax()) {
            $service = $this->service->update($request);

            if ($service) {
                return response()->json([
                    'success' => 'Service created successfully!'
                ]);
            } else {
                return response()->json([
                    'error' => 'Something went wrong please try again!'
                ]);
            }
        }
    }
}
