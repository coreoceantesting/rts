<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Fees;

class MastersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $fees = [

        //     [
        //         'id' => 49,
        //         'service_name' => 'Road Cutting Permission',
        //         'fees' => 100,
        //     ],
        //     [
        //         'id' => 48,
        //         'service_name' => 'Giving Part Map',
        //         'fees' => 100,
        //     ],
        // ];

        // foreach ($fees as $fee) {
        //     Fees::updateOrCreate([
        //         'id' => $fee['id']
        //     ], [
        //         'id' => $fee['id'],
        //         'service_name' => $fee['service_name'],
        //         'fees' => $fee['fees'],
        //         'dep_service_id' => $fee['dep_service_id']
        //     ]);
        // }
    }
}
