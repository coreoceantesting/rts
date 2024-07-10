<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ServiceName;

class ServiceNameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $services = [
            [
                'service_id' => 6,
                'service_name' => 'Tax Demands',
                'model' => '\App\Models\PropertyTax\TaxDemand'
            ]
        ];

        foreach ($services as $service) {
            ServiceName::updateOrCreate([
                'service_id' => $service['service_id']
            ], [
                'service_id' => $service['service_id'],
                'service_name' => $service['service_name'],
                'model' => $service['model']
            ]);
        }
    }
}
