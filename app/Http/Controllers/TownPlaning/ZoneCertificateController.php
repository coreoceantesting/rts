<?php

namespace App\Http\Controllers\TownPlaning;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ZoneCertificateController extends Controller
{
    public function index()
    {
        return true;
    }

    public function create()
    {
        return view('town-planing.zone-certificate.create');
    }

    public function store(Request $request)
    {
        return true;
    }

    public function edit(Request $request)
    {
        return true;
    }

    public function update(Request $request)
    {
        return true;
    }
}
