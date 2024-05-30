<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServiceInformationController extends Controller
{
    public function serviceInformation()
    {
        return view('service_information.index');
    }
}
