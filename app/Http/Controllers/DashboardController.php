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
        $services = DB::table('services')->get();
        $data = [];

        foreach ($services as $service) {
            $data[] = [
                'id' => $service->id,
                'service_id' => $service->service_id,
                'name' => $service->name,
                'image' => $service->image,
                'is_parent' => $service->is_parent,
                'route_name' => $service->route_name,
                'background_color' => $service->background_color,
                'created_at' => $service->created_at,
                'updated_at' => $service->updated_at,
            ];
        }

        $serviceName = ServiceName::pluck('service_name', 'service_id')->toArray();

        $editRoute = ServiceName::pluck('edit_route', 'service_id')->toArray();

        $tables = ['newtaxations', 'no_due_certificates', 'property_tax_issuance_of_property_tax_assessments', 'registration_of_objections', 're_taxations', 'self_assessments', 'tax_demands', 'tax_exemptions', 'tax_exemption_non_resident_properties', 'transfer_property_certificates'];
        $data = [];

        foreach ($tables as $table) {
            $tableData = DB::table($table)->select('id', 'application_no', 'created_at', 'service_id', 'aapale_sarkar_payment_date', 'status')->where('user_id', Auth::user()->id)->get()->toArray();

            $data = array_merge($data, $tableData);
        }

        usort($data, function ($a, $b) {
            return strtotime($b->created_at) - strtotime($a->created_at);
        });

        // return $data;

        return view('home.my-application')->with([
            'datas' => $data,
            'serviceName' => $serviceName,
            'editRoute' => $editRoute
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
