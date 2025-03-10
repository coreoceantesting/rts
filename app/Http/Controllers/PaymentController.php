<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PaymentController extends Controller
{
    protected $cipher;
    protected $key;
    protected $successCallbackUrl;
    protected $failedCallbackUrl;

    public function __construct()
    {
        $this->cipher = 'aes-128-cbc';
        $this->key = "A7C9F96EEE0602A61F184F4F1B92F0566B9E61D98059729EAD3229F882E81C3A";
        $this->successCallbackUrl = env('APP_URL')."payment/sbi/success";
        $this->failedCallbackUrl = env('APP_URL')."payment/sbi/failed";
    }


    public function initPaymentRequest(Request $request)
    {
        $orderId = 'MRTS00001';
        $merchantId = '1000112';
        $requestParameter  = "$merchantId|DOM|IN|INR|1|Other|$this->successCallbackUrl|$this->failedCallbackUrl|SBIEPAY|$orderId|2|NB|ONLINE|ONLINE";

        $encryptTrans = $this->encrypt($requestParameter, $this->key);

        // $response = Http::post('https://test.sbiepay.sbi/secure/AggregatorHostedListener', [
        //                             'EncryptTrans' => $encryptTrans,
        //                             'merchIdVal' => $merchantId,
        //                         ]);

    }

    public function successResponse(Request $request)
    {
        dd($request->all());

        if ($request->encData && $request->encData != "")
        {
            echo "Transactions Fetched Successfully";
            echo "<br>";

            echo "<br> Encrypted data = " . $request->encData;

            echo "<br> Decrypted data = " . $encData = $this->decrypt($request->encData, $this->key);

            return view('payment.success');
        } else {
            die("Please try again...");
        }
    }

    public function failedResponse(Request $request)
    {
        dd($request->all());

        return view('payment.failed');
    }



    private function encrypt($data, $key)
    {
        $iv = substr($key, 0, 16);
        $cipherText = openssl_encrypt(
            $data,
            $this->cipher,
            $key,
            OPENSSL_RAW_DATA,
            $iv
        );
        $cipherText = base64_encode($cipherText);

        return $cipherText;
    }
    private function decrypt($cipherText, $key)
    {
        $iv = substr($key, 0, 16);
        $cipherText = base64_decode($cipherText);

        $plaintext = openssl_decrypt(
            $cipherText,
            $this->cipher,
            $key,
            OPENSSL_RAW_DATA,
            $iv
        );
        return $plaintext;
    }
}
