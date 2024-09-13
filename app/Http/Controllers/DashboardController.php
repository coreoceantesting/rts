<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\ServiceName;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Services\AapaleSarkarLoginCheckService;
use App\Models\AapaleSarkarPaymentDetails;
use App\Models\ServiceCredential;

class DashboardController extends Controller
{
    protected $aapaleSarkarLoginCheckService;

    public function __construct(AapaleSarkarLoginCheckService $aapaleSarkarLoginCheckService)
    {
        $this->aapaleSarkarLoginCheckService = $aapaleSarkarLoginCheckService;
    }

    public function index()
    {
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
        $serviceName = ServiceName::pluck('service_name', 'service_id')->toArray();

        $editRoute = ServiceName::pluck('edit_route', 'service_id')->toArray();

        $serviceCredentials = ServiceCredential::select('dept_service_id', 'id', 'service_id', 'is_paid_service', 'is_paid_service_by_aapale_sarkar', 'service_charge')->get();

        $tables = ['city_structure_part_maps', 'city_structure_zone_certificates',  'construction_drainage_connections',  'construction_road_cuttings',  'fire_final_no_objections',  'fire_no_objections',  'illegalwaterconnections',  'marriage_reg_forms',  'trade_auto_renewal_license_permissions',  'trade_change_license_names',  'trade_change_license_types',  'trade_change_owner_counts',  'trade_change_owner_names',  'trade_license_cancellations',  'trade_license_transfers',  'trade_new_license_permissions',  'trade_noc_for_mandaps',  'trade_per_licenses',  'trade_renewal_license_permissions',  'waternewconnections',  'water_change_connection_sizes',  'water_change_in_uses',  'water_change_ownerships',  'water_defective_meters',  'water_disconnect_supplies',  'water_plumber_licenses',  'water_pressure_complaints',  'water_quality_complaints',  'water_reconnections',  'water_renewal_of_plumbers',  'water_unavailability_supplies', 'newtaxations', 'no_due_certificates', 'property_tax_issuance_of_property_tax_assessments', 'registration_of_objections', 're_taxations', 'self_assessments', 'tax_demands', 'tax_exemptions', 'tax_exemption_non_resident_properties', 'transfer_property_certificates', "water_no_dues", "water_tax_bills"];
        $data = [];

        foreach ($tables as $table) {
            $tableData = DB::table($table)->select('id', 'application_no', 'created_at', 'service_id', 'payment_date', 'is_payment_paid', 'is_payment_paid_aapale_sarkar', 'aapale_sarkar_payment_date', 'status')->where('user_id', Auth::user()->id)->get()->toArray();

            $data = array_merge($data, $tableData);
        }

        usort($data, function ($a, $b) {
            return strtotime($b->created_at) - strtotime($a->created_at);
        });

        return view('home.my-application')->with([
            'datas' => $data,
            'serviceName' => $serviceName,
            'editRoute' => $editRoute,
            'serviceCredentials' => $serviceCredentials
        ]);
    }

    public function generatePaymentUrl(Request $request)
    {
        $paymentUrl = $this->aapaleSarkarLoginCheckService->makePaymentToAapaleSarkar($request);
        return $paymentUrl;
        if ($paymentUrl) {
            return redirect($paymentUrl);
        } else {
            abort(500);
        }
    }

    public function paymentReturnUrl(Request $request)
    {
        $str = $request->str;

        $strKey = "@pn@PNM@m@h@0nl!ne@23523";
        $strIV = "PNM@05@3";

        // decrypt data and get the reponse data from aapale sarkar
        $check = $this->aapaleSarkarLoginCheckService->decryptTripleDES($str, $strKey, $strIV);
        $rowData = explode('|', $check);

        if (count($rowData) > 0) {
            if (count($rowData) == 10) {
                if ($rowData[8] == "True") {
                    AapaleSarkarPaymentDetails::create([
                        'client_code' => $rowData[0],
                        'service_id' => $rowData[1],
                        'application_no' => $rowData[2],
                        'payment_transaction_id' => $rowData[3],
                        'bank_ref_id' => $rowData[4],
                        'bank_ref_no' => $rowData[5],
                        'bank_id' => $rowData[6],
                        'payment_date' => $rowData[7],
                        'payment_status' => $rowData[8],
                        'total_amount' => $rowData[9],
                    ]);
                    // $data = ['is_aapale_sarkar_payment_paid' => 1, 'aaple_sarkar_payment_date' => date('Y-m-d'), 'aaple_sarkar_service_day' => '20'];
                    // $this->db->where('request_no', $rowData[2])->where('deleted_dt', null)->update('reg_marriage_permission', $data);

                    return redirect()->route('my-application');
                }
            } elseif (count($rowData) == 4) {
                // $data = ['is_aapale_sarkar_payment_paid' => 1, 'aaple_sarkar_payment_date' => date('Y-m-d'), 'aaple_sarkar_service_day' => '20'];
                // $this->db->where('user_id', $rowData[0])->where('deleted_dt', null)->update('reg_marriage_permission', $data);

                return redirect()->route('my-application');
            }
        } else {
            return redirect()->route('my-application');
        }

        return redirect()->route('my-application');
    }

    public function subService(Request $request, $id)
    {
        $services = Service::where('service_id', $id)->get();

        return view('home.sub-service')->with([
            'services' => $services
        ]);
    }
}
