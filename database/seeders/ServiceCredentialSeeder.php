<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServiceCredentialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('service_credentials')->insert([
            'service_name' => 'Marriage register certificate',
            'service_url' => 'marriage-registration-certificate/list',
            'client_code' => 'PNL224',
            'check_sum_key' => 'PNMCNN2v247M',
            'str_key' => '@pn@PNM@m@h@0nl!ne@23523',
            'str_iv' => 'PNM@05@3',
            'soap_end_point_url' => 'http://testcitizenservices.MahaITgov.in/Dept_Authentication.asmx',
            'soap_action_url' => 'http://tempuri.org/GetParameterNew',
            'soap_action_app_status_url' => 'http://tempuri.org/SetAppStatus',
            'validate_payment_url' => 'http://testcitizenservices.MahaITgov.in/en/OutPayment/ValidateRequest',
            'out_payment_url' => 'http://testcitizenservices.MahaITgov.in/en/OutPayment/Pay',
            'service_id' => 6774,
            'ulb_id' => 18,
            'ulb_district' => 520,
        ]);
    }
}
