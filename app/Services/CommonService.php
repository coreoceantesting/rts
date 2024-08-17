<?php

namespace App\Services;

use App\Models\Ward;
use App\Models\Zone;

class CommonService
{
    public function getActiveWard()
    {
        return Ward::where('status', 1)->get();
    }

    public function getActiveZone()
    {
        return Zone::where('status', 1)->get();
    }
}
