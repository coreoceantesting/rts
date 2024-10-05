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
use App\Models\User;
use Illuminate\Support\Facades\Log;

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
            $services = Service::with(['services'])->where('is_parent', 0)->get();
            // return $services;
            $data = [];
            foreach ($services as $service) {
                foreach ($service->services as $ser) {
                    $name = $ser->name;
                    $mainServiceId = $service->id;
                    $serviceId = $ser->id;
                    $tableData = ($ser->table_name) ? DB::table($ser->table_name)->select('user_id', 'status', DB::raw('DATE(created_at) as created_at'), DB::raw('DATE_FORMAT(created_at, "%Y-%m") as yearmonth'), DB::raw('? as main_service_id'), DB::raw('? as service_id'), DB::raw('? as name'))->setBindings([$mainServiceId, $serviceId, $name])->get() : null;

                    if ($tableData && count($tableData) > 0) {
                        foreach ($tableData as $serviceData) {
                            // $data[] = [$serviceData, 'user_id' => DB::table('users')->where('id', $serviceData->user_id)->value('is_aapale_sarkar_user')];
                            $data[] = array_merge((array)$serviceData, ['user_id' => DB::table('users')->where('id', $serviceData->user_id)->value('is_aapale_sarkar_user')]);
                        }
                    }
                }
            }
            // return $data;
            return view('home.dashboard')->with([
                'services' => $services,
                'data' => collect($data)
            ]);
        } else {
            $services = Service::where('is_parent', 0)->get();

            return view('home.user-dashboard')->with([
                'services' => $services
            ]);
        }
    }

    public function myApplication(Request $request)
    {


        if (isset($request->str) && $request->str != "") {
            $str = $request->str;

            $strKeys = "@pn@PNM@m@h@0nl!ne@23523";
            $strIVs = "PNM@05@3";

            // decrypt data and get the reponse data from aapale sarkar
            $check = $this->aapaleSarkarLoginCheckService->decryptTripleDES($str, $strKeys, $strIVs);

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

                        $serviceDeptId = ServiceCredential::where('service_id', $rowData[1])->value('dept_service_id');
                        $model = ServiceName::where('service_id', $serviceDeptId)->value('model');

                        $model::where('application_no', $rowData[2])->update([
                            'is_payment_paid_aapale_sarkar' => 1,
                            'aapale_sarkar_payment_date' => date('Y-m-d')
                        ]);


                        $aapaleSarkarCredential = ServiceCredential::where('dept_service_id', $serviceDeptId)->first();
                        $serviceDay = ($aapaleSarkarCredential->service_day) ? $aapaleSarkarCredential->service_day : 20;

                        $send = $this->aapaleSarkarLoginCheckService->encryptAndSendRequestToAapaleSarkar(Auth::user()->trackid, $aapaleSarkarCredential->client_code, Auth::user()->user_id, $aapaleSarkarCredential->service_id, $rowData[2], 'N', 'NA', 'N', 'NA', $serviceDay, date('Y-m-d', strtotime("+$serviceDay days")), config('rtsapiurl.amount'), config('rtsapiurl.requestFlag'), 3, "Under Scrutiny", $aapaleSarkarCredential->ulb_id, $aapaleSarkarCredential->ulb_district, 'NA', 'NA', 'NA', $aapaleSarkarCredential->check_sum_key, $aapaleSarkarCredential->str_key, $aapaleSarkarCredential->str_iv, $aapaleSarkarCredential->soap_end_point_url, $aapaleSarkarCredential->soap_action_app_status_url);

                        if ($send) {
                            return redirect()->route('my-application');
                        } else {
                            \Log::error('Payment verification failed for Aapale Sarkar');
                        }
                    }
                } elseif (isset($request->Appid) && $request->Appid != "") {
                    $serviceCredential = DB::table('service_credentials')->where([
                        'ulb_id' => $request->ULBID,
                        'ulb_district' => $request->ULBDistrict,
                        'service_id' => $request->ns
                    ])->first();

                    // return redirect($serviceCredential->service_url);

                    // decrypt data and get the reponse data from aapale sarkar

                    $check = $this->aapaleSarkarLoginCheckService->checkDecryptData(
                        $serviceCredential->soap_end_point_url,
                        $serviceCredential->soap_action_url,
                        $serviceCredential->check_sum_key,
                        $serviceCredential->client_code,
                        $request->str,
                        $serviceCredential->str_key,
                        $serviceCredential->str_iv
                    );

                    // condition for logic if we get success
                    if ($check[0]) {
                        $data = $check[1];
                        // return $data;
                        if (isset($data['UserID']) && !empty($data['UserID'])) {
                            // Query the database to check if the user exists
                            $existingUser = User::where('user_id', $data['UserID'])->first();

                            if ($existingUser) {
                                Auth::login($existingUser);

                                User::where('id', Auth::user()->id)->update(['trackid' => $data['TrackId']]);
                            } else {
                                $user = User::create([
                                    'name' => ($data['FullName']) ? $data['FullName'] : '',
                                    'email' => ($data['EmailID']) ? $data['EmailID'] : '',
                                    'password' => ($data['Password']) ? $data['Password'] : '',
                                    'mobile' => ($data['MobileNo']) ? $data['MobileNo'] : '',
                                    'age' => ($data['Age']) ? $data['Age'] : '',
                                    'gender' => ($data['Gender']) ? $data['Gender'] : '',
                                    'user_id' => ($data['UserID']) ? $data['UserID'] : '',
                                    'trackid' => ($data['TrackId']) ? $data['TrackId'] : '',
                                    'is_aapale_sarkar_user' => 1,
                                ]);

                                DB::table('model_has_roles')->insert(['role_id' => 2, 'model_type' => 'App\Models\User', 'model_id' => $user->id]);

                                Auth::login($user);
                            }
                            if (Auth::check()) {
                                return redirect()->route('my-application');
                            }
                        } else {
                            abort(500);
                        }
                    } else {
                        abort(500);
                    }
                }
            }
        }


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

        if ($paymentUrl) {
            return redirect($paymentUrl);
        } else {
            abort(500);
        }
    }

    public function paymentReturnUrl(Request $request)
    {
        $str = $request->str;

        $strKeys = "@pn@PNM@m@h@0nl!ne@23523";
        $strIVs = "PNM@05@3";

        // decrypt data and get the reponse data from aapale sarkar
        $check = $this->aapaleSarkarLoginCheckService->decryptTripleDES($str, $strKeys, $strIVs);

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

                    $serviceDeptId = ServiceCredential::where('service_id', $rowData[1])->value('dept_service_id');
                    $model = ServiceName::where('service_id', $serviceDeptId)->value('model');

                    $model::where('application_no', $rowData[2])->update([
                        'is_payment_paid_aapale_sarkar' => 1,
                        'aapale_sarkar_payment_date' => date('Y-m-d')
                    ]);

                    $aapaleSarkarCredential = ServiceCredential::where('dept_service_id', $serviceDeptId)->first();
                    $serviceDay = ($aapaleSarkarCredential->service_day) ? $aapaleSarkarCredential->service_day : 20;

                    $send = $this->aapaleSarkarLoginCheckService->encryptAndSendRequestToAapaleSarkar(Auth::user()->trackid, $aapaleSarkarCredential->client_code, Auth::user()->user_id, $aapaleSarkarCredential->service_id, $rowData[2], 'N', 'NA', 'N', 'NA', $serviceDay, date('Y-m-d', strtotime("+$serviceDay days")), config('rtsapiurl.amount'), config('rtsapiurl.requestFlag'), 3, "Under Scrutiny", $aapaleSarkarCredential->ulb_id, $aapaleSarkarCredential->ulb_district, 'NA', 'NA', 'NA', $aapaleSarkarCredential->check_sum_key, $aapaleSarkarCredential->str_key, $aapaleSarkarCredential->str_iv, $aapaleSarkarCredential->soap_end_point_url, $aapaleSarkarCredential->soap_action_app_status_url);

                    if ($send) {
                        return redirect()->route('my-application');
                    } else {
                        \Log::error('Payment verification failed for Aapale Sarkar');
                    }
                }
            } elseif (count($rowData) == 4) {
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
