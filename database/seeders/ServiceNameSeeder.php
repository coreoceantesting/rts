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
                'model' => '\App\Models\PropertyTax\NoDueCertificate',
                'add_route' => 'no-dues.create',
                'edit_route' => 'no-dues.edit'
            ],
            [
                'service_id' => 3,
                'service_name' => 'Property Tax Assessment',
                'model' => '\App\Models\PropertyTax\PropertyTaxAssessment',
                'add_route' => 'issuance-of-property-tax.create',
                'edit_route' => 'issuance-of-property-tax.edit'
            ],
            [
                'service_id' => 4,
                'service_name' => 'Transfer Property Certificate',
                'model' => '\App\Models\PropertyTax\TransferPropertyCertificate',
                'add_route' => 'transfer-property.create',
                'edit_route' => 'transfer-property.edit'
            ],
            [
                'service_id' => 5,
                'service_name' => 'New Taxation',
                'model' => '\App\Models\PropertyTax\Newtaxation',
                'add_route' => 'new-taxation.create',
                'edit_route' => 'new-taxation.edit'
            ],
            [
                'service_id' => 5,
                'service_name' => 'Self Assessment',
                'model' => '\App\Models\PropertyTax\SelfAssessment',
                'add_route' => 'self-assessment.create',
                'edit_route' => 'self-assessment.edit'
            ],
            [
                'service_id' => 6,
                'service_name' => 'Tax Demands',
                'model' => '\App\Models\PropertyTax\TaxDemand',
                'add_route' => 'tax-demand.create',
                'edit_route' => 'tax-demand.edit'
            ],
            [
                'service_id' => 7,
                'service_name' => 'Tax Exemption',
                'model' => '\App\Models\PropertyTax\TaxExemption',
                'add_route' => 'tax-exemption.create',
                'edit_route' => 'tax-exemption.edit'
            ],
            [
                'service_id' => 8,
                'service_name' => 'ReTaxation',
                'model' => '\App\Models\PropertyTax\ReTaxation',
                'add_route' => 'retaxation.create',
                'edit_route' => 'retaxation.edit'
            ],
            [
                'service_id' => 10,
                'service_name' => 'Registration Of Objection',
                'model' => '\App\Models\PropertyTax\RegistrationOfObjection',
                'add_route' => 'registration-of-objection.create',
                'edit_route' => 'registration-of-objection.edit',
            ],
            [
                'service_id' => 11,
                'service_name' => 'Tax Exemption Non Resident Properties',
                'model' => '\App\Models\PropertyTax\TaxExemptionNonResidentProperties',
                'add_route' => 'tax-exemption-non-resident.create',
                'edit_route' => 'tax-exemption-non-resident.edit'
            ],
        ];

        foreach ($services as $service) {
            ServiceName::updateOrCreate([
                'service_id' => $service['service_id']
            ], [
                'service_id' => $service['service_id'],
                'service_name' => $service['service_name'],
                'model' => $service['model'],
                'add_route' => $service['add_route'],
                'edit_route' => $service['edit_route'],
            ]);
        }
    }
}
