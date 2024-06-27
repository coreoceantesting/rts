<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use Illuminate\Support\Facades\DB;

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
        return view('home.my-application')->with([
            'datas' => []
        ]);
        $tables = ['city_structure_part_maps', 'city_structure_zone_certificates', 'construction_drainage_connections', 'construction_road_cuttings', 'fire_final_no_objections', 'fire_no_objections', 'illegalwaterconnections', 'marriage_reg_bride_info', 'marriage_reg_details', 'marriage_reg_forms', 'marriage_reg_groom_infos', 'marriage_reg_priest_info', 'marriage_reg_witness_info', 'newtaxations', 'no_due_certificates', 'property_tax_issuance_of_property_tax_assessments', 'registration_of_objections', 're_taxations', 'self_assessments', 'tax_demands', 'tax_exemptions', 'tax_exemption_non_resident_properties', 'trade_auto_renewal_license_permissions', 'trade_change_license_names', 'trade_change_license_types', 'trade_change_owner_counts', 'trade_change_owner_names', 'trade_license_cancellations', 'trade_license_transfers', 'trade_new_license_permissions', 'trade_noc_for_mandaps', 'trade_per_licenses', 'trade_renewal_license_permissions', 'transfer_property_certificates', 'waternewconnections', 'water_change_connection_sizes', 'water_change_in_uses', 'water_change_ownerships', 'water_defective_meters', 'water_disconnect_supplies', 'water_no_dues', 'water_plumber_licenses', 'water_pressure_complaints', 'water_quality_complaints', 'water_reconnections', 'water_renewal_of_plumbers', 'water_tax_bills', 'water_unavailability_supplies'];
        $data = [];

        foreach ($tables as $table) {
            $tableData = DB::table($table)->select('id', 'application_no', 'service_name', 'created_at', 'aapale_sarkar_payment_date', 'status')->get()->toArray();

            $data = array_merge($data, $tableData);
        }

        usort($data, function ($a, $b) {
            return strtotime($a->created_at) - strtotime($b->created_at);
        });

        return view('home.my-application')->with([
            'datas' => $data
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
