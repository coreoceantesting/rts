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
                'service_id' => 2,
                'service_name' => 'No Due Certificate',
                'model' => '\App\Models\PropertyTax\NoDueCertificate'
            ],
            [
                'service_id' => 3,
                'service_name' => 'Property Tax Assessment',
                'model' => '\App\Models\PropertyTax\PropertyTaxAssessment'
            ],
            [
                'service_id' => 4,
                'service_name' => 'Transfer Property Certificate',
                'model' => '\App\Models\PropertyTax\TransferPropertyCertificate'
            ],
            [
                'service_id' => 5,
                'service_name' => 'New Taxation',
                'model' => '\App\Models\PropertyTax\Newtaxation'
            ],
            [
                'service_id' => 5,
                'service_name' => 'Self Assessment',
                'model' => '\App\Models\PropertyTax\SelfAssessment'
            ],
            [
                'service_id' => 6,
                'service_name' => 'Tax Demands',
                'model' => '\App\Models\PropertyTax\TaxDemand'
            ],
            [
                'service_id' => 7,
                'service_name' => 'Tax Exemption',
                'model' => '\App\Models\PropertyTax\TaxExemption'
            ],
            [
                'service_id' => 8,
                'service_name' => 'ReTaxation',
                'model' => '\App\Models\PropertyTax\ReTaxation'
            ],
            [
                'service_id' => 10,
                'service_name' => 'Registration Of Objection',
                'model' => '\App\Models\PropertyTax\RegistrationOfObjection'
            ],
            [
                'service_id' => 11,
                'service_name' => 'Tax Exemption Non Resident Properties',
                'model' => '\App\Models\PropertyTax\TaxExemptionNonResidentProperties'
            ],
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
