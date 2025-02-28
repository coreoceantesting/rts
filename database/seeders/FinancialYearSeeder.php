<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FinancialYearSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $financial_years = range(1990, 2050);

        foreach ($financial_years as $year) {
            DB::table('financial_years')->insert([
                'year' => $year,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
