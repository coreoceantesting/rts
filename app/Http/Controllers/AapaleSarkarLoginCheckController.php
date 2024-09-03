<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\AapaleSarkarLoginCheckService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Models\ServiceCredential;
use App\Models\User;

class AapaleSarkarLoginCheckController extends Controller
{
    protected $aapaleSarkarLoginCheckService;

    public function __construct(AapaleSarkarLoginCheckService $aapaleSarkarLoginCheckService)
    {
        $this->aapaleSarkarLoginCheckService = $aapaleSarkarLoginCheckService;
    }

    public function check(Request $request)
    {
        set_time_limit(0);
        if (isset($request->str)) {
            // get service credential from service credential details
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
                if (isset($data['UserID']) && !empty($data['UserID'])) {
                    // Query the database to check if the user exists
                    $existingUser = User::where('user_id', $data['UserID'])->first();

                    if ($existingUser) {
                        Auth::login($existingUser);
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
                        return redirect($serviceCredential->service_url);
                    }
                } else {
                    abort(500);
                }
            } else {
                abort(500);
            }
        }
    }

    public function updateStatus(Request $request)
    {
        $user = User::query()->where('user_id', $request->user_id)->orWhere('id', $request->user_id)->first();

        if (!$user) {
            return response()->json([
                'status' => 404,
                'message' => "User not found"
            ]);
        }

        $serviceCredential = ServiceCredential::query()->where('dept_service_id', $request->service_name)->first();

        $service = $this->aapaleSarkarLoginCheckService->serviceDetails($request->service_name, $request->application_no);

        $trackId = $user->trackid;
        $clientCode = $serviceCredential->client_code;
        $userId = $request->user_id;
        $serviceId = $serviceCredential->service_id;
        $applicationId = $request->application_no;
        $paymentStatus = "N";
        $paymentDate = "NA";
        $digitalSignStatus = "N";
        $digitalSignDate = "NA";
        $estimateServiceDays = ($serviceCredential->service_day) ? $serviceCredential->service_day : 20;
        $estimateServiceDate = $service->aapale_sarkar_payment_date;
        $amount = "23.60";
        $requestFlag = "1";
        $applicationStatus = $request->application_status;
        $remark = $request->application_remark;
        $ud1 = $serviceCredential->ulb_id;
        $ud2 = $serviceCredential->ulb_district;
        $ud3 = "NA";
        $ud4 = "NA";
        $ud5 = "NA";
        $checkSumKey = $serviceCredential->check_sum_key;

        $request1 = sprintf("%s|%s|%s|%s|%s|%s|%s|%s|%s|%s|%s|%s|%s|%s|%s|%s|%s|%s|%s|%s|%s", $trackId, $clientCode, $userId, $serviceId, $applicationId, $paymentStatus, $paymentDate, $digitalSignStatus, $digitalSignDate, $estimateServiceDays, $estimateServiceDate, $amount, $requestFlag, $applicationStatus, $remark, $ud1, $ud2, $ud3, $ud4, $ud5, $checkSumKey);
        $checksumvalue = $this->aapaleSarkarLoginCheckService->generateCheckSumValue($request1);

        $request2 = sprintf("%s|%s|%s|%s|%s|%s|%s|%s|%s|%s|%s|%s|%s|%s|%s|%s|%s|%s|%s|%s|%s", $trackId, $clientCode, $userId, $serviceId, $applicationId, $paymentStatus, $paymentDate, $digitalSignStatus, $digitalSignDate, $estimateServiceDays, $estimateServiceDate, $amount, $requestFlag, $applicationStatus, $remark, $ud1, $ud2, $ud3, $ud4, $ud5, $checksumvalue);

        $encryptedKey = $this->aapaleSarkarLoginCheckService->encryptTripleDES($request2, $serviceCredential->str_key, $serviceCredential->str_iv);


        $response = $this->aapaleSarkarLoginCheckService->sendRequestToAapaleSarkar($serviceCredential->soap_end_point_url, $serviceCredential->soap_action_app_status_url, $serviceCredential->str_key, $serviceCredential->str_iv, $encryptedKey, $clientCode);

        if ($response[0]) {
            if ($response[1]['status'] == "Success") {
                return response()->json([
                    'status' => 200,
                    'message' => 'Status updated successfully'
                ]);
            }
        }

        return response()->json([
            'status' => 503,
            'message' => 'Something is wrong please try again'
        ]);
    }


    // public function makePaymentToAapaleSarkar(Request $request)
    // {

    //     // get credential from config file
    //     $soapEndPoint = $this->config->item('soapEndPoint');

    //     $trackId = $this->session->userdata('TrackId');
    //     $clientCode = $this->config->item('clientCode');
    //     $userId = $this->session->userdata('user_id');
    //     $serviceId = $this->config->item('serviceId');
    //     $applicationId = $this->session->userdata('application_no');
    //     $paymentStatus = "Y";
    //     $paymentDate = date('Y-m-d');
    //     $digitalSignStatus = "N";
    //     $digitalSignDate = "NA";
    //     $estimateServiceDays = "20";
    //     $estimateServiceDate = date('Y-m-d', strtotime('+20 days'));
    //     $amount = "23.60";
    //     $requestFlag = "0";
    //     $applicationStatus = "3";
    //     $remark = "Payment Done to Aapale Sarkar";
    //     $ud1 = $this->config->item('ulbId');
    //     $ud2 = $this->config->item('ulbDistric');
    //     $ud3 = "NA";
    //     $ud4 = "NA";
    //     $ud5 = "NA";
    //     $checkSumKey = $this->config->item('checkSumKey');
    //     $returnPath = base_url() . 'Marriage_permission_form/paymentReturnUrl';

    //     $request1 = sprintf("%s|%s|%s|%s|%s|%s|%s|%s|%s|%s|%s|%s|%s|%s|%s|%s|%s|%s|%s|%s|%s", $trackId, $clientCode, $userId, $serviceId, $applicationId, $paymentStatus, $paymentDate, $digitalSignStatus, $digitalSignDate, $estimateServiceDays, $estimateServiceDate, $amount, $requestFlag, $applicationStatus, $remark, $ud1, $ud2, $ud3, $ud4, $ud5, $checkSumKey);
    //     $checksumvalue = $this->aapaleSarkarLoginCheckService->GenerateCheckSumValue($request1);

    //     $request2 = sprintf("%s|%s|%s|%s|%s|%s|%s|%s|%s|%s|%s|%s|%s|%s|%s|%s", $clientCode, $checksumvalue, $serviceId, $applicationId, $ud2, date('Y-m-d'), $trackId, $userId, $this->session->userdata('aapalesarkarmobileno'), $this->session->userdata('aapalesarkarusername'), $returnPath, $ud1, $ud2, $ud3, $ud4, $ud5);

    //     $webstr = $this->aapaleSarkarLoginCheckService->encryptTripleDES($request2, $this->config->item('strKey'), $this->config->item('strIV'));
    //     $url = $this->config->item('validatePayment') . "?webstr=" . $webstr . "&deptcode=" . $clientCode;

    //     $response = $this->aapaleSarkarLoginCheckService->validateAapaleSarkarPayment($url);
    //     $response = json_decode($response);
    //     // echo $response->Key."<br>";
    //     // print_r($response);exit;
    //     if ($response->Key != "") {
    //         $url = $this->config->item('outPayment') . "?webstr=" . $webstr . "&DeptCode=" . $clientCode . "&Authentication=" . $response->Key;
    //         // echo $url;exit;
    //         redirect($url);
    //     } else {
    //         show_error($this->config->item('expiredTokenTimeMessage'), 500);
    //     }
    // }

    // public function paymentReturnUrl(Request $request)
    // {
    //     $str = $request->str;

    //     $strKey = $this->config->item('strKey');
    //     $strIV = $this->config->item('strIV');

    //     // decrypt data and get the reponse data from aapale sarkar
    //     $check = decryptTripleDES($str, $strKey, $strIV);
    //     $rowData = explode('|', $check);

    //     if (count($rowData) > 0) {
    //         if (count($rowData) == 10) {
    //             if ($rowData[8] == "True") {
    //                 $data = ['is_aapale_sarkar_payment_paid' => 1, 'aaple_sarkar_payment_date' => date('Y-m-d'), 'aaple_sarkar_service_day' => '20'];
    //                 $this->db->where('request_no', $rowData[2])->where('deleted_dt', null)->update('reg_marriage_permission', $data);

    //                 redirect("Marriage_permission_form/success_marriage_registration");
    //             }
    //         } elseif (count($rowData) == 4) {
    //             $data = ['is_aapale_sarkar_payment_paid' => 1, 'aaple_sarkar_payment_date' => date('Y-m-d'), 'aaple_sarkar_service_day' => '20'];
    //             $this->db->where('user_id', $rowData[0])->where('deleted_dt', null)->update('reg_marriage_permission', $data);

    //             redirect("Marriage_permission_form/success_marriage_registration");
    //         }
    //     } else {
    //         redirect("Marriage_permission_form/success_marriage_registration");
    //     }

    //     redirect("Marriage_permission_form/success_marriage_registration");
    // }
}
