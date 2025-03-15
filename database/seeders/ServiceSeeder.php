<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Service;
use Log;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $services = [
            [
                "id" => 1,
                "service_id" => null,
                "name" => "बांधकाम विभाग",
                "image" => "service/ZolWqfXTl0JjOWRUNdfaVuw1iF5Ktu1EghTWS4n0.png",
                "is_parent" => 0,
                "route_name" => null,
                'table_name' => null,
                "background_color" => "#b73107",
                "created_at" => "2024-06-10 10:51:08",
                "updated_at" => "2024-06-10 10:51:08"
            ],
            // [
            //     "id" => 2,
            //     "service_id" => null,
            //     "name" => "जन्म मृत्यु",
            //     "image" => "service/7eVpBS7RVfTqlmbuNHw77MXqUn6wkrWH2wbzwYZP.png",
            //     "is_parent" => 0,
            //     "route_name" => null,
            //     "background_color" => "#037ca2",
            //     "created_at" => "2024-06-10 10:52:11",
            //     "updated_at" => "2024-06-10 10:52:11"
            // ],
            [
                "id" => 3,
                "service_id" => null,
                "name" => "नगर रचना",
                "image" => "service/AfnTCgdUcscvA2QB4RTi6akZo18UpZKWf0GPJIkn.png",
                "is_parent" => 0,
                "route_name" => null,
                'table_name' => null,
                "background_color" => "#037ca2",
                "created_at" => "2024-06-10 10:53:10",
                "updated_at" => "2024-06-10 10:53:10"
            ],
            [
                "id" => 4,
                "service_id" => null,
                "name" => "विवाह नोंदणी",
                "image" => "service/8apAFL7HgTwAWfvScbYuChPeKS2vbgYTajhjh2tR.png",
                "is_parent" => 0,
                "route_name" => null,
                'table_name' => null,
                "background_color" => "#00aea4",
                "created_at" => "2024-06-10 10:54:22",
                "updated_at" => "2024-06-10 10:58:36"
            ],
            [
                "id" => 5,
                "service_id" => null,
                "name" => "मालमत्ता कर विभाग",
                "image" => "service/LZ1aYUYeixkG7JStMf51o1AZz3l4qTPGMZwJtsnG.png",
                "is_parent" => 0,
                "route_name" => null,
                'table_name' => null,
                "background_color" => "#2a85c7",
                "created_at" => "2024-06-10 10:55:02",
                "updated_at" => "2024-06-10 10:55:02"
            ],
            [
                "id" => 6,
                "service_id" => null,
                "name" => "नळजोडणी विभाग",
                "image" => "service/ATrZemjqMVDgfjWV7bsu7ZIUZRzG9hVSwp5N7Z5E.png",
                "is_parent" => 0,
                "route_name" => null,
                'table_name' => null,
                "background_color" => "#b73107",
                "created_at" => "2024-06-10 10:56:18",
                "updated_at" => "2024-06-10 10:56:18"
            ],
            [
                "id" => 7,
                "service_id" => null,
                "name" => "परवाना",
                "image" => "service/Mkkbnt9scijS9slt3nGARcS1nGAjaKS5vryKpixd.png",
                "is_parent" => 0,
                "route_name" => null,
                'table_name' => null,
                "background_color" => "#037ca2",
                "created_at" => "2024-06-10 10:57:07",
                "updated_at" => "2024-06-10 10:57:07"
            ],
            [
                "id" => 8,
                "service_id" => null,
                "name" => "अग्निशमन विभाग",
                "image" => "service/lycB5h8Do9CEWyzmiDFrjhLhrBQO9LK28gXWe0Zv.png",
                "is_parent" => 0,
                "route_name" => null,
                'table_name' => null,
                "background_color" => "#00aea4",
                "created_at" => "2024-06-10 10:57:51",
                "updated_at" => "2024-06-10 10:57:51"
            ],
            [
                "id" => 9,
                "service_id" => 5,
                "name" => "मालमत्ता कर उतारा देणे",
                "image" => null,
                'table_name' => "property_tax_issuance_of_property_tax_assessments",
                "is_parent" => 1,
                "route_name" => "issuance-of-property-tax.create",
                "background_color" => "#b73107",
                "created_at" => "2024-06-10 11:01:43",
                "updated_at" => "2024-06-10 11:01:43"
            ],
            [
                "id" => 10,
                "service_id" => 5,
                "name" => "थकबाकी नसल्याचा दाखला देणे (मालमत्ता)",
                "image" => null,
                'table_name' => "no_due_certificates",
                "is_parent" => 1,
                "route_name" => "no-dues.create",
                "background_color" => "#037ca2",
                "created_at" => "2024-06-10 11:02:14",
                "updated_at" => "2024-06-10 11:02:14"
            ],
            [
                "id" => 11,
                "service_id" => 5,
                "name" => "मालमत्ता हस्तांतरण नोंद प्रमाणपत्र देणे ( इतर मार्गाने )",
                "image" => null,
                'table_name' => "transfer_property_certificates",
                "is_parent" => 1,
                "route_name" => "transfer-property.create",
                "background_color" => "#00aea4",
                "created_at" => "2024-06-10 11:02:49",
                "updated_at" => "2024-06-10 11:02:49"
            ],
            [
                "id" => 12,
                "service_id" => 5,
                "name" => "नव्याने कर आकारणी",
                "image" => null,
                'table_name' => "newtaxations",
                "is_parent" => 1,
                "route_name" => "new-taxation.create",
                "background_color" => "#2a85c7",
                "created_at" => "2024-06-10 11:04:01",
                "updated_at" => "2024-06-10 11:04:01"
            ],
            [
                "id" => 13,
                "service_id" => 5,
                "name" => "पुन कर आकारणी",
                "image" => null,
                'table_name' => "re_taxations",
                "is_parent" => 1,
                "route_name" => "retaxation.create",
                "background_color" => "#b73107",
                "created_at" => "2024-06-10 11:04:39",
                "updated_at" => "2024-06-10 11:04:39"
            ],
            [
                "id" => 14,
                "service_id" => 5,
                "name" => "कराची मागणीपत्र तयार करणे",
                "image" => null,
                'table_name' => "tax_demands",
                "is_parent" => 1,
                "route_name" => "tax-demand.create",
                "background_color" => "#037ca2",
                "created_at" => "2024-06-10 11:12:21",
                "updated_at" => "2024-06-10 11:12:21"
            ],
            [
                "id" => 15,
                "service_id" => 5,
                "name" => "करमाफी मिळणे",
                "image" => null,
                'table_name' => "tax_exemptions",
                "is_parent" => 1,
                "route_name" => "tax-exemption.create",
                "background_color" => "#00aea4",
                "created_at" => "2024-06-10 11:13:10",
                "updated_at" => "2024-06-10 11:13:10"
            ],
            [
                "id" => 16,
                "service_id" => 5,
                "name" => "रहिवासी नसलेल्या मालमत्ताना करात सूट मिळणे",
                "image" => null,
                'table_name' => "tax_exemption_non_resident_properties",
                "is_parent" => 1,
                "route_name" => "tax-exemption-non-resident.create",
                "background_color" => "#2a85c7",
                "created_at" => "2024-06-10 11:14:16",
                "updated_at" => "2024-06-10 11:14:16"
            ],
            [
                "id" => 17,
                "service_id" => 9,
                "name" => "स्वयंमुल्यांकन",
                "image" => null,
                'table_name' => "self_assessments",
                "is_parent" => 1,
                "route_name" => "self-assessment.create",
                "background_color" => "#b73107",
                "created_at" => "2024-06-10 11:14:45",
                "updated_at" => "2024-06-10 11:14:45"
            ],
            [
                "id" => 18,
                "service_id" => 5,
                "name" => "आक्षेप नोंदविणे",
                "image" => null,
                'table_name' => "registration_of_objections",
                "is_parent" => 1,
                "route_name" => "registration-of-objection.create",
                "background_color" => "#b73107",
                "created_at" => "2024-06-10 11:22:43",
                "updated_at" => "2024-06-10 11:22:43"
            ],
            [
                "id" => 19,
                "service_id" => 6,
                "name" => "नविन नळजोडणी",
                "image" => null,
                'table_name' => "waternewconnections",
                "is_parent" => 1,
                "route_name" => "water-new-connection.create",
                "background_color" => "#b73107",
                "created_at" => "2024-06-10 11:34:06",
                "updated_at" => "2024-06-10 11:34:06"
            ],
            [
                "id" => 20,
                "service_id" => 6,
                "name" => "अनधिकृत नळ जोडणी तक्रार",
                "image" => null,
                'table_name' => "illegalwaterconnections",
                "is_parent" => 1,
                "route_name" => "water-illegal-connection.create",
                "background_color" => "#037ca2",
                "created_at" => "2024-06-10 11:34:44",
                "updated_at" => "2024-06-10 11:34:44"
            ],
            [
                "id" => 21,
                "service_id" => 6,
                "name" => "मालकी हक्कात बदल करणे",
                "image" => null,
                'table_name' => "water_change_ownerships",
                "is_parent" => 1,
                "route_name" => "water-change-ownership.create",
                "background_color" => "#00aea4",
                "created_at" => "2024-06-10 11:35:12",
                "updated_at" => "2024-06-10 11:35:12"
            ],
            [
                "id" => 22,
                "service_id" => 6,
                "name" => "नळजोडणी आकारामध्ये बदल करणे",
                "image" => null,
                'table_name' => "water_change_connection_sizes",
                "is_parent" => 1,
                "route_name" => 'water-connection-size-change.create',
                "background_color" => "#2a85c7",
                "created_at" => null,
                "updated_at" => null
            ],
            [
                "id" => 23,
                "service_id" => 6,
                "name" => "पुनः जोडणी करणे",
                "image" => null,
                'table_name' => "water_reconnections",
                "is_parent" => 1,
                "route_name" => "water-reconnection.create",
                "background_color" => "#b73107",
                "created_at" => null,
                "updated_at" => null
            ],
            [
                "id" => 24,
                "service_id" => 6,
                "name" => "तात्पुरते किंवा कायमस्वरूपी नळजोडणी खंडीत करणे",
                "image" => null,
                'table_name' => "water_disconnect_supplies",
                "is_parent" => 1,
                "route_name" => "water-disconnect-supply.create",
                "background_color" => "#037ca2",
                "created_at" => "2024-06-10 11:35:12",
                "updated_at" => "2024-06-10 11:35:12"
            ],
            [
                "id" => 25,
                "service_id" => 6,
                "name" => "नळजोडणीच्या वापरामध्ये बदल करणे",
                "image" => null,
                'table_name' => "water_change_in_uses",
                "is_parent" => 1,
                "route_name" => 'water-change-connection-usage.create',
                "background_color" => "#00aea4",
                "created_at" => null,
                "updated_at" => null
            ],
            [
                "id" => 26,
                "service_id" => 6,
                "name" => "पाणी देयक तयार करणे",
                "image" => null,
                'table_name' => "water_tax_bills",
                "is_parent" => 1,
                "route_name" => "water-Tax-bill.create",
                "background_color" => "#2a85c7",
                "created_at" => null,
                "updated_at" => null
            ],
            [
                "id" => 27,
                "service_id" => 6,
                "name" => "थकबाकी नसल्याचा दाखला ( पाणी पुरवठा )",
                "image" => null,
                'table_name' => "water_no_dues",
                "is_parent" => 1,
                "route_name" => "water-no-dues.create",
                "background_color" => "#b73107",
                "created_at" => null,
                "updated_at" => null
            ],
            [
                "id" => 28,
                "service_id" => 6,
                "name" => "पाणीपुरवठा जोडणी नसले बाबत प्रमाणपत्र",
                "image" => null,
                'table_name' => "water_unavailability_supplies",
                "is_parent" => 1,
                "route_name" => "water-unavailability-supply.create",
                "background_color" => "#037ca2",
                "created_at" => null,
                "updated_at" => null
            ],
            [
                "id" => 29,
                "service_id" => 6,
                "name" => "नादुरुस्त मिटर तक्रार करणेर",
                "image" => null,
                'table_name' => "water_defective_meters",
                "is_parent" => 1,
                "route_name" => "water-defective-meter.create",
                "background_color" => "#00aea4",
                "created_at" => null,
                "updated_at" => null
            ],
            // [
            //     "id" => 30,
            //     "service_id" => 6,
            //     "name" => "अनधिकृत नळ जोडणी तक्रार",
            //     "image" => null,
            //     "is_parent" => 1,
            //     "route_name" => null,
            //     "background_color" => "#2a85c7",
            //     "created_at" => null,
            //     "updated_at" => null
            // ],
            [
                "id" => 30,
                "service_id" => 6,
                "name" => "पाण्याची दबाव क्षमता तक्रार",
                "image" => null,
                'table_name' => "water_pressure_complaints",
                "is_parent" => 1,
                "route_name" => "water-pressure-complaint.create",
                "background_color" => "#2a85c7",
                "created_at" => null,
                "updated_at" => null
            ],
            [
                "id" => 31,
                "service_id" => 6,
                "name" => "पाण्याची गुणवत्ता तक्रार",
                "image" => null,
                'table_name' => "water_quality_complaints",
                "is_parent" => 1,
                "route_name" => "water-quality-complaint.create",
                "background_color" => "#b73107",
                "created_at" => null,
                "updated_at" => null
            ],
            // [
            //     "id" => 33,
            //     "service_id" => 6,
            //     "name" => "पअनधिकृत नळ जोडणी तक्रार",
            //     "image" => null,
            //     "is_parent" => 1,
            //     "route_name" => null,
            //     "background_color" => "#037ca2",
            //     "created_at" => null,
            //     "updated_at" => null
            // ],
            [
                "id" => 32,
                "service_id" => 7,
                "name" => "प्लंबर परवाना",
                "image" => null,
                'table_name' => "water_plumber_licenses",
                "is_parent" => 1,
                "route_name" => "trade-plumber-license.create",
                "background_color" => "#b73107",
                "created_at" => "2024-06-10 11:46:42",
                "updated_at" => "2024-06-10 11:46:42"
            ],
            [
                "id" => 33,
                "service_id" => 7,
                "name" => "प्लंबर परवाना नुतनीकरण करणे",
                "image" => null,
                'table_name' => "water_renewal_of_plumbers",
                "is_parent" => 1,
                "route_name" => "renewal-plumber-license.create",
                "background_color" => "#037ca2",
                "created_at" => null,
                "updated_at" => null
            ],
            [
                "id" => 34,
                "service_id" => 7,
                "name" => "नवीन व्यवसाय परवाना मिळणे",
                "image" => null,
                'table_name' => "trade_new_license_permissions",
                "is_parent" => 1,
                "route_name" => "trade-new-license.create",
                "background_color" => "#00aea4",
                "created_at" => null,
                "updated_at" => null
            ],
            [
                "id" => 35,
                "service_id" => 7,
                "name" => "व्यवसाय परवाना नुतनीकरण",
                "image" => null,
                'table_name' => "trade_renewal_license_permissions",
                "is_parent" => 1,
                "route_name" => "trade-renewal-license.create",
                "background_color" => "#2a85c7",
                "created_at" => null,
                "updated_at" => null
            ],
            [
                "id" => 36,
                "service_id" => 7,
                "name" => "व्यवसाय परवाना स्वयंनुतनीकरण",
                "image" => null,
                'table_name' => "trade_auto_renewal_license_permissions",
                "is_parent" => 1,
                "route_name" => "trade-autorenewal-license.create",
                "background_color" => "#b73107",
                "created_at" => null,
                "updated_at" => null
            ],
            [
                "id" => 37,
                "service_id" => 7,
                "name" => "व्यवसाय परवाना हस्तांतरण करणे",
                "image" => null,
                'table_name' => "trade_license_transfers",
                "is_parent" => 1,
                "route_name" => "trade-license-transfer.create",
                "background_color" => "#037ca2",
                "created_at" => null,
                "updated_at" => null
            ],
            [
                "id" => 38,
                "service_id" => 7,
                "name" => "व्यवसाय परवाना दुय्यम प्रत मिळणे",
                "image" => null,
                'table_name' => "trade_per_licenses",
                "is_parent" => 1,
                "route_name" => "trade-per-license.create",
                "background_color" => "#00aea4",
                "created_at" => null,
                "updated_at" => null
            ],
            [
                "id" => 39,
                "service_id" => 7,
                "name" => "मंडपासाठी ना हरकत प्रमाणपत्र",
                "image" => null,
                'table_name' => "trade_noc_for_mandaps",
                "is_parent" => 1,
                "route_name" => "trade-noc-mandap.create",
                "background_color" => "#2a85c7",
                "created_at" => null,
                "updated_at" => null
            ],
            [
                "id" => 40,
                "service_id" => 7,
                "name" => "व्यवसायाचे नाव बदलणे",
                "image" => null,
                'table_name' => "trade_change_license_names",
                "is_parent" => 1,
                "route_name" => "trade-change-license-name.create",
                "background_color" => "#b73107",
                "created_at" => null,
                "updated_at" => null
            ],
            [
                "id" => 41,
                "service_id" => 7,
                "name" => "व्यवसाय (प्रकार) बदलणे",
                "image" => null,
                'table_name' => "trade_change_license_types",
                "is_parent" => 1,
                "route_name" => "trade-change-license-type.create",
                "background_color" => "#037ca2",
                "created_at" => null,
                "updated_at" => null
            ],
            [
                "id" => 42,
                "service_id" => 7,
                "name" => "भागीदाराच्या संख्येत बदल (वाढ/ कमी)",
                "image" => null,
                'table_name' => "trade_change_owner_counts",
                "is_parent" => 1,
                "route_name" => "trade-change-owner-count.create",
                "background_color" => "#00aea4",
                "created_at" => null,
                "updated_at" => null
            ],
            // [
            //     "id" => 45,
            //     "service_id" => 7,
            //     "name" => "परवाना धारक अथवा भागीदाराचे नाव बदलणे",
            //     "image" => null,
            //     "is_parent" => 1,
            //     "route_name" => "trade-change-owner-name.create",
            //     "background_color" => "#00aea4",
            //     "created_at" => null,
            //     "updated_at" => null
            // ],
            // [
            //     "id" => 46,
            //     "service_id" => 7,
            //     "name" => "भागीदाराच्या संख्येत बदल (वाढ/ कमी)",
            //     "image" => null,
            //     "is_parent" => 1,
            //     "route_name" => null,
            //     "background_color" => "#2a85c7",
            //     "created_at" => null,
            //     "updated_at" => null
            // ],
            [
                "id" => 43,
                "service_id" => 7,
                "name" => "व्यवसाय परवाना रद्द करणे",
                "image" => null,
                'table_name' => "trade_license_cancellations",
                "is_parent" => 1,
                "route_name" => "trade-license-cancellation.create",
                "background_color" => "#2a85c7",
                "created_at" => null,
                "updated_at" => null
            ],
            [
                "id" => 44,
                "service_id" => 7,
                "name" => "व्यवसाय परवाना नुतनीकरण",
                "image" => null,
                'table_name' => "",
                "is_parent" => 1,
                "route_name" => null,
                "background_color" => "#b73107",
                "created_at" => null,
                "updated_at" => null
            ],
            [
                "id" => 45,
                "service_id" => 7,
                "name" => "नवीन व्यवसाय परवाना मिळणे",
                "image" => null,
                'table_name' => "",
                "is_parent" => 1,
                "route_name" => null,
                "background_color" => "#037ca2",
                "created_at" => null,
                "updated_at" => null
            ],
            [
                "id" => 46,
                "service_id" => 8,
                "name" => "अग्निशमन ना-हरकत दाखला देणे",
                "image" => null,
                'table_name' => "fire_no_objections",
                "is_parent" => 1,
                "route_name" => "fire-no-objection.create",
                "background_color" => "#b73107",
                "created_at" => "2024-06-10 12:00:09",
                "updated_at" => "2024-06-10 12:00:09"
            ],
            [
                "id" => 47,
                "service_id" => 8,
                "name" => "अग्निशमन अंतिम ना हरकत दाखला",
                "image" => null,
                'table_name' => "fire_final_no_objections",
                "is_parent" => 1,
                "route_name" => "fire-final-no-objection.create",
                "background_color" => "#037ca2",
                "created_at" => "2024-06-10 12:00:33",
                "updated_at" => "2024-06-10 12:00:33"
            ],
            [
                "id" => 48,
                "service_id" => 3,
                "name" => "झोन दाखला देणे",
                "image" => null,
                'table_name' => "",
                "is_parent" => 1,
                "route_name" => "town-planing-zone-certificate.create",
                "background_color" => "#b73107",
                "created_at" => "2024-06-10 12:01:16",
                "updated_at" => "2024-06-10 12:01:16"
            ],
            [
                "id" => 49,
                "service_id" => 3,
                "name" => "भाग नकाशा देणे",
                "image" => null,
                'table_name' => "",
                "is_parent" => 1,
                "route_name" => "town-planing-bhag-nakasha.create",
                "background_color" => "#2a85c7",
                "created_at" => "2024-06-10 12:01:41",
                "updated_at" => "2024-06-10 12:01:41"
            ],
            [
                "id" => 50,
                "service_id" => 1,
                "name" => "रस्ते खोदणे परवानगी",
                "image" => null,
                'table_name' => "construction_road_cuttings",
                "is_parent" => 1,
                "route_name" => "construction-road-cutting.create",
                "background_color" => "#b73107",
                "created_at" => "2024-06-10 12:02:30",
                "updated_at" => "2024-06-10 12:02:30"
            ],
            [
                "id" => 51,
                "service_id" => 1,
                "name" => "जल मल निःसारण जोडणी देणे",
                "image" => null,
                'table_name' => "construction_drainage_connections",
                "is_parent" => 1,
                "route_name" => "construction-drainage-connection.create",
                "background_color" => "#2a85c7",
                "created_at" => "2024-06-10 12:02:48",
                "updated_at" => "2024-06-10 12:02:48"
            ],
            [
                "id" => 52,
                "service_id" => 4,
                "name" => "विवाह नोंदणी",
                "image" => null,
                "is_parent" => 1,
                "route_name" => "marriage-registration.create",
                'table_name' => "marriage_reg_forms",
                "background_color" => "#00aea4",
                "created_at" => "2024-06-10 10:54:22",
                "updated_at" => "2024-06-10 10:58:36"
            ],
            [
                "id" => 53,
                "service_id" => 5,
                "name" => "नवीन कर मूल्यांकन",
                "image" => null,
                "is_parent" => 1,
                "route_name" => "newtax-assessment.create",
                'table_name' => "new_tax_assessments",
                "background_color" => "#00aea4",
                "created_at" => "2024-06-10 10:54:22",
                "updated_at" => "2024-06-10 10:58:36"
            ],
            [
                "id" => 54,
                "service_id" => 5,
                "name" => "विभागातील मालमत्तेचे पाडणे आणि पुनर्बांधणी",
                "image" => null,
                "is_parent" => 1,
                "route_name" => "demolishingproperty.create",
                'table_name' => "demolishing_properties",
                "background_color" => "#00aea4",
                "created_at" => "2024-06-10 10:54:22",
                "updated_at" => "2024-06-10 10:58:36"
            ],
            [
                "id" => 55,
                "service_id" => 7,
                "name" => "व्यवसाय धारक/भागीदार बदला",
                "image" => null,
                "is_parent" => 1,
                "route_name" => "trade-change-owner-count.create",
                'table_name' => "trade_change_owner_counts",
                "background_color" => "#00aea4",
                "created_at" => "2024-06-10 10:54:22",
                "updated_at" => "2024-06-10 10:58:36"
            ],
            [
                "id" => 56,
                "service_id" => 7,
                "name" => "चित्रपट शूटिंग परवाना",
                "image" => null,
                "is_parent" => 1,
                "route_name" => "movie-shooting.create",
                'table_name' => "movie_shooting",
                "background_color" => "#00aea4",
                "created_at" => "2024-06-10 10:54:22",
                "updated_at" => "2024-06-10 10:58:36"
            ],
            [
                "id" => 57,
                "service_id" => 7,
                "name" => "व्यापार परवान्याचे स्वयंचलित नूतनीकरण",
                "image" => null,
                "is_parent" => 1,
                "route_name" => "trade-autorenewal-license.create",
                'table_name' => "trade_auto_renewal_license_permissions",
                "background_color" => "#00aea4",
                "created_at" => "2024-06-10 10:54:22",
                "updated_at" => "2024-06-10 10:58:36"
            ],
            [
                "id" => 58,
                "service_id" => 7,
                "name" => "निवासस्थानांचे परवाने देणे",
                "image" => null,
                "is_parent" => 1,
                "route_name" => "trade-license-loading.create",
                'table_name' => "license_loadging_houses",
                "background_color" => "#00aea4",
                "created_at" => "2024-06-10 10:54:22",
                "updated_at" => "2024-06-10 10:58:36"
            ],
            [
                "id" => 59,
                "service_id" => 7,
                "name" => "निवासस्थानांच्या परवान्याचे नूतनीकरण करा",
                "image" => null,
                "is_parent" => 1,
                "route_name" => "trade-renew-license-loading.create",
                'table_name' => "renew_license_loadgings",
                "background_color" => "#00aea4",
                "created_at" => "2024-06-10 10:54:22",
                "updated_at" => "2024-06-10 10:58:36"
            ],
            [
                "id" => 60,
                "service_id" => 7,
                "name" => "विवाह हॉल/बैठक हॉल इत्यादींसाठी परवाना जारी करणे",
                "image" => null,
                "is_parent" => 1,
                "route_name" => "trade-issuance-license-marriage.create",
                'table_name' => "issuance_license_marriages",
                "background_color" => "#00aea4",
                "created_at" => "2024-06-10 10:54:22",
                "updated_at" => "2024-06-10 10:58:36"
            ],
            [
                "id" => 61,
                "service_id" => 7,
                "name" => "विवाह सभागृह/सभागृह इत्यादी परवान्याचे नूतनीकरण",
                "image" => null,
                "is_parent" => 1,
                "route_name" => "trade-renew-license-marriage.create",
                'table_name' => "renew_marriage_licenses",
                "background_color" => "#00aea4",
                "created_at" => "2024-06-10 10:54:22",
                "updated_at" => "2024-06-10 10:58:36"
            ],
            [
                "id" => 62,
                "service_id" => null,
                "name" => "नूलम विभाग",
                "image" => "service/ZolWqfXTl0JjOWRUNdfaVuw1iF5Ktu1EghTWS4n0.png",
                "is_parent" => 0,
                "route_name" => null,
                'table_name' => null,
                "background_color" => "#b73107",
                "created_at" => "2024-06-10 10:51:08",
                "updated_at" => "2024-06-10 10:51:08"
            ],
            [
                "id" => 63,
                "service_id" => 62,
                "name" => "फेरीवाला नोंदणी प्रमाणपत्र देणे",
                "image" => null,
                "is_parent" => 1,
                "route_name" => "hawker-register.create",
                'table_name' => "hawker_registers",
                "background_color" => "#00aea4",
                "created_at" => "2024-06-10 10:54:22",
                "updated_at" => "2024-06-10 10:58:36"
            ],
            [
                "id" => 64,
                "service_id" => null,
                "name" => "PWD विभाग",
                "image" => "service/ZolWqfXTl0JjOWRUNdfaVuw1iF5Ktu1EghTWS4n0.png",
                "is_parent" => 0,
                "route_name" => null,
                'table_name' => null,
                "background_color" => "#b73107",
                "created_at" => "2024-06-10 10:51:08",
                "updated_at" => "2024-06-10 10:51:08"
            ],
            [
                "id" => 65,
                "service_id" => 64,
                "name" => "भूमिगत दूरसंचार नलिका टाकण्यास परवानगी देणे",
                "image" => null,
                "is_parent" => 1,
                "route_name" => "grant-telecome.create",
                'table_name' => "granting_telecoms",
                "background_color" => "#00aea4",
                "created_at" => "2024-06-10 10:54:22",
                "updated_at" => "2024-06-10 10:58:36"
            ],
            [
                "id" => 66,
                "service_id" => 64,
                "name" => "मोबाईल टॉवर परवानगी",
                "image" => null,
                "is_parent" => 1,
                "route_name" => "mobile-tower.create",
                'table_name' => "mobile_towers",
                "background_color" => "#00aea4",
                "created_at" => "2024-06-10 10:54:22",
                "updated_at" => "2024-06-10 10:58:36"
            ],
            [
                "id" => 67,
                "service_id" => null,
                "name" => "वृक्ष प्राधिकरण विभाग",
                "image" => "service/ZolWqfXTl0JjOWRUNdfaVuw1iF5Ktu1EghTWS4n0.png",
                "is_parent" => 0,
                "route_name" => null,
                'table_name' => null,
                "background_color" => "#b73107",
                "created_at" => "2024-06-10 10:51:08",
                "updated_at" => "2024-06-10 10:51:08"
            ],
            [
                "id" => 68,
                "service_id" => 67,
                "name" => "शहरी भागात वृक्ष संरक्षण",
                "image" => null,
                "is_parent" => 1,
                "route_name" => "tree-protection.create",
                'table_name' => "tree_protections",
                "background_color" => "#00aea4",
                "created_at" => "2024-06-10 10:54:22",
                "updated_at" => "2024-06-10 10:58:36"
            ],
            [
                "id" => 69,
                "service_id" => null,
                "name" => "नगररचना विभाग",
                "image" => "service/ZolWqfXTl0JjOWRUNdfaVuw1iF5Ktu1EghTWS4n0.png",
                "is_parent" => 0,
                "route_name" => null,
                'table_name' => null,
                "background_color" => "#b73107",
                "created_at" => "2024-06-10 10:51:08",
                "updated_at" => "2024-06-10 10:51:08"
            ],
            [
                "id" => 70,
                "service_id" => 69,
                "name" => "बांधकाम परवानगी जारी करणे",
                "image" => null,
                "is_parent" => 1,
                "route_name" => "town-building-permission.create",
                'table_name' => "building_permissions",
                "background_color" => "#00aea4",
                "created_at" => "2024-06-10 10:54:22",
                "updated_at" => "2024-06-10 10:58:36"
            ],
            [
                "id" => 71,
                "service_id" => 69,
                "name" => "भोगवटा प्रमाणपत्र देणे",
                "image" => null,
                "is_parent" => 1,
                "route_name" => "town-occupancy-certificate.create",
                'table_name' => "occupancy_certificates",
                "background_color" => "#00aea4",
                "created_at" => "2024-06-10 10:54:22",
                "updated_at" => "2024-06-10 10:58:36"
            ],
            [
                "id" => 72,
                "service_id" => 69,
                "name" => "ड्रेनेज/सीवर कनेक्शन देणे",
                "image" => null,
                "is_parent" => 1,
                "route_name" => "construction-drainage-connection.create",
                'table_name' => "construction_drainage_connections",
                "background_color" => "#00aea4",
                "created_at" => "2024-06-10 10:54:22",
                "updated_at" => "2024-06-10 10:58:36"
            ],
            [
                "id" => 73,
                "service_id" => null,
                "name" => "वैद्यकीय आरोग्य विभाग",
                "image" => "service/ZolWqfXTl0JjOWRUNdfaVuw1iF5Ktu1EghTWS4n0.png",
                "is_parent" => 0,
                "route_name" => null,
                'table_name' => null,
                "background_color" => "#b73107",
                "created_at" => "2024-06-10 10:51:08",
                "updated_at" => "2024-06-10 10:51:08"
            ],
            [
                "id" => 74,
                "service_id" => 73,
                "name" => "महाराष्ट्र नर्सिंग होम नोंदणी कायदा, १९४९ अंतर्गत नर्सिंग होमचे परवाने देणे",
                "image" => null,
                "is_parent" => 1,
                "route_name" => "grantnursing-license.create",
                'table_name' => "grant_nursing_licenses",
                "background_color" => "#00aea4",
                "created_at" => "2024-06-10 10:54:22",
                "updated_at" => "2024-06-10 10:58:36"
            ],
            [
                "id" => 75,
                "service_id" => 73,
                "name" => "महाराष्ट्र नर्सिंग होम नोंदणी कायदा, १९४९ अंतर्गत नर्सिंग होमचे नूतनीकरण",
                "image" => null,
                "is_parent" => 1,
                "route_name" => "renewnursing-license.create",
                'table_name' => "renewal_nursing_licenses",
                "background_color" => "#00aea4",
                "created_at" => "2024-06-10 10:54:22",
                "updated_at" => "2024-06-10 10:58:36"
            ],
            [
                "id" => 76,
                "service_id" => 73,
                "name" => "महाराष्ट्र नर्सिंग होम नोंदणी कायदा, १९४९ अंतर्गत नर्सिंग होमच्या मालकांच्या नावात बदल/भागीदाराच्या नावात बदल",
                "image" => null,
                "is_parent" => 1,
                "route_name" => "changenursing-license.create",
                'table_name' => "change_nursing_licenses",
                "background_color" => "#00aea4",
                "created_at" => "2024-06-10 10:54:22",
                "updated_at" => "2024-06-10 10:58:36"
            ]
        ];

        foreach ($services as $service) {
            Service::updateOrCreate([
                'id' => $service['id']
            ], [
                'id' => $service['id'],
                'service_id' => $service['service_id'],
                'name' => $service['name'],
                'image' => $service['image'],
                'is_parent' => $service['is_parent'],
                'table_name' => $service['table_name'],
                'route_name' => $service['route_name'],
                'background_color' => $service['background_color'],
                'created_at' => $service['created_at'],
                'updated_at' => $service['updated_at']
            ]);
        }
    }
}
