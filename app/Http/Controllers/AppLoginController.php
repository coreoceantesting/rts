<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Carbon\Carbon;

class AppLoginController extends Controller
{
   public function checkAppUser(Request $request)
    {
        $email = $request['userdata']['email'] ?? null;
        $phone = $request['userdata']['phone'] ?? null;

        if ($email || $phone) {
            $user = User::where('email', $email)->orWhere('mobile', $phone)->first();

            if (!$user) {
                $parsedDate = Carbon::createFromFormat('Y-m-d', $request['userdata']['date_of_birth']);
                $age = $parsedDate->diffInYears(Carbon::now());
                $user = User::create([
                    'name' => $request['userdata']['first_name'] . " " . $request['userdata']['middle_name'] . " " . $request['userdata']['last_name'],
                    'email' => $request['userdata']['email'],
                    'password' => bcrypt($request['userdata']['email']),
                    'age' => $age,
                    'mobile' => $request['userdata']['phone'],
                    'gender' => $request['userdata']['gender'],
                    'is_aapale_sarkar_user' => 0,
                ]);
            }
            $key = "0a7ee57607601b71d3c81662f11e3732a10ccf992bdf2fb5d6c0f64f839e2f12";
            $key = substr(hash('sha256', $key, true), 0, 32); // Ensure it's 32 bytes for AES-256

            // Initialization Vector (IV)
            $iv = random_bytes(openssl_cipher_iv_length('aes-256-cbc'));

            // Data to encrypt
            $data = $user->id . "|" . $request->link;
            // Encrypt Data
            $encrypted = openssl_encrypt($data, 'aes-256-cbc', $key, 0, $iv);
            // Encode for storage or transfer
            $encrypted = base64_encode($iv . $encrypted);

            return response()->json(['success' => 200, 'data' => $encrypted]);
        } else {
            return response()->json(['error' => 503, 'message' => 'Something went wrong, please try again!']);
        }
    }

    public function appLogin(Request $request)
    {
        set_time_limit(0);
        $arr = $this->chekData($request);

        if (is_array($arr) && count($arr) > 0) {
            $user = User::find($arr[0]);
            if ($user) {
                Auth::login($user);

                return redirect()->to($arr[1]);
            } else {
                $this->appLogin($request);
            }
        } else {
            $this->appLogin($request);
        }
    }

    function chekData($request)
    {
        $encrypted = base64_decode($request->str);
        $iv = substr($encrypted, 0, openssl_cipher_iv_length('aes-256-cbc'));
        $cipherText = substr($encrypted, openssl_cipher_iv_length('aes-256-cbc'));

        $key = substr(hash('sha256', $request->key, true), 0, 32);

        $decrypted = openssl_decrypt($cipherText, 'aes-256-cbc', $key, 0, $iv);

        $arr = explode("|", $decrypted);

        return $arr;
    }
}
