<?php

namespace App\Http\Controllers\ConstructionDepartment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RoadCuttingPermissionController extends Controller
{
    public function index()
    {
        return true;
    }

    public function create()
    {
        return view('construction-department.road-cutting.create');
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
