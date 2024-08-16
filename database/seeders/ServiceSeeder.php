<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Service;

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
                "background_color" => "#b73107",
                "created_at" => "2024-06-10 10:51:08",
                "updated_at" => "2024-06-10 10:51:08"
            ],
            [
                "id" => 2,
                "service_id" => null,
                "name" => "जन्म मृत्यु",
                "image" => "service/7eVpBS7RVfTqlmbuNHw77MXqUn6wkrWH2wbzwYZP.png",
                "is_parent" => 0,
                "route_name" => null,
                "background_color" => "#037ca2",
                "created_at" => "2024-06-10 10:52:11",
                "updated_at" => "2024-06-10 10:52:11"
            ],
            [
                "id" => 3,
                "service_id" => null,
                "name" => "नगर रचना",
                "image" => "service/AfnTCgdUcscvA2QB4RTi6akZo18UpZKWf0GPJIkn.png",
                "is_parent" => 0,
                "route_name" => null,
                "background_color" => "#00aea4",
                "created_at" => "2024-06-10 10:53:10",
                "updated_at" => "2024-06-10 10:53:10"
            ],
            [
                "id" => 4,
                "service_id" => 75,
                "name" => "विवाह नोंदणी",
                "image" => "service/8apAFL7HgTwAWfvScbYuChPeKS2vbgYTajhjh2tR.png",
                "is_parent" => 0,
                "route_name" => "marriage-registration.create",
                "background_color" => "#2a85c7",
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
                "background_color" => "#b73107",
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
                "background_color" => "#037ca2",
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
                "background_color" => "#00aea4",
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
                "background_color" => "#2a85c7",
                "created_at" => "2024-06-10 10:57:51",
                "updated_at" => "2024-06-10 10:57:51"
            ],
            [
                "id" => 9,
                "service_id" => 5,
                "name" => "मालमत्ता कर उतारा देणे",
                "image" => null,
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
                "is_parent" => 1,
                "route_name" => "tax-exemption-non-resident.create",
                "background_color" => "#2a85c7",
                "created_at" => "2024-06-10 11:14:16",
                "updated_at" => "2024-06-10 11:14:16"
            ],
            [
                "id" => 17,
                "service_id" => 5,
                "name" => "स्वयंमुल्यांकन",
                "image" => null,
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
                "is_parent" => 1,
                "route_name" => "registration-of-objection.create",
                "background_color" => "#037ca2",
                "created_at" => "2024-06-10 11:22:43",
                "updated_at" => "2024-06-10 11:22:43"
            ],
            [
                "id" => 19,
                "service_id" => 6,
                "name" => "नविन नळजोडणी",
                "image" => null,
                "is_parent" => 1,
                "route_name" => "water-new-connection.create",
                "background_color" => "#037ca2",
                "created_at" => "2024-06-10 11:34:06",
                "updated_at" => "2024-06-10 11:34:06"
            ],
            [
                "id" => 20,
                "service_id" => 6,
                "name" => "अनधिकृत नळ जोडणी तक्रार",
                "image" => null,
                "is_parent" => 1,
                "route_name" => "water-illegal-connection.create",
                "background_color" => "#00aea4",
                "created_at" => "2024-06-10 11:34:44",
                "updated_at" => "2024-06-10 11:34:44"
            ],
            [
                "id" => 21,
                "service_id" => 6,
                "name" => "मालकी हक्कात बदल करणे",
                "image" => null,
                "is_parent" => 1,
                "route_name" => "water-change-ownership.create",
                "background_color" => "#2a85c7",
                "created_at" => "2024-06-10 11:35:12",
                "updated_at" => "2024-06-10 11:35:12"
            ],
            [
                "id" => 23,
                "service_id" => 6,
                "name" => "पुनः जोडणी करणे",
                "image" => null,
                "is_parent" => 1,
                "route_name" => "water-reconnection.create",
                "background_color" => "#b73107",
                "created_at" => null,
                "updated_at" => null
            ],
            [
                "id" => 24,
                "service_id" => 6,
                "name" => "नळजोडणी आकारामध्ये बदल करणे",
                "image" => null,
                "is_parent" => 1,
                "route_name" => null,
                "background_color" => "#037ca2",
                "created_at" => null,
                "updated_at" => null
            ],
            [
                "id" => 25,
                "service_id" => 6,
                "name" => "नळजोडणीच्या वापरामध्ये बदल करणे",
                "image" => null,
                "is_parent" => 1,
                "route_name" => null,
                "background_color" => "#00aea4",
                "created_at" => null,
                "updated_at" => null
            ],
            [
                "id" => 26,
                "service_id" => 6,
                "name" => "पाणी देयक तयार करणे",
                "image" => null,
                "is_parent" => 1,
                "route_name" => null,
                "background_color" => "#2a85c7",
                "created_at" => null,
                "updated_at" => null
            ],
            [
                "id" => 27,
                "service_id" => 5,
                "name" => "थकबाकी नसल्याचा दाखला ( पाणी पुरवठा )",
                "image" => null,
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
                "is_parent" => 1,
                "route_name" => null,
                "background_color" => "#037ca2",
                "created_at" => null,
                "updated_at" => null
            ],
            [
                "id" => 29,
                "service_id" => 6,
                "name" => "नादुरुस्त मिटर तक्रार करणेर",
                "image" => null,
                "is_parent" => 1,
                "route_name" => null,
                "background_color" => "#00aea4",
                "created_at" => null,
                "updated_at" => null
            ],
            [
                "id" => 30,
                "service_id" => 6,
                "name" => "अनधिकृत नळ जोडणी तक्रार",
                "image" => null,
                "is_parent" => 1,
                "route_name" => null,
                "background_color" => "#2a85c7",
                "created_at" => null,
                "updated_at" => null
            ],
            [
                "id" => 31,
                "service_id" => 6,
                "name" => "पाण्याची दबाव क्षमता तक्रार",
                "image" => null,
                "is_parent" => 1,
                "route_name" => null,
                "background_color" => "#b73107",
                "created_at" => null,
                "updated_at" => null
            ],
            [
                "id" => 32,
                "service_id" => 6,
                "name" => "पअनधिकृत नळ जोडणी तक्रार",
                "image" => null,
                "is_parent" => 1,
                "route_name" => null,
                "background_color" => "#037ca2",
                "created_at" => null,
                "updated_at" => null
            ],
            [
                "id" => 33,
                "service_id" => 7,
                "name" => "प्लंबर परवाना",
                "image" => null,
                "is_parent" => 1,
                "route_name" => null,
                "background_color" => "#b73107",
                "created_at" => "2024-06-10 11:46:42",
                "updated_at" => "2024-06-10 11:46:42"
            ],
            [
                "id" => 34,
                "service_id" => 7,
                "name" => "प्लंबर परवाना नुतनीकरण करणे",
                "image" => null,
                "is_parent" => 1,
                "route_name" => null,
                "background_color" => "#037ca2",
                "created_at" => null,
                "updated_at" => null
            ],
            [
                "id" => 35,
                "service_id" => 7,
                "name" => "नवीन व्यवसाय परवाना मिळणे",
                "image" => null,
                "is_parent" => 1,
                "route_name" => null,
                "background_color" => "#00aea4",
                "created_at" => null,
                "updated_at" => null
            ],
            [
                "id" => 36,
                "service_id" => 7,
                "name" => "व्यवसाय परवाना नुतनीकरण",
                "image" => null,
                "is_parent" => 1,
                "route_name" => null,
                "background_color" => "#2a85c7",
                "created_at" => null,
                "updated_at" => null
            ],
            [
                "id" => 37,
                "service_id" => 7,
                "name" => "व्यवसाय परवाना स्वयंनुतनीकरण",
                "image" => null,
                "is_parent" => 1,
                "route_name" => null,
                "background_color" => "#b73107",
                "created_at" => null,
                "updated_at" => null
            ],
            [
                "id" => 38,
                "service_id" => 7,
                "name" => "व्यवसाय परवाना हस्तांतरण करणे",
                "image" => null,
                "is_parent" => 1,
                "route_name" => null,
                "background_color" => "#037ca2",
                "created_at" => null,
                "updated_at" => null
            ],
            [
                "id" => 39,
                "service_id" => 7,
                "name" => "व्यवसाय परवाना दुय्यम प्रत मिळणे",
                "image" => null,
                "is_parent" => 1,
                "route_name" => null,
                "background_color" => "#00aea4",
                "created_at" => null,
                "updated_at" => null
            ],
            [
                "id" => 40,
                "service_id" => 7,
                "name" => "मंडपासाठी ना हरकत प्रमाणपत्र",
                "image" => null,
                "is_parent" => 1,
                "route_name" => null,
                "background_color" => "#2a85c7",
                "created_at" => null,
                "updated_at" => null
            ],
            [
                "id" => 41,
                "service_id" => 7,
                "name" => "व्यवसायाचे नाव बदलणेर",
                "image" => null,
                "is_parent" => 1,
                "route_name" => null,
                "background_color" => "#b73107",
                "created_at" => null,
                "updated_at" => null
            ],
            [
                "id" => 42,
                "service_id" => 7,
                "name" => "व्यवसाय (प्रकार) बदलणे",
                "image" => null,
                "is_parent" => 1,
                "route_name" => null,
                "background_color" => "#037ca2",
                "created_at" => null,
                "updated_at" => null
            ],
            [
                "id" => 43,
                "service_id" => 7,
                "name" => "भागीदाराच्या संख्येत बदल (वाढ/ कमी)",
                "image" => null,
                "is_parent" => 1,
                "route_name" => null,
                "background_color" => "#00aea4",
                "created_at" => null,
                "updated_at" => null
            ],
            [
                "id" => 44,
                "service_id" => 7,
                "name" => "भागीदाराच्या संख्येत बदल (वाढ/ कमी)",
                "image" => null,
                "is_parent" => 1,
                "route_name" => null,
                "background_color" => "#2a85c7",
                "created_at" => null,
                "updated_at" => null
            ],
            [
                "id" => 45,
                "service_id" => 7,
                "name" => "व्यवसाय परवाना रद्द करणे",
                "image" => null,
                "is_parent" => 1,
                "route_name" => null,
                "background_color" => "#b73107",
                "created_at" => null,
                "updated_at" => null
            ],
            [
                "id" => 46,
                "service_id" => 7,
                "name" => "व्यवसाय परवाना नुतनीकरण",
                "image" => null,
                "is_parent" => 1,
                "route_name" => null,
                "background_color" => "#037ca2",
                "created_at" => null,
                "updated_at" => null
            ],
            [
                "id" => 47,
                "service_id" => 7,
                "name" => "नवीन व्यवसाय परवाना मिळणे",
                "image" => null,
                "is_parent" => 1,
                "route_name" => null,
                "background_color" => "#00aea4",
                "created_at" => null,
                "updated_at" => null
            ],
            [
                "id" => 48,
                "service_id" => 8,
                "name" => "अग्निशमन ना-हरकत दाखला देणे",
                "image" => null,
                "is_parent" => 1,
                "route_name" => "fire-no-objection.create",
                "background_color" => "#b73107",
                "created_at" => "2024-06-10 12:00:09",
                "updated_at" => "2024-06-10 12:00:09"
            ],
            [
                "id" => 49,
                "service_id" => 8,
                "name" => "अग्निशमन अंतिम ना हरकत दाखला",
                "image" => null,
                "is_parent" => 1,
                "route_name" => "fire-final-no-objection.create",
                "background_color" => "#037ca2",
                "created_at" => "2024-06-10 12:00:33",
                "updated_at" => "2024-06-10 12:00:33"
            ],
            [
                "id" => 50,
                "service_id" => 3,
                "name" => "झोन दाखला देणे",
                "image" => null,
                "is_parent" => 1,
                "route_name" => "town-planing-zone-certificate.create",
                "background_color" => "#b73107",
                "created_at" => "2024-06-10 12:01:16",
                "updated_at" => "2024-06-10 12:01:16"
            ],
            [
                "id" => 51,
                "service_id" => 3,
                "name" => "भाग नकाशा देणे",
                "image" => null,
                "is_parent" => 1,
                "route_name" => "town-planing-bhag-nakasha.create",
                "background_color" => "#2a85c7",
                "created_at" => "2024-06-10 12:01:41",
                "updated_at" => "2024-06-10 12:01:41"
            ],
            [
                "id" => 52,
                "service_id" => 1,
                "name" => "रस्ते खोदणे परवानगी",
                "image" => null,
                "is_parent" => 1,
                "route_name" => "construction-road-cutting.create",
                "background_color" => "#b73107",
                "created_at" => "2024-06-10 12:02:30",
                "updated_at" => "2024-06-10 12:02:30"
            ],
            [
                "id" => 53,
                "service_id" => 1,
                "name" => "जल मल निःसारण जोडणी देणे",
                "image" => null,
                "is_parent" => 1,
                "route_name" => "construction-drainage-connection.create",
                "background_color" => "#2a85c7",
                "created_at" => "2024-06-10 12:02:48",
                "updated_at" => "2024-06-10 12:02:48"
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
                'route_name' => $service['route_name'],
                'background_color' => $service['background_color'],
                'created_at' => $service['created_at'],
                'updated_at' => $service['updated_at']
            ]);
        }
    }
}
