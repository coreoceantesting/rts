<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MyApplicationService
{
    public function getApplicationList()
    {
        $mergedData = collect([]);

        // $newtaxations = DB::table('newtaxations')->select('application_no', 'newtaxations')
        // Append data from each table to the collection
        $mergedData = $mergedData->concat($mergedData);
        $mergedData = $mergedData->concat($mergedData);
    }
}
