<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->call([
            PermissionTableSeeder::class,
            DefaultLoginUserSeeder::class,
            ServiceCredentialSeeder::class,
            ServiceNameSeeder::class,
            ServiceSeeder::class,
            MastersSeeder::class,
            FinancialYearSeeder::class
        ]);
    }
}
