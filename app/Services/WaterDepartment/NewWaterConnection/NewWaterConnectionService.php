<?php

namespace App\Services\WaterDepartment\NewWaterConnection;

use App\Models\WaterDepartment\Waternewconnection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use App\Models\ServiceCredential;
use App\Services\CurlAPiService;
use App\Services\AapaleSarkarLoginCheckService;

class NewWaterConnectionService
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
            // Handle file uploads and store original file names
            if ($request->hasFile('written_application_documents')) {
                $request['written_application_document'] = $request->written_application_documents->store('water-department/new-water-connection');
            }
            if ($request->hasFile('ownership_documents')) {
                $request['ownership_document'] = $request->ownership_documents->store('water-department/new-water-connection');
            }
            if ($request->hasFile('no_dues_documents')) {
                $request['no_dues_document'] = $request->no_dues_documents->store('water-department/new-water-connection');
            }
            // Create new Waternewconnection record with merged request data
            $waternewconnection = Waternewconnection::create($request->all());


            // code to send data to department
            if ($request->hasFile('written_application_documents')) {
                $request['written_application_document'] = $this->curlAPiService->convertFileInBase64($request->file('written_application_documents'));
            } else {
                $request['written_application_document'] = "";
            }
            if ($request->hasFile('ownership_documents')) {
                $request['ownership_document'] = $this->curlAPiService->convertFileInBase64($request->file('ownership_documents'));
            } else {
                $request['ownership_document'] = "";
            }
            if ($request->hasFile('no_dues_documents')) {
                $request['no_dues_document'] = $this->curlAPiService->convertFileInBase64($request->file('no_dues_documents'));
            } else {
                $request['no_dues_document'] = "";
            }
            $request['user_id'] = (Auth::user()->user_id && Auth::user()->user_id != "") ? Auth::user()->user_id : Auth::user()->id;
            $newData = $request->except(['_token', 'written_application_documents', 'ownership_documents', 'no_dues_documents']);
            $data = $this->curlAPiService->sendPostRequestInObject($newData, config('rtsapiurl.water') . 'AapaleSarkarAPI/NewTaxation.asmx/RequestForNewTaxation', 'NewTaxation');

            // Decode JSON string to PHP array
            $data = json_decode($data, true);
            if ($data['d']['Status'] == "200") {
                // Access the application_no
                $applicationId = $data['d']['application_no'];
                Waternewconnection::where('id', $waternewconnection->id)->update([
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
        return Waternewconnection::find($id);
    }

    public function update($request, $id)
    {
        DB::beginTransaction();
        try {
            // Find the existing record
            $newWaterConnection = Waternewconnection::findOrFail($id);
            // Handle file uploads and update original file names
            if ($request->hasFile('written_application_documents')) {
                if ($newWaterConnection && Storage::exists($newWaterConnection->written_application_document)) {
                    Storage::delete($newWaterConnection->written_application_document);
                }
                $request['written_application_document'] = $request->written_application_documents->store('water-department/new-water-connection');
            }
            if ($request->hasFile('ownership_documents')) {
                if ($newWaterConnection && Storage::exists($newWaterConnection->ownership_document)) {
                    Storage::delete($newWaterConnection->ownership_document);
                }
                $request['ownership_document'] = $request->ownership_documents->store('water-department/new-water-connection');
            }
            if ($request->hasFile('no_dues_documents')) {
                if ($newWaterConnection && Storage::exists($newWaterConnection->no_dues_document)) {
                    Storage::delete($newWaterConnection->no_dues_document);
                }
                $request['no_dues_document'] = $request->no_dues_documents->store('water-department/new-water-connection');
            }
            // Update the rest of the fields
            $newWaterConnection->update($request->all());


            // code to send data to department
            if ($request->hasFile('application_documents')) {
                $request['application_document'] = $this->curlAPiService->convertFileInBase64($request->file('application_documents'));
            } else {
                $request['application_document'] = "";
            }
            if ($request->hasFile('ownership_documents')) {
                $request['ownership_document'] = $this->curlAPiService->convertFileInBase64($request->file('ownership_documents'));
            } else {
                $request['ownership_document'] = "";
            }
            if ($request->hasFile('nodues_documents')) {
                $request['nodues_document'] = $this->curlAPiService->convertFileInBase64($request->file('nodues_documents'));
            } else {
                $request['nodues_document'] = "";
            }
            $request['application_no'] = $newWaterConnection->application_no;
            $request['user_id'] = (Auth::user()->user_id && Auth::user()->user_id != "") ? Auth::user()->user_id : Auth::user()->id;
            $newData = $request->except(['_token', 'id', 'application_documents', 'ownership_documents', 'nodues_documents']);
            $data = $this->curlAPiService->sendPostRequestInObject($newData, config('rtsapiurl.water') . 'AapaleSarkarAPI/NewTaxation.asmx/RequestForUpdateNewTaxation', 'NewTaxation');

            // Decode JSON string to PHP array
            $data = json_decode($data, true);

            if ($data['d']['Status'] == "200") {
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
