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
        // return Auth::user()->roles[0]->name;
        if (Auth::user()->hasRole('Super Admin')) {
            return view('home.dashboard');
        } else {
            $services = Service::where('is_parent', 0)->get();

            return view('home.user-dashboard')->with([
                'services' => $services
            ]);
        }
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

        $tables = ['city_structure_part_maps', 'city_structure_zone_certificates',  'construction_drainage_connections',  'construction_road_cuttings',  'fire_final_no_objections',  'fire_no_objections',  'illegalwaterconnections',  'marriage_reg_forms',  'trade_auto_renewal_license_permissions',  'trade_change_license_names',  'trade_change_license_types',  'trade_change_owner_counts',  'trade_change_owner_names',  'trade_license_cancellations',  'trade_license_transfers',  'trade_new_license_permissions',  'trade_noc_for_mandaps',  'trade_per_licenses',  'trade_renewal_license_permissions',  'waternewconnections',  'water_change_connection_sizes',  'water_change_in_uses',  'water_change_ownerships',  'water_defective_meters',  'water_disconnect_supplies',  'water_plumber_licenses',  'water_pressure_complaints',  'water_quality_complaints',  'water_reconnections',  'water_renewal_of_plumbers',  'water_tax_bills',  'water_unavailability_supplies', 'newtaxations', 'no_due_certificates', 'property_tax_issuance_of_property_tax_assessments', 'registration_of_objections', 're_taxations', 'self_assessments', 'tax_demands', 'tax_exemptions', 'tax_exemption_non_resident_properties', 'transfer_property_certificates', "water_no_dues", "water_tax_bills"];
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
