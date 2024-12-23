<?php

namespace App\Services;

use App\Services\AapaleSarkarLoginCheckService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use App\Models\OccupancyCertificate;
use App\Models\ServiceCredential;

class OccupancyCertificateService
{
    protected $aapaleSarkarLoginCheckService;

    public function __construct(AapaleSarkarLoginCheckService $aapaleSarkarLoginCheckService)
    {
        $this->aapaleSarkarLoginCheckService = $aapaleSarkarLoginCheckService;
    }

    public function store($request)
    {
        DB::beginTransaction();
        try {
            $request['user_id'] = Auth::user()->id;
            $request['service_id'] = '241';
            $request['application_no'] = "PMC-" . time();

            // Handle file uploads and store original file names
            if ($request->hasFile('documents')) {
                $request['document'] = $request->documents->store('occupancy-certificate');
            }

            $occupancyCertificate = OccupancyCertificate::create($request->all());

            if ($occupancyCertificate) {
                $applicationId = $request->application_no;

                if (Auth::user()->is_aapale_sarkar_user) {
                    $aapaleSarkarCredential = ServiceCredential::where('dept_service_id', $request->service_id)->first();
                    $serviceDay = ($aapaleSarkarCredential->service_day) ? $aapaleSarkarCredential->service_day : 20;

                    $send = $this->aapaleSarkarLoginCheckService->encryptAndSendRequestToAapaleSarkar(
                        Auth::user()->trackid,
                        $aapaleSarkarCredential->client_code,
                        Auth::user()->user_id,
                        $aapaleSarkarCredential->service_id,
                        $applicationId,
                        'N',
                        'NA',
                        'N',
                        'NA',
                        $serviceDay,
                        date('Y-m-d', strtotime("+$serviceDay days")),
                        config('rtsapiurl.amount'),
                        config('rtsapiurl.requestFlag'),
                        config('rtsapiurl.applicationStatus'),
                        config('rtsapiurl.applicationPendingStatusTxt'),
                        $aapaleSarkarCredential->ulb_id,
                        $aapaleSarkarCredential->ulb_district,
                        'NA', 'NA', 'NA',
                        $aapaleSarkarCredential->check_sum_key,
                        $aapaleSarkarCredential->str_key,
                        $aapaleSarkarCredential->str_iv,
                        $aapaleSarkarCredential->soap_end_point_url,
                        $aapaleSarkarCredential->soap_action_app_status_url
                    );

                    if (!$send) {
                        $this->aapaleSarkarLoginCheckService->savePendingAapaleSarkarData($applicationId, $request->service_id, Auth::user()->user_id);
                        DB::commit();
                        return [true];
                    }
                }

            } else {
                DB::rollback();
                return [false, 'Something went wrong, please try again!'];
            }


            DB::commit();
            return [true];

        } catch (\Exception $e) {
            DB::rollback();
            Log::error('Error in store method: ' . $e->getMessage());
            return [false, $e->getMessage()];
        }
    }

    public function edit($id)
    {
        return OccupancyCertificate::find($id);
    }

    public function update($request, $id)
    {
        DB::beginTransaction();
        try {
            // Find the existing record
            $occupancyCertificate = OccupancyCertificate::find($id);

            // Handle file uploads and update original file names
            if ($request->hasFile('documents')) {
                if ($occupancyCertificate && Storage::exists($occupancyCertificate->document)) {
                    Storage::delete($occupancyCertificate->document);  // Deleting old document
                }
                $request['document'] = $request->documents->store('occupancy-certificate');
            }

            // Update the rest of the fields
            $occupancyCertificate->update($request->all());

            DB::commit();
            return [true];

        } catch (\Exception $e) {
            DB::rollback();
            Log::info($e);

            return [false, $e->getMessage()];
        }
    }
}
