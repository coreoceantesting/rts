<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\PendingAapaleSarkarData;
use App\Models\ServiceCredential;
use App\Services\AapaleSarkarLoginCheckService;
use App\Models\User;

class SendPendingAapaleSarkarData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:send-pending-aapale-sarkar-data';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $datas = PendingAapaleSarkarData::select('id', 'application_no', 'service_id', 'user_id')->get();

        foreach ($datas as $data) {
            $trackId = User::where('user_id', $data->user_id)->where('is_aapale_sarkar_user', 1)->value('trackid');

            $aapaleSarkarLoginCheckService = new AapaleSarkarLoginCheckService;
            $aapaleSarkarCredential = ServiceCredential::where('dept_service_id', $data->service_id)->first();
            $serviceDay = ($aapaleSarkarCredential->service_day) ? $aapaleSarkarCredential->service_day : 20;

            $send = $aapaleSarkarLoginCheckService->encryptAndSendRequestToAapaleSarkar($trackId, $aapaleSarkarCredential->client_code, $data->user_id, $aapaleSarkarCredential->service_id, $data->application_no, 'N', 'NA', 'N', 'NA', $serviceDay, date('Y-m-d', strtotime("+$serviceDay days")), config('rtsapiurl.amount'), config('rtsapiurl.requestFlag'), config('rtsapiurl.applicationStatus'), config('rtsapiurl.applicationPendingStatusTxt'), $aapaleSarkarCredential->ulb_id, $aapaleSarkarCredential->ulb_district, 'NA', 'NA', 'NA', $aapaleSarkarCredential->check_sum_key, $aapaleSarkarCredential->str_key, $aapaleSarkarCredential->str_iv, $aapaleSarkarCredential->soap_end_point_url, $aapaleSarkarCredential->soap_action_app_status_url);

            if ($send) {
                $pending = PendingAapaleSarkarData::find($data->id);
                $pending->delete();
            }
        }
    }
}
