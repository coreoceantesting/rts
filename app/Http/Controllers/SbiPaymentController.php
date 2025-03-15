<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\SbiPayment;

class SbiPaymentController extends Controller
{
    protected $algo;
    protected $key;
    protected $successCallbackUrl;
    protected $failedCallbackUrl;
    protected $merchantId;

    public function __construct()
    {
        $this->algo = 'aes-128-cbc'; 
        $this->merchantId = '1000605'; 
        $this->key = "pWhMnIEMc4q6hKdi2Fx50Ii8CKAoSIqv9ScSpwuMHM4="; 
        // $this->key = "A7C9F96EEE0602A61F184F4F1B92F0566B9E61D98059729EAD3229F882E81C3A"; 
        $this->successCallbackUrl = env('APP_URL') . "payment/sbi/success";
        $this->failedCallbackUrl = env('APP_URL') . "payment/sbi/failed";
    }

    public function initPaymentRequest(Request $request)
    {
        // $lastPayment = SbiPayment::latest('id')->first();
        
        // $newOrderIdNumber = $lastPayment ? $lastPayment->id + 1 : 1; 
        // if ($lastPayment === null) {
        //     $newOrderIdNumber = 1; 
        // }
     
        // $orderid = 'MRTS' . str_pad($newOrderIdNumber, 5, '0', STR_PAD_LEFT);
        $orderid  = 'MRTS00975';
        $postingAmount = 1;
        $merchantCountry = 'IN';
        $merchantCurrency = 'INR';
        $aggregatorId = 'SBIEPAY';
        $merchantCustomerId = 2;
        $payMode = 'NB';
        $accessMedium = 'ONLINE';
        $transactionSource = 'ONLINE';
    
        
        $requestParameter  = "$this->merchantId|DOM|$merchantCountry|$merchantCurrency|1|Other|$this->successCallbackUrl|$this->failedCallbackUrl|$aggregatorId|$orderid|2|NB|$accessMedium|$transactionSource";
   
        $EncryptTrans = $this->encrypt($requestParameter);
    
        return view('payment.create', compact('EncryptTrans'));
    }

    public function redirectPayment(Request $request)
    {
    
        $data = [
            'EncryptTrans' => $request->input('EncryptTrans'),
            'merchIdVal' => $request->input('merchIdVal'),
        ];
        
       \Log::info('redirect ');
     
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

    public function successResponse(Request $request)
    {
        if (!$request->encData && $request->encData == "")
            return "Please try again...";
        
    
        $decreptedData = $this->decrypt($request->encData, $this->key);
        $decreptedData = explode('|', $decreptedData);
        
        if(!isset($decreptedData[0]))
            return "No response received";
        

        $doubleVerificationResponse = $this->doubleverificationReq($request->encData, $decreptedData[0]);
       
        return $doubleVerificationResponse;

        if ($doubleVerificationResponse['status'] == 'success') {
            return view('payment.success')->with('message', 'Payment and double verification successful!');
        } else {
            return view('payment.success')->with('message', 'Payment successful, but double verification failed.');
        }
    }

    public function failedResponse(Request $request)
    {
       
        return view('payment.failed');
    }


    public function doubleverificationReq($encData, $merchantOrderNo)
    {
        $amount = 1;
        
        $queryRequest = "$this->merchantId|$merchantOrderNo|$amount";
        $url = 'https://test.sbiepay.sbi/payagg/statusQuery/getStatusQuery';
        $data = [
            'queryRequest' => $queryRequest,
            'aggregatorId' => 'SBIEPAY',
            'merchantId' => $this->merchantId
        ];
    
        $response = Http::withOptions([ 'timeout' => 60, 'verify' => true ])->post($url, $data); 
        
        if ($response->successful()) 
        {
            return ['status' => 'success', 'data' => $response->json()];
        } 
        else 
        {
            \Log::error('SBI Double Verification Error:', ['data' => $response->json(), 'status' => $response->status() ]);
            return [ 'status' => $response->status(), 'message' => 'Request to external service failed', 'data' => $response->json() ];
        }
    }

   
    public  function encrypt($data)
    {
        $iv=substr($this->key, 0, 16);
           
        $cipherText = openssl_encrypt($data, $this->algo, $this->key, OPENSSL_RAW_DATA, $iv );
        $cipherText = base64_encode($cipherText);
    
        return $cipherText;
    }
        
    public function decrypt($cipherText)
    {
	    $iv=substr($this->key, 0, 16);
	    
    	$cipherText = base64_decode($cipherText);
    					
		$plaintext = openssl_decrypt($cipherText, $this->algo, $this->key, OPENSSL_RAW_DATA, $iv );

        return $plaintext;   
    }
    
}
