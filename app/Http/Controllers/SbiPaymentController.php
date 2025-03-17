<?php

namespace App\Http\Controllers;

use App\Models\Fees;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\SbiPayment;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

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
        $this->successCallbackUrl = env('APP_URL') . "/payment/sbi/success";
        $this->failedCallbackUrl = env('APP_URL') . "/payment/sbi/failed";
    }

    public function initPaymentRequest(Request $request, $service_id, $application_id)
    {
        $fees = Fees::where('service_name_id', $service_id)->first();

        if(!$fees)
            return "No fees data found";

        $sbiPayment = SbiPayment::create([
                            'orderno' => 1,
                            'amount' => $fees->fees,
                            'service_id' => $fees->service_name_id,
                            'table_id' => $application_id,
                            'fees_id' => $fees->id,
                            'status' => SbiPayment::PAYMENT_STATUS_PENDING,
                        ]);
        $sbiPayment->orderno = $sbiPayment->generateOrderNo();
        $sbiPayment->save();
        $sbiPayment->refresh();

        $orderid  = $sbiPayment->orderno;
        $postingAmount = $sbiPayment->amount;
        $merchantCountry = 'IN';
        $merchantCurrency = 'INR';
        $aggregatorId = 'SBIEPAY';
        $merchantCustomerId = 2;
        $payMode = 'NB';
        $accessMedium = 'ONLINE';
        $transactionSource = 'ONLINE';


        $requestParameter  = "$this->merchantId|DOM|$merchantCountry|$merchantCurrency|1|Other|$this->successCallbackUrl|$this->failedCallbackUrl|$aggregatorId|$orderid|2|NB|$accessMedium|$transactionSource";

        $EncryptTrans = $this->encrypt($requestParameter);

        return view('payment.create')->with(['merchantId' => $this->merchantId, 'sbiPayment' => $sbiPayment, 'EncryptTrans' => $EncryptTrans]);
    }

    public function redirectPayment(Request $request)
    {

        $data = [
            'EncryptTrans' => $request->input('EncryptTrans'),
            'merchIdVal' => $request->input('merchIdVal'),
        ];

        try {
            $response = Http::post('https://test.sbiepay.sbi/secure/AggregatorHostedListener', $data);

            if ($response->successful()) {

                return response($response->body(), $response->status());
            } else {

                Log::error('SBI ePay Response Error: ', ['response' => $response->body()]);

                return response()->json(['error' => 'Request to external service failed', 'details' => $response->body()], 500);
            }
        } catch (\Exception $e) {

            Log::error('SBI ePay Request Error: ', ['error' => $e->getMessage()]);

            return response()->json(['error' => 'An unexpected error occurred'], 500);
        }
    }

    public function successResponse(Request $request)
    {
        if (!$request->encData && $request->encData == "")
            return "Please try again...";


        $decreptedData = $this->decrypt($request->encData, $this->key);
        $decreptedData = explode('|', $decreptedData);
        Log::error($decreptedData);

        if(!isset($decreptedData[0]))
            return "No response received";

        $paymentInfo = SbiPayment::where('orderno', $decreptedData[0])->first();
        if(!$paymentInfo)
            return "Something went wrong while validating payment details, contact support for further info.";

        try
        {
            DB::beginTransaction();

            $paymentInfo->status = SbiPayment::PAYMENT_STATUS_SUCCESSFUL;
            $paymentInfo->save();

            $service = DB::table('service_names')->where('service_id', $paymentInfo->service_id)->first();
            $targetTable = $service->model::find($paymentInfo->table_id);
            $targetTable->is_payment_paid = 1;
            $targetTable->payment_date = Carbon::now()->toDateString();
            $targetTable->save();
            DB::commit();

            // $doubleVerificationResponse = $this->doubleverificationReq($request->encData, $decreptedData[0]);

            // return $doubleVerificationResponse;

            // if ($doubleVerificationResponse['status'] == 'success') {
                return view('payment.success')->with('message', 'Payment and double verification successful!');
            // } else {
            //     return view('payment.success')->with('message', 'Payment successful, but double verification failed.');
            // }
        }
        catch(\Exception $e)
        {
            Log::info("Payment update failure on success page");
            Log::info($e);
            return "Something went wrong while validating payment details, contact support for further info.";
        }
    }

    public function failedResponse(Request $request)
    {
        if (!$request->encData && $request->encData == "")
            return "Please try again...";


        $decreptedData = $this->decrypt($request->encData, $this->key);
        $decreptedData = explode('|', $decreptedData);
        Log::error("Payment failed : ");
        Log::error($decreptedData);

        $paymentInfo = SbiPayment::where('orderno', $decreptedData[0])->first();

        if($paymentInfo)
        {
            $paymentInfo->status = SbiPayment::PAYMENT_STATUS_FAILED;
            $paymentInfo->save();
        }

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
            Log::error('SBI Double Verification Error:', ['data' => $response->json(), 'status' => $response->status() ]);
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
