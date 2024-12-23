<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index()
    {
        return view('payment.payment');
    }
    public function showPaymentPage()
    {
        $title = "Payment Page";  // Define the title variable
        return view('payment', compact('title'));  // Pass the title to the view
    }
}
