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
            [
                'service_id' => 21,
                'service_name' => 'New Water Connection',
                'model' => '\App\Models\WaterDepartment\Waternewconnection',
                'add_route' => 'water-new-connection.create',
                'edit_route' => 'water-new-connection.edit'
            ],
            [
                'service_id' => 22,
                'service_name' => 'Complaint Of Illegal Water Connection',
                'model' => '\App\Models\WaterDepartment\Illegalwaterconnection',
                'add_route' => 'water-illegal-connection.create',
                'edit_route' => 'water-illegal-connection.edit'
            ],
            [
                'service_id' => 23,
                'service_name' => 'Making Change In Ownership',
                'model' => '\App\Models\WaterDepartment\WaterChangeOwnership',
                'add_route' => 'water-change-ownership.create',
                'edit_route' => 'water-change-ownership.edit'
            ],
            [
                'service_id' => 24,
                'service_name' => 'Making Change In Water Connection Size',
                'model' => '\App\Models\WaterDepartment\WaterChangeConnectionSize',
                'add_route' => 'water-connection-size-change.create',
                'edit_route' => 'water-connection-size-change.edit'
            ],
            [
                'service_id' => 15,
                'service_name' => 'Water Reconnection',
                'model' => '\App\Models\WaterDepartment\WaterReconnection',
                'add_route' => 'water-reconnection.create',
                'edit_route' => 'water-reconnection.edit'
            ],
            [
                'service_id' => 16,
                'service_name' => 'Disconnection Water Supply',
                'model' => '\App\Models\WaterDepartment\WaterDisconnectSupply',
                'add_route' => 'water-disconnect-supply.create',
                'edit_route' => 'water-disconnect-supply.edit'
            ],
            [
                'service_id' => 17,
                'service_name' => 'Connection Usage Change',
                'model' => '\App\Models\WaterDepartment\WaterChangeInUse',
                'add_route' => 'water-change-connection-usage.create',
                'edit_route' => 'water-change-connection-usage.edit'
            ],
            [
                'service_id' => 18,
                'service_name' => 'Preparation Of Water Tax Bill',
                'model' => '\App\Models\WaterDepartment\WaterTaxBill',
                'add_route' => 'water-Tax-bill.create',
                'edit_route' => 'water-Tax-bill.edit'
            ],
            [
                'service_id' => 5,
                'service_name' => 'No Dues Certificate Water Supply',
                'model' => '\App\Models\WaterDepartment\WaterNoDues',
                'add_route' => 'water-no-dues.create',
                'edit_route' => 'water-no-dues.edit'
            ],
            [
                'service_id' => 20,
                'service_name' => 'Unavailability Of Water Supply',
                'model' => '\App\Models\WaterDepartment\WaterUnavailabilitySupply',
                'add_route' => 'water-unavailability-supply.create',
                'edit_route' => 'water-unavailability-supply.edit'
            ],
            [
                'service_id' => 25,
                'service_name' => 'Complaint Of Defective Water Meter',
                'model' => '\App\Models\WaterDepartment\WaterDefectiveMeter',
                'add_route' => 'water-defective-meter.create',
                'edit_route' => 'water-defective-meter.edit'
            ],
            [
                'service_id' => 26,
                'service_name' => 'Complaint Of Water Pressure',
                'model' => '\App\Models\WaterDepartment\WaterPressureComplaint',
                'add_route' => 'water-pressure-complaint.create',
                'edit_route' => 'water-pressure-complaint.edit'
            ],
            [
                'service_id' => 27,
                'service_name' => 'Complaint Of Water Quality',
                'model' => '\App\Models\WaterDepartment\WaterQualityComplaint',
                'add_route' => 'water-quality-complaint.create',
                'edit_route' => 'water-quality-complaint.edit'
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
