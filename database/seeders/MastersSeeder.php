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

        //         'service_name_id' => '8898',
        //         'fees' => 100,
        //     ],
        //     [

        //         'service_name_id' => '6748',
        //         'fees' => 100,
        //     ],
        // ];

        // foreach ($fees as $fee) {
        //     Fees::updateOrCreate(
        //         ['service_name_id' => $fee['service_name_id']], // Unique constraint (change if needed)
        //         ['fees' => $fee['fees']]
        //     );
        // }
    }
}
