<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;

class DashboardController extends Controller
{
    public function index()
    {
        $services = Service::where('is_parent', 0)->get();

        return view('home.dashboard')->with([
            'services' => $services
        ]);
    }

    public function myApplication()
    {
        return view('home.my-application');
    }

    public function subService(Request $request, $id)
    {
        $services = Service::where('service_id', $id)->get();

        return view('home.sub-service')->with([
            'services' => $services
        ]);
    }
}
