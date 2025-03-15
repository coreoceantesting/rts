<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    protected $algo;
    protected $key;
    protected $successCallbackUrl;
    protected $failedCallbackUrl;

    public function __construct()
    {
        $this->algo = 'aes-128-cbc'; 
        $this->key = "pWhMnIEMc4q6hKdi2Fx50Ii8CKAoSIqv9ScSpwuMHM4="; 
        // $this->key = "A7C9F96EEE0602A61F184F4F1B92F0566B9E61D98059729EAD3229F882E81C3A"; 
        $this->successCallbackUrl = env('APP_URL') . "payment/sbi/success";
        $this->failedCallbackUrl = env('APP_URL') . "payment/sbi/failed";
    }

    public function initPaymentRequest(Request $request)
    {
        // $decrypted = $this->decrypt("2dQhpsbA4s5TIjWONzrKWx/FJF+QH88bQtrUytYGyfAzAK6vY5q9BMw5VhGy0ga5+6K9A9buSeogt2px7m6G97VFYljgxPdsziGYlTp2H4D3nJu686BdlzOtzgW+yV/ytAZfRuN4pk8XLxnro6EJfj4igmr6J7k0TPGa+pNvW6kV7cMWw5l8wuGF7mWtWbqd", $this->key);
        // dd($decrypted);
        
        $orderid  = 'MRTS00353';
        $merchantId = '1000605';
        // $merchantId = '1000112';
        $postingAmount = 1;
        $merchantCountry = 'IN';
        $merchantCurrency = 'INR';
        $aggregatorId = 'SBIEPAY';
        $merchantCustomerId = 2;
        $payMode = 'NB';
        $accessMedium = 'ONLINE';
        $transactionSource = 'ONLINE';
    
        
        // $requestParameter = "$merchantId|DOM|$merchantCountry|$merchantCurrency|$postingAmount|Other|$this->successCallbackUrl|$this->failedCallbackUrl|$aggregatorId|$orderId|$merchantCustomerId|$payMode|$accessMedium|$transactionSource";
        // $requestParameter = "1000605|DOM|IN|INR|1|Other|$this->successCallbackUrl|$this->failedCallbackUrl|SBIEPAY|$orderid|2|NB|ONLINE|ONLINE";
        $requestParameter  = "1000605|DOM|IN|INR|1|Other|$this->successCallbackUrl|$this->failedCallbackUrl|SBIEPAY|MRTS00353|2|NB|ONLINE|ONLINE";
   
        $EncryptTrans = $this->encrypt($requestParameter, $this->key);
    
        return view('payment.create', compact('EncryptTrans'));
    }

    public function redirectPayment(Request $request)
    {
    
        $data = [
            'EncryptTrans' => $request->input('EncryptTrans'),
            'merchIdVal' => $request->input('merchIdVal'),
        ];
    
        try {
            $response = \Http::post('https://test.sbiepay.sbi/secure/AggregatorHostedListener', $data);
    
            if ($response->successful()) {
             
                return response($response->body(), $response->status());
            } else {
              
                \Log::error('SBI ePay Response Error: ', ['response' => $response->body()]);
    
                return response()->json(['error' => 'Request to external service failed', 'details' => $response->body()], 500);
            }
        } catch (\Exception $e) {
        
            \Log::error('SBI ePay Request Error: ', ['error' => $e->getMessage()]);
    
            return response()->json(['error' => 'An unexpected error occurred'], 500);
        }
    }

    public function doubleverificationReq(Request $request)
    {
        \Log::info($request);
        $merchant_order_no = "MRTS00353"; 
        $merchantid = "1000605";  
        $amount = 2;

        $url = "https://test.sbiepay.sbi/payagg/statusQuery/getStatusQuery"; 
 
        $queryRequest = "$merchantid|$merchant_order_no|$amount";
        $queryRequest33 = http_build_query([
            'queryRequest' => $queryRequest,
            "aggregatorId" => "SBIEPAY",
            "merchantId" => $merchantid
        ]);

        try {
         
            $response = Http::withOptions([
                'timeout' => 60,
                'verify' => true, 
            ])->post($url, $queryRequest33);

            if ($response->successful()) {
                return response()->json([
                    'status' => 'success',
                    'data' => $response->json()
                ]);
            } else {
               
                \Log::error('SBI Double Verification Error:', ['response' => $response->body()]);
                return response()->json([
                    'status' => 'error',
                    'message' => 'Request to external service failed',
                    'details' => $response->body()
                ], 500);
            }
        } catch (\Exception $e) {
            \Log::error('SBI Double Verification Request Error:', ['error' => $e->getMessage()]);
            return response()->json(['status' => 'error', 'message' => 'An unexpected error occurred'], 500);
        }
    }
    
     public function successResponse(Request $request)
    {
        if ($request->encData && $request->encData != "") {
            echo "Transaction fetched successfully!";
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
        return view('payment.failed');
    }



    // private  function encrypt($data, $key)
    // {
    //     $iv = substr($key, 0, 16);
    //     $cipherText = openssl_encrypt($data, $algo, $key, OPENSSL_RAW_DATA, $iv);
    //     return base64_encode($cipherText);
    // }
        public  function encrypt($data,  $key)
        {
			 $algo='aes-128-cbc';
          
            $iv=substr($key, 0, 16);
               
            $cipherText = openssl_encrypt(
                    $data,
                    $algo,
                    $key,
                    OPENSSL_RAW_DATA,
                    $iv
                );
            $cipherText = base64_encode($cipherText);
        
           return $cipherText;
        
        }
        
            public function decrypt($cipherText,  $key)
        {
        	 $algo='aes-128-cbc';
        
        	 $iv=substr($key, 0, 16);
                        // echo $iv;
        	$cipherText = base64_decode($cipherText);
        					
        					$plaintext = openssl_decrypt(
                            $cipherText,
                            $algo,
                            $key,
                            OPENSSL_RAW_DATA,
                            $iv
                        );
             return $plaintext;   

        }
    
//     private  function decrypt($cipherText,  $key)
//     {
// 	    $iv=substr($key, 0, 16);
//     	$cipherText = base64_decode($cipherText);
    					
// 		$plaintext = openssl_decrypt($cipherText, $algo, $key, OPENSSL_RAW_DATA, $iv );
    
//         return $plaintext;   
//     }  
}
