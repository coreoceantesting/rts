<?php

namespace App\Services\Trade;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use App\Models\Trade\TradeNocForMandap;
use App\Models\ServiceCredential;
use App\Services\CurlAPiService;
use App\Services\AapaleSarkarLoginCheckService;

class NocForMandapService
{
    protected $curlAPiService;
    protected $aapaleSarkarLoginCheckService;

    public function __construct(CurlAPiService $curlAPiService, AapaleSarkarLoginCheckService $aapaleSarkarLoginCheckService)
    {
        $this->curlAPiService = $curlAPiService;
        $this->aapaleSarkarLoginCheckService = $aapaleSarkarLoginCheckService;
    }

    public function store($request)
    {
        DB::beginTransaction();

        try {
            $request['user_id'] = Auth::user()->id;
            $request['service_id'] = "33";
            // Handle file uploads and store original file names
            if ($request->hasFile('board_registration_documents')) {
                $request['board_registration_document'] = $request->board_registration_documents->store('trade/noc-for-mandap');
            }
            if ($request->hasFile('no_objection_documents')) {
                $request['no_objection_document'] = $request->no_objection_documents->store('trade/noc-for-mandap');
            }
            if ($request->hasFile('location_map_documents')) {
                $request['location_map_document'] = $request->location_map_documents->store('trade/noc-for-mandap');
            }
            if ($request->hasFile('fire_last_year_noObjection_documents')) {
                $request['fire_last_year_noObjection_document'] = $request->fire_last_year_noObjection_documents->store('trade/noc-for-mandap');
            }
            if ($request->hasFile('traffic_last_year_noObjection_documents')) {
                $request['traffic_last_year_noObjection_document'] = $request->traffic_last_year_noObjection_documents->store('trade/noc-for-mandap');
            }
            if ($request->hasFile('annexures')) {
                $request['annexure'] = $request->annexures->store('trade/noc-for-mandap');
            }
            $tradeNocForMandap = TradeNocForMandap::create($request->all());

            // code to send data to department
            if ($request->hasFile('board_registration_documents')) {
                $request['board_registration_document'] = $this->curlAPiService->convertFileInBase64($request->file('board_registration_documents'));
            } else {
                $request['board_registration_document'] = "";
            }
            if ($request->hasFile('no_objection_documents')) {
                $request['no_objection_document'] = $this->curlAPiService->convertFileInBase64($request->file('no_objection_documents'));
            } else {
                $request['no_objection_document'] = "";
            }
            if ($request->hasFile('location_map_documents')) {
                $request['location_map_document'] = $this->curlAPiService->convertFileInBase64($request->file('location_map_documents'));
            } else {
                $request['location_map_document'] = "";
            }
            if ($request->hasFile('fire_last_year_noObjection_documents')) {
                $request['fire_last_year_noObjection_document'] = $this->curlAPiService->convertFileInBase64($request->file('fire_last_year_noObjection_documents'));
            } else {
                $request['fire_last_year_noObjection_document'] = "";
            }
            if ($request->hasFile('traffic_last_year_noObjection_documents')) {
                $request['traffic_last_year_noObjection_document'] = $this->curlAPiService->convertFileInBase64($request->file('traffic_last_year_noObjection_documents'));
            } else {
                $request['traffic_last_year_noObjection_document'] = "";
            }
            if ($request->hasFile('annexures')) {
                $request['annexure'] = $this->curlAPiService->convertFileInBase64($request->file('annexures'));
            } else {
                $request['annexure'] = "";
            }
            $request['user_id'] = (Auth::user()->user_id && Auth::user()->user_id != "") ? Auth::user()->user_id : Auth::user()->id;
            $newData = $request->except(['_token', 'board_registration_documents', 'no_objection_documents', 'location_map_documents', 'fire_last_year_noObjection_documents', 'traffic_last_year_noObjection_documents', 'annexures']);
            $data = $this->curlAPiService->sendPostRequestInObject($newData, config('rtsapiurl.trade') . 'SHELMicroService/SHELApi/ApleSarkarService/AddTempTentAllowFORPMC', '');

            // Decode JSON string to PHP array
            $data = json_decode($data, true);
            if ($data['status'] == "200") {
                // Access the application_no
                $applicationId = $data['applicationId'];
                TradeNocForMandap::where('id', $tradeNocForMandap->id)->update([
                    'application_no' => $applicationId
                ]);

                if (Auth::user()->is_aapale_sarkar_user) {
                    $aapaleSarkarCredential = ServiceCredential::where('dept_service_id', $request->service_id)->first();
                    $send = $this->aapaleSarkarLoginCheckService->encryptAndSendRequestToAapaleSarkar(Auth::user()->trackid, $aapaleSarkarCredential->client_code, Auth::user()->user_id, $aapaleSarkarCredential->service_id, $applicationId, 'N', 'NA', 'N', 'NA', "20", date('Y-m-d', strtotime("+$aapaleSarkarCredential->service_day days")), 23.60, 1, 2, 'Payment Pending', $aapaleSarkarCredential->ulb_id, $aapaleSarkarCredential->ulb_district, 'NA', 'NA', 'NA', $aapaleSarkarCredential->check_sum_key, $aapaleSarkarCredential->str_key, $aapaleSarkarCredential->str_iv, $aapaleSarkarCredential->soap_end_point_url, $aapaleSarkarCredential->soap_action_app_status_url);

                    if (!$send) {
                        return false;
                    }
                }
            } else {
                DB::rollback();
                return false;
            }
            // end of code to send data to department

            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollback();
            Log::error('Error in store method: ' . $e->getMessage());
            return false;
        }
    }


