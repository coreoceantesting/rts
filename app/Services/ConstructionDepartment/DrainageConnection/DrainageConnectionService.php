<?php

namespace App\Services\ConstructionDepartment\DrainageConnection;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use App\Models\ConstructionDepartment\ConstructionDrainageConnection;
use App\Models\ServiceCredential;
use App\Services\CurlAPiService;
use App\Services\AapaleSarkarLoginCheckService;

class DrainageConnectionService
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
            if ($request->hasFile('upload_prescribed_formats')) {
                $request['upload_prescribed_format'] = $request->upload_prescribed_formats->store('construction-department/drainage-connection');
            }
            if ($request->hasFile('upload_no_dues_certificates')) {
                $request['upload_no_dues_certificate'] = $request->upload_no_dues_certificates->store('construction-department/drainage-connection');
            }
            if ($request->hasFile('upload_property_ownerships')) {
                $request['upload_property_ownership'] = $request->upload_property_ownerships->store('construction-department/drainage-connection');
            }
            $constructionDrainageConnection = ConstructionDrainageConnection::create($request->all());


            // code to send data to department
            if ($request->hasFile('upload_prescribed_formats')) {
                $request['upload_prescribed_format'] = $this->curlAPiService->convertFileInBase64($request->file('upload_prescribed_formats'));
            } else {
                $request['upload_prescribed_format'] = "";
            }
            if ($request->hasFile('upload_no_dues_certificates')) {
                $request['upload_no_dues_certificate'] = $this->curlAPiService->convertFileInBase64($request->file('upload_no_dues_certificates'));
            } else {
                $request['upload_no_dues_certificate'] = "";
            }
            if ($request->hasFile('upload_property_ownerships')) {
                $request['upload_property_ownership'] = $this->curlAPiService->convertFileInBase64($request->file('upload_property_ownerships'));
            } else {
                $request['upload_property_ownership'] = "";
            }
            $request['user_id'] = (Auth::user()->user_id && Auth::user()->user_id != "") ? Auth::user()->user_id : Auth::user()->id;
            $newData = $request->except(['_token', 'upload_prescribed_formats', 'upload_no_dues_certificates', 'upload_property_ownerships']);
            $data = $this->curlAPiService->sendPostRequestInObject($newData, config('rtsapiurl.water') . 'AapaleSarkarAPI/NewTaxation.asmx/RequestForNewTaxation', 'NewTaxation');

            // Decode JSON string to PHP array
            $data = json_decode($data, true);
            if ($data['d']['Status'] == "200") {
                // Access the application_no
                $applicationId = $data['d']['application_no'];
                ConstructionDrainageConnection::where('id', $constructionDrainageConnection->id)->update([
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
        return ConstructionDrainageConnection::find($id);
    }

    public function update($request, $id)
    {
        DB::beginTransaction();

        try {
            // Find the existing record
            $constructionDrainageConnection = ConstructionDrainageConnection::findOrFail($id);
            // Handle file uploads and update original file names
            if ($request->hasFile('upload_prescribed_formats')) {
                if ($constructionDrainageConnection && Storage::exists($constructionDrainageConnection->upload_prescribed_format)) {
                    Storage::delete($constructionDrainageConnection->upload_prescribed_format);
                }
                $request['upload_prescribed_format'] = $request->upload_prescribed_formats->store('construction-department/drainage-connection');
            }
            if ($request->hasFile('upload_no_dues_certificates')) {
                if ($constructionDrainageConnection && Storage::exists($constructionDrainageConnection->upload_no_dues_certificate)) {
                    Storage::delete($constructionDrainageConnection->upload_no_dues_certificate);
                }
                $request['upload_no_dues_certificate'] = $request->upload_no_dues_certificates->store('construction-department/drainage-connection');
            }
            if ($request->hasFile('upload_property_ownerships')) {
                if ($constructionDrainageConnection && Storage::exists($constructionDrainageConnection->upload_property_ownership)) {
                    Storage::delete($constructionDrainageConnection->upload_property_ownership);
                }
                $request['upload_property_ownership'] = $request->upload_property_ownerships->store('construction-department/drainage-connection');
            }
            $constructionDrainageConnection->update($request->all());



            // code to send data to department
            if ($request->hasFile('upload_prescribed_formats')) {
                $request['upload_prescribed_format'] = $this->curlAPiService->convertFileInBase64($request->file('upload_prescribed_formats'));
            } else {
                $request['upload_prescribed_format'] = "";
            }
            if ($request->hasFile('upload_no_dues_certificates')) {
                $request['upload_no_dues_certificate'] = $this->curlAPiService->convertFileInBase64($request->file('upload_no_dues_certificates'));
            } else {
                $request['upload_no_dues_certificate'] = "";
            }
            if ($request->hasFile('upload_property_ownerships')) {
                $request['upload_property_ownership'] = $this->curlAPiService->convertFileInBase64($request->file('upload_property_ownerships'));
            } else {
                $request['upload_property_ownership'] = "";
            }
            $request['application_no'] = $constructionDrainageConnection->application_no;
            $request['user_id'] = (Auth::user()->user_id && Auth::user()->user_id != "") ? Auth::user()->user_id : Auth::user()->id;
            $newData = $request->except(['_token', 'id', 'upload_prescribed_formats', 'upload_no_dues_certificates', 'upload_property_ownerships']);
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
