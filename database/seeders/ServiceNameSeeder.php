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
                'service_name' => 'Auto Renewal of Trade License / व्यवसाय परवाना स्वयंनुतनीकरण',
                'model' => '\App\Models\Trade\TradeAutoRenewalLicensePermission',
                'add_route' => 'trade-autorenewal-license.create',
                'edit_route' => 'trade-autorenewal-license.edit'
            ],
            [
                'service_id' => 35,
                'service_name' => 'Transfer Of Trade License Permission / व्यवसाय परवाना हस्तांतरण करणे',
                'model' => '\App\Models\Trade\TradeLicenseTransfer',
                'add_route' => 'trade-license-transfer.create',
                'edit_route' => 'trade-license-transfer.edit'
            ],
            [
                'service_id' => 36,
                'service_name' => 'Trade License Permission Secondry Copy / व्यवसाय परवाना दुय्यम प्रत मिळणे',
                'model' => '\App\Models\Trade\TradePerLicense',
                'add_route' => 'trade-per-license.create',
                'edit_route' => 'trade-per-license.edit'
            ],
            [
                'service_id' => 37,
                'service_name' => 'NOC for Pandal/Mandap / मंडपासाठी ना हरकत प्रमाणपत्र',
                'model' => '\App\Models\Trade\TradeNocForMandap',
                'add_route' => 'trade-noc-mandap.create',
                'edit_route' => 'trade-noc-mandap.edit'
            ],
            [
                'service_id' => 38,
                'service_name' => 'Trade License Name Change Request / व्यवसायाचे नाव बदलणे',
                'model' => '\App\Models\Trade\TradeChangeLicenseName',
                'add_route' => 'trade-change-license-name.create',
                'edit_route' => 'trade-change-license-name.edit'
            ],
            [
                'service_id' => 39,
                'service_name' => 'Trade License Type Change Request / व्यवसाय (प्रकार) बदलणे',
                'model' => '\App\Models\Trade\TradeChangeLicenseType',
                'add_route' => 'trade-change-license-type.create',
                'edit_route' => 'trade-change-license-type.edit'
            ],
            [
                'service_id' => 41,
                'service_name' => 'Cancellation of Trade License / व्यवसाय परवाना रद्द करणे',
                'model' => '\App\Models\Trade\TradeLicenseCancellation',
                'add_route' => 'trade-license-cancellation.create',
                'edit_route' => 'trade-license-cancellation.edit'
            ],
            [
                'service_id' => 43,
                'service_name' => 'License Partner Count Change / भागीदाराच्या संख्येत बदल (वाढ/ कमी)',
                'model' => '\App\Models\Trade\TradeChangeOwnerCount',
                'add_route' => 'trade-change-owner-count.create',
                'edit_route' => 'trade-change-owner-count.edit'
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
            [
                'service_id' => 183,
                'service_name' => 'Issuance Of Fire No Objection Certificate(Fire)',
                'model' => '\App\Models\FireDepartment\FireNoObjection',
                'add_route' => 'fire-no-objection.create',
                'edit_route' => 'fire-no-objection.edit'
            ],
            [
                'service_id' => 184,
                'service_name' => 'Issuance Of Final Fire No Objection Certificate (Fire)',
                'model' => '\App\Models\FireDepartment\FireFinalNoObjection',
                'add_route' => 'fire-final-no-objection.create',
                'edit_route' => 'fire-final-no-objection.edit'
            ],
            [
                'service_id' => 185,
                'service_name' => 'Issuance of zone certificate',
                'model' => '\App\Models\CityStructure\CityStructureZoneCertificate',
                'add_route' => 'town-planing-zone-certificate.create',
                'edit_route' => 'town-planing-zone-certificate.edit'
            ],
            [
                'service_id' => 186,
                'service_name' => 'Giving Part Map',
                'model' => '\App\Models\CityStructure\CityStructurePartMap',
                'add_route' => 'town-planing-bhag-nakasha.create',
                'edit_route' => 'town-planing-bhag-nakasha.edit'
            ],
            [
                'service_id' => 187,
                'service_name' => 'Road Cutting Permission',
                'model' => '\App\Models\ConstructionDepartment\ConstructionRoadCutting',
                'add_route' => 'construction-road-cutting.create',
                'edit_route' => 'construction-road-cutting.edit'
            ],
            [
                'service_id' => 188,
                'service_name' => 'Jal Mal Nissaran Connection',
                'model' => '\App\Models\ConstructionDepartment\ConstructionDrainageConnection',
                'add_route' => 'construction-drainage-connection.create',
                'edit_route' => 'construction-drainage-connection.edit'
            ],
            [
                'service_id' => 2001,
                'service_name' => 'Abattoir License',
                'model' => '\App\Models\AbattoirLicense',
                'add_route' => 'abattoir-license.create',
                'edit_route' => 'abattoir-license.edit'
            ],
            [
                'service_id' => 2002,
                'service_name' => 'Advertizement Permission',
                'model' => '\App\Models\AdvertisementPermission',
                'add_route' => 'advertisement-permission.create',
                'edit_route' => 'advertisement-permission.edit'
            ],
            [
                'service_id' => 2003,
                'service_name' => 'Gardens Filming and Photography Permission',
                'model' => '\App\Models\GardensFilming',
                'add_route' => 'gardens-filming.create',
                'edit_route' => 'gardens-filming.edit'
            ],
            [
                'service_id' => 2004,
                'service_name' => 'Health License',
                'model' => '\App\Models\HealthLicense',
                'add_route' => 'health-license.create',
                'edit_route' => 'health-license.edit'
            ],
            [
                'service_id' => 2005,
                'service_name' => 'Hoarding Permission  ',
                'model' => '\App\Models\HoardingPermission',
                'add_route' => 'hoarding-permission.create',
                'edit_route' => 'hoarding-permission.edit'
            ],
            [
                'service_id' => 241,
                'service_name' => 'Occupancy Completion Certificate  ',
                'model' => '\App\Models\OccupancyCertificate',
                'add_route' => 'occupancy-certification.create',
                'edit_route' => 'occupancy-certification.edit'
            ],
            [
                'service_id' => 2006,
                'service_name' => 'Park Culture Permission  ',
                'model' => '\App\Models\ParkCulturePermission',
                'add_route' => 'park-culture.create',
                'edit_route' => 'park-culture.edit'
            ],
            [
                'service_id' => 2008,
                'service_name' => 'Permission for Shooting ',
                'model' => '\App\Models\PermissionShooting',
                'add_route' => 'permission-shooting.create',
                'edit_route' => 'permission-shooting.edit'
            ],

            [
                'service_id' => 240,
                'service_name' => 'Issue Plinth Completion Certificate ',
                'model' => '\App\Models\PlinthCertificate',
                'add_route' => 'plinth-certification.create',
                'edit_route' => 'plinth-certification.edit'
            ],
            [
                'service_id' => 2007,
                'service_name' => 'Permission For PMCs Owned ground for temporary rent ',
                'model' => '\App\Models\permissionForPmcOwn',
                'add_route' => 'pmc-owned.create',
                'edit_route' => 'pmc-owned.edit'
            ],
            [
                'service_id' => 2008,
                'service_name' => 'Permission for Shooting ',
                'model' => '\App\Models\PermissionShooting',
                'add_route' => 'permission-shooting.create',
                'edit_route' => 'permission-shooting.edit'
            ],

            [
                'service_id' => 2009,
                'service_name' => 'Projection And Stall Board License ',
                'model' => '\App\Models\StallBoardLicense',
                'add_route' => 'stallboard-license.create',
                'edit_route' => 'stallboard-license.edit'
            ],

            [
                'service_id' => 2010,
                'service_name' => 'Tents Permission On Temporarily Basis',
                'model' => '\App\Models\TentsPermission',
                'add_route' => 'tents-permission.create',
                'edit_route' => 'tents-permission.edit'
            ],
            [
                'service_id' => 2011,
                'service_name' => 'Permission for PMCs Owned School Classrooms & Classrooms For Rent',
                'model' => '\App\Models\ClassroomsForRent',
                'add_route' => 'classroom-rent.create',
                'edit_route' => 'classroom-rent.edit'
            ],
            [
                'service_id' => 2012,
                'service_name' => 'permission for Procession and Parade',
                'model' => '\App\Models\ProcessionAndParade',
                'add_route' => 'procession-parade.create',
                'edit_route' => 'procession-parade.edit'
            ],
            [
                'service_id' => 2013,
                'service_name' => 'To Record Objection',
                'model' => '\App\Models\RecordObjections',
                'add_route' => 'record-objections.create',
                'edit_route' => 'record-objections.edit'
            ],
            [
                'service_id' => 2014,
                'service_name' => 'Mobile Tower Permission',
                'model' => '\App\Models\MobileTower',
                'add_route' => 'mobile-tower.create',
                'edit_route' => 'mobile-tower.edit'
            ],
            [
                'service_id' => 2015,
                'service_name' => 'NOC of Municipality for State License Of Food Business',
                'model' => '\App\Models\StateLicense',
                'add_route' => 'state-license.create',
                'edit_route' => 'state-license.edit'
            ],

            [
                'service_id' => 2016,
                'service_name' => 'Health NOC of municipality for state license of food business',
                'model' => '\App\Models\HealthNocMunci',
                'add_route' => 'healthnoc-munici.create',
                'edit_route' => 'healthnoc-munici.edit'
            ],
            [
                'service_id' => 2017,
                'service_name' => 'Movable Advertisement Permission',
                'model' => '\App\Models\MovableAdvertisementPermission',
                'add_route' => 'movable-advertisement.create',
                'edit_route' => 'movable-advertisement.edit'
            ],

            [
                'service_id' => 2018,
                'service_name' => 'CFC',
                'model' => '\App\Models\Cfc',
                'add_route' => 'cfc.create',
                'edit_route' => 'cfc.edit'
            ],
            [
                'service_id' => 2020,
                'service_name' => 'New Tax Assessment',
                'model' => '\App\Models\NewTaxAssessment',
                'add_route' => 'newtax-assessment.create',
                'edit_route' => 'newtax-assessment.edit'
            ],
            [
                'service_id' => 2021,
                'service_name' => 'Division Of Property In Sub Division',
                'model' => '\App\Models\DivSubDivision',
                'add_route' => 'divsub-division.create',
                'edit_route' => 'divsub-division.edit'
            ],
            [
                'service_id' => 2022,
                'service_name' => 'Tax Assessment On Demolishing And Reconstruction Of The Property',
                'model' => '\App\Models\DemolishingProperty',
                'add_route' => 'demolishingproperty.create',
                'edit_route' => 'demolishingproperty.edit'
            ],
            [
                'service_id' => 2023,
                'service_name' => 'Trade NOC',
                'model' => '\App\Models\Trade\TradeNoc',
                'add_route' => 'tradenoc.create',
                'edit_route' => 'tradenoc.edit'
            ],

            [
                'service_id' => 2024,
                'service_name' => 'Issuance of Nursing Home License',
                'model' => '\App\Models\MedicalHealth\GrantNursingLicense',
                'add_route' => 'grantnursing-license.create',
                'edit_route' => 'grantnursing-license.edit'
            ],

            [
                'service_id' => 2025,
                'service_name' => 'Renewal of Nursing Home License',
                'model' => '\App\Models\MedicalHealth\RenewalNursingLicense',
                'add_route' => 'renewnursing-license.create',
                'edit_route' => 'renewnursing-license.edit'
            ],

            [
                'service_id' => 2026,
                'service_name' => 'Change of name of license',
                'model' => '\App\Models\MedicalHealth\changenursing-license',
                'add_route' => 'changenursing-license.create',
                'edit_route' => 'changenursing-license.edit'
            ],
            [
                'service_id' => 2027,
                'service_name' => 'Licensing Of Lodging Houses',
                'model' => '\App\Models\Trade\LicenseLoadgingHouse',
                'add_route' => 'trade-license-loading.create',
                'edit_route' => 'trade-license-loading.edit'
            ],
            [
                'service_id' => 2028,
                'service_name' => 'Renewal of Lodging House License',
                'model' => '\App\Models\Trade\RenewLicenseLoadging',
                'add_route' => 'trade-renew-license-loading.create',
                'edit_route' => 'trade-renew-license-loading.edit'
            ],
            [
                'service_id' => 2029,
                'service_name' => 'Issuance of license for marriage hall',
                'model' => '\App\Models\Trade\IssuanceLicenseMarriage',
                'add_route' => 'trade-issuance-license-marriage.create',
                'edit_route' => 'trade-issuance-license-marriage.edit'
            ],
            [
                'service_id' => 2030,
                'service_name' => 'Renewal of marriage hall',
                'model' => '\App\Models\Trade\RenewMarriageLicense',
                'add_route' => 'trade-renew-license-marriage.create',
                'edit_route' => 'trade-renew-license-marriage.edit'
            ],
            [
                'service_id' => 2031,
                'service_name' => 'Issuance of hawker registration certificate',
                'model' => '\App\Models\Nulm\HawkerRegister',
                'add_route' => 'hawker-register.create',
                'edit_route' => 'hawker-register.edit'
            ],
            [
                'service_id' => 2032,
                'service_name' => 'Granting permission for laying underground telecommunication ducts',
                'model' => '\App\Models\Pwd\GrantingTelecom',
                'add_route' => 'grant-telecome.create',
                'edit_route' => 'grant-telecome.edit'
            ],
            [
                'service_id' => 2033,
                'service_name' => 'Urban Areas Tree Protection',
                'model' => '\App\Models\TreeAuth\TreeProtection',
                'add_route' => 'tree-protection.create',
                'edit_route' => 'tree-protection.edit'
            ],
            [
                'service_id' => 2034,
                'service_name' => 'Movie Shooting License (Movie Shooting License) New License and Renewaln',
                'model' => '\App\Models\Trade\MovieShooting',
                'add_route' => 'movie-shooting.create',
                'edit_route' => 'movie-shooting.edit'
            ],
            [
                'service_id' => 2035,
                'service_name' => 'To issue building permission',
                'model' => '\App\Models\TownPlanning\BuildingPermission',
                'add_route' => 'town-building-permission.create',
                'edit_route' => 'town-building-permission.edit'
            ],

        ];


        foreach ($services as $service) {
            ServiceName::updateOrCreate(
                [
                    'service_id' => $service['service_id']
                ],
                [
                    'service_id' => $service['service_id'],
                    'service_name' => $service['service_name'],
                    'model' => $service['model'],
                    'add_route' => $service['add_route'],
                    'edit_route' => $service['edit_route'],
                ]
            );
        }
    }
}
