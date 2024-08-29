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
                'service_id' => 9,
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
                'service_name' => 'New Water Connection / नविन नळजोडणी',
                'model' => '\App\Models\WaterDepartment\Waternewconnection',
                'add_route' => 'water-new-connection.create',
                'edit_route' => 'water-new-connection.edit'
            ],
            [
                'service_id' => 22,
                'service_name' => 'Complaint Of Illegal Water Connection / अनधिकृत नळ जोडणी तक्रार',
                'model' => '\App\Models\WaterDepartment\Illegalwaterconnection',
                'add_route' => 'water-illegal-connection.create',
                'edit_route' => 'water-illegal-connection.edit'
            ],
            [
                'service_id' => 23,
                'service_name' => 'Making Change In Ownership / मालकी हक्कात बदल करणे',
                'model' => '\App\Models\WaterDepartment\WaterChangeOwnership',
                'add_route' => 'water-change-ownership.create',
                'edit_route' => 'water-change-ownership.edit'
            ],
            [
                'service_id' => 24,
                'service_name' => 'Making Change In Water Connection Size / नळजोडणी आकारामध्ये बदल करणे',
                'model' => '\App\Models\WaterDepartment\WaterChangeConnectionSize',
                'add_route' => 'water-connection-size-change.create',
                'edit_route' => 'water-connection-size-change.edit'
            ],
            [
                'service_id' => 15,
                'service_name' => 'Water Re Connection / पुनः जोडणी करणे',
                'model' => '\App\Models\WaterDepartment\WaterReconnection',
                'add_route' => 'water-reconnection.create',
                'edit_route' => 'water-reconnection.edit'
            ],
            [
                'service_id' => 16,
                'service_name' => 'Disconnection Water Supply / तात्पुरते किंवा कायमस्वरूपी नळजोडणी खंडीत करणे',
                'model' => '\App\Models\WaterDepartment\WaterDisconnectSupply',
                'add_route' => 'water-disconnect-supply.create',
                'edit_route' => 'water-disconnect-supply.edit'
            ],
            [
                'service_id' => 17,
                'service_name' => 'Connection Usage Change / नळजोडणीच्या वापरामध्ये बदल करणे',
                'model' => '\App\Models\WaterDepartment\WaterChangeInUse',
                'add_route' => 'water-change-connection-usage.create',
                'edit_route' => 'water-change-connection-usage.edit'
            ],
            [
                'service_id' => 18,
                'service_name' => 'Preparation Of Water Tax Bill / पाणी देयक तयार करणे',
                'model' => '\App\Models\WaterDepartment\WaterTaxBill',
                'add_route' => 'water-Tax-bill.create',
                'edit_route' => 'water-Tax-bill.edit'
            ],
            [
                'service_id' => 19,
                'service_name' => 'No Dues Certificate Water Supply / थकबाकी नसल्याचा दाखला ( पाणी पुरवठा )',
                'model' => '\App\Models\WaterDepartment\WaterNoDues',
                'add_route' => 'water-no-dues.create',
                'edit_route' => 'water-no-dues.edit'
            ],
            [
                'service_id' => 20,
                'service_name' => 'Unavailability Of Water Supply / पाणीपुरवठा जोडणी नसले बाबत प्रमाणपत्र',
                'model' => '\App\Models\WaterDepartment\WaterUnavailabilitySupply',
                'add_route' => 'water-unavailability-supply.create',
                'edit_route' => 'water-unavailability-supply.edit'
            ],
            [
                'service_id' => 25,
                'service_name' => 'Complaint Of Defective Water Meter / नादुरुस्त मिटर तक्रार करणे',
                'model' => '\App\Models\WaterDepartment\WaterDefectiveMeter',
                'add_route' => 'water-defective-meter.create',
                'edit_route' => 'water-defective-meter.edit'
            ],
            [
                'service_id' => 26,
                'service_name' => 'Complaint Of Water Pressure / पाण्याची दबाव क्षमता तक्रार',
                'model' => '\App\Models\WaterDepartment\WaterPressureComplaint',
                'add_route' => 'water-pressure-complaint.create',
                'edit_route' => 'water-pressure-complaint.edit'
            ],
            [
                'service_id' => 27,
                'service_name' => 'Complaint Of Water Quality / पाण्याची गुणवत्ता तक्रार',
                'model' => '\App\Models\WaterDepartment\WaterQualityComplaint',
                'add_route' => 'water-quality-complaint.create',
                'edit_route' => 'water-quality-complaint.edit'
            ],
            [
                'service_id' => 30,
                'service_name' => 'Plumber License / प्लंबर परवाना',
                'model' => '\App\Models\WaterDepartment\WaterPlumberLicense',
                'add_route' => 'trade-plumber-license.create',
                'edit_route' => 'trade-plumber-license.edit'
            ],
            [
                'service_id' => 31,
                'service_name' => 'Renewal Of Plumber License / प्लंबर परवाना नुतनीकरण करणे',
                'model' => '\App\Models\WaterDepartment\WaterRenewalOfPlumber',
                'add_route' => 'renewal-plumber-license.create',
                'edit_route' => 'renewal-plumber-license.edit'
            ],
            [
                'service_id' => 32,
                'service_name' => 'New Trade License Permission / नवीन व्यवसाय परवाना मिळणे',
                'model' => '\App\Models\Trade\TradeNewLicensePermission',
                'add_route' => 'trade-new-license.create',
                'edit_route' => 'trade-new-license.edit'
            ],
            [
                'service_id' => 33,
                'service_name' => 'Renewal Of Trade License Permission',
                'model' => '\App\Models\Trade\TradeRenewalLicensePermission',
                'add_route' => 'trade-renewal-license.create',
                'edit_route' => 'trade-renewal-license.edit'
            ],
            [
                'service_id' => 34,
                'service_name' => 'Auto Renewal of Trade License',
                'model' => '\App\Models\Trade\TradeAutoRenewalLicensePermission',
                'add_route' => 'trade-autorenewal-license.create',
                'edit_route' => 'trade-autorenewal-license.edit'
            ],
            [
                'service_id' => 35,
                'service_name' => 'Transfer Of Trade License Permission',
                'model' => '\App\Models\Trade\TradeLicenseTransfer',
                'add_route' => 'trade-license-transfer.create',
                'edit_route' => 'trade-license-transfer.edit'
            ],
            [
                'service_id' => 36,
                'service_name' => 'Trade License Permission Secondry Copy',
                'model' => '\App\Models\Trade\TradePerLicense',
                'add_route' => 'trade-per-license.create',
                'edit_route' => 'trade-per-license.edit'
            ],
            [
                'service_id' => 37,
                'service_name' => 'NOC for Pandal/Mandap',
                'model' => '\App\Models\Trade\TradeNocForMandap',
                'add_route' => 'trade-noc-mandap.create',
                'edit_route' => 'trade-noc-mandap.edit'
            ],
            [
                'service_id' => 38,
                'service_name' => 'Trade License Name Change Request',
                'model' => '\App\Models\Trade\TradeChangeLicenseName',
                'add_route' => 'trade-change-license-name.create',
                'edit_route' => 'trade-change-license-name.edit'
            ],
            [
                'service_id' => 39,
                'service_name' => 'Trade License Type Change Request',
                'model' => '\App\Models\Trade\TradeChangeLicenseType',
                'add_route' => 'trade-change-license-type.create',
                'edit_route' => 'trade-change-license-type.edit'
            ],
            // [
            //     'service_id' => 40,
            //     'service_name' => 'License Partner Count Change',
            //     'model' => '\App\Models\Trade\TradeChangeOwnerCount',
            //     'add_route' => 'trade-change-owner-count.create',
            //     'edit_route' => 'trade-change-owner-count.edit'
            // ],
            [
                'service_id' => 41,
                'service_name' => 'Cancellation of Trade License',
                'model' => '\App\Models\Trade\TradeLicenseCancellation',
                'add_route' => 'trade-license-cancellation.create',
                'edit_route' => 'trade-license-cancellation.edit'
            ],
            // [
            //     'service_id' => 36,
            //     'service_name' => 'License Partner Name Change',
            //     'model' => '\App\Models\Trade\TradeChangeOwnerName',
            //     'add_route' => 'trade-change-owner-name.create',
            //     'edit_route' => 'trade-change-owner-name.edit'
            // ],
            [
                'service_id' => 75,
                'service_name' => 'ISSUANCE OF MARRIAGE REGISTRATION CERTIFICATE',
                'model' => '\App\Models\Marriage\MarriageRegistrationForm',
                'add_route' => 'marriage-registration.create',
                'edit_route' => 'marriage-registration.edit'
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
