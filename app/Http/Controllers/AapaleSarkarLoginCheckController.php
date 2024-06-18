<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\AapaleSarkarLoginCheckService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
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
}