    public function edit($id)
    {
        return TradeNocForMandap::find($id);
    }

    public function update($request, $id)
    {
        DB::beginTransaction();

        try {
            // Find the existing record
            $tradeNocForMandap = TradeNocForMandap::findOrFail($id);

            // Handle file uploads and update original file names
            if ($request->hasFile('board_registration_documents')) {
                if ($tradeNocForMandap && Storage::exists($tradeNocForMandap->board_registration_document)) {
                    Storage::delete($tradeNocForMandap->board_registration_document);
                }
                $request['board_registration_document'] = $request->board_registration_documents->store('trade/noc-for-mandap');
            }

            if ($request->hasFile('no_objection_documents')) {
                if ($tradeNocForMandap && Storage::exists($tradeNocForMandap->no_objection_document)) {
                    Storage::delete($tradeNocForMandap->no_objection_document);
                }
                $request['no_objection_document'] = $request->no_objection_documents->store('trade/noc-for-mandap');
            }
            if ($request->hasFile('location_map_documents')) {
                if ($tradeNocForMandap && Storage::exists($tradeNocForMandap->location_map_document)) {
                    Storage::delete($tradeNocForMandap->location_map_document);
                }
                $request['location_map_document'] = $request->location_map_documents->store('trade/noc-for-mandap');
            }
            if ($request->hasFile('fire_last_year_noObjection_documents')) {
                if ($tradeNocForMandap && Storage::exists($tradeNocForMandap->fire_last_year_noObjection_document)) {
                    Storage::delete($tradeNocForMandap->fire_last_year_noObjection_document);
                }
                $request['fire_last_year_noObjection_document'] = $request->fire_last_year_noObjection_documents->store('trade/noc-for-mandap');
            }
            if ($request->hasFile('traffic_last_year_noObjection_documents')) {
                if ($tradeNocForMandap && Storage::exists($tradeNocForMandap->traffic_last_year_noObjection_document)) {
                    Storage::delete($tradeNocForMandap->traffic_last_year_noObjection_document);
                }
                $request['traffic_last_year_noObjection_document'] = $request->traffic_last_year_noObjection_documents->store('trade/noc-for-mandap');
            }
            if ($request->hasFile('annexures')) {
                if ($tradeNocForMandap && Storage::exists($tradeNocForMandap->annexure)) {
                    Storage::delete($tradeNocForMandap->annexure);
                }
                $request['annexure'] = $request->annexures->store('trade/noc-for-mandap');
            }
            $tradeNocForMandap->update($request->all());

            // code to send data to department
            if ($request->hasFile('board_registration_documents')) {
                $request['board_registration_document'] = $this->curlAPiService->convertFileInBase64($request->file('board_registration_documents'));
            } else {
                $request['board_registration_document'] = "";
            }
            if ($request->hasFile('no_objection_documents')) {
                $request['no_objection_document'] = $this->curlAPiService->convertFileInBase64($request->file('no_objection_documents'));
            } else {
                $request['no_objection_document'] = "";
            }
            if ($request->hasFile('location_map_documents')) {
                $request['location_map_documents'] = $this->curlAPiService->convertFileInBase64($request->file('location_map_documents'));
            } else {
                $request['location_map_documents'] = "";
            }
            if ($request->hasFile('fire_last_year_noObjection_documents')) {
                $request['fire_last_year_noObjection_document'] = $this->curlAPiService->convertFileInBase64($request->file('fire_last_year_noObjection_documents'));
            } else {
                $request['fire_last_year_noObjection_document'] = "";
            }
            if ($request->hasFile('traffic_last_year_noObjection_documents')) {
                $request['traffic_last_year_noObjection_document'] = $this->curlAPiService->convertFileInBase64($request->file('traffic_last_year_noObjection_documents'));
            } else {
                $request['traffic_last_year_noObjection_document'] = "";
            }
            if ($request->hasFile('annexures')) {
                $request['annexure'] = $this->curlAPiService->convertFileInBase64($request->file('annexures'));
            } else {
                $request['annexure'] = "";
            }
            $request['application_no'] = $tradeNocForMandap->application_no;
            $request['user_id'] = (Auth::user()->user_id && Auth::user()->user_id != "") ? Auth::user()->user_id : Auth::user()->id;
            $newData = $request->except(['_token', 'id', 'board_registration_documents', 'no_objection_documents', 'location_map_documents', 'fire_last_year_noObjection_documents', 'traffic_last_year_noObjection_documents', 'annexures']);
            $data = $this->curlAPiService->sendPostRequestInObject($newData, config('rtsapiurl.trade') . 'SHELMicroService/SHELApi/ApleSarkarService/UpdateTempTentAllowFORPMC ', '');

            // Decode JSON string to PHP array
            $data = json_decode($data, true);

            if ($data['status'] == "200") {
                // Access the application_no
                DB::commit();
                return true;
            } else {
                DB::rollback();
                return false;
            }
            // end of code to send data to department
        } catch (\Exception $e) {
            DB::rollback();
            Log::info($e);
            return false;
        }
    }
}
