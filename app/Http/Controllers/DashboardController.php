<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\ServiceName;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

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
        $serviceName = ServiceName::pluck('service_name', 'service_id')->toArray();

        $tables = ['tax_demands', 'tax_exemptions'];
        $data = [];

        foreach ($tables as $table) {
            $tableData = DB::table($table)->select('id', 'application_no', 'created_at', 'service_id', 'aapale_sarkar_payment_date', 'status')->where('user_id', Auth::user()->id)->get()->toArray();

            $data = array_merge($data, $tableData);
        }

        usort($data, function ($a, $b) {
            return strtotime($a->created_at) - strtotime($b->created_at);
        });

        return view('home.my-application')->with([
            'datas' => $data,
            'serviceName' => $serviceName
        ]);
    }

    public function subService(Request $request, $id)
    {
        $services = Service::where('service_id', $id)->get();

        return view('home.sub-service')->with([
            'services' => $services
        ]);
    }
}
