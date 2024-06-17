<?php

namespace App\Services;

use App\Models\Marriage\MarriageRegistrationForm;
use App\Models\Marriage\MarriageRegistrationDetail;
use App\Models\Marriage\MarriageRegistrationGroomDetail;
use App\Models\Marriage\MarriageRegistrationBrideInformation;
use App\Models\Marriage\MarriageRegistrationPriestInformation;
use App\Models\Marriage\MarriageRegistrationWitnessInformation;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Services\CurlAPiService;
use App\Services\AapaleSarkarLoginCheckService;
use App\Models\ServiceCredential;

class MarriageRegistrationService
{
    protected $curlAPiService;
    protected $aapaleSarkarLoginCheckService;

    public function __construct(CurlAPiService $curlAPiService, AapaleSarkarLoginCheckService $aapaleSarkarLoginCheckService)
    {
        $this->curlAPiService = $curlAPiService;
        $this->aapaleSarkarLoginCheckService = $aapaleSarkarLoginCheckService;
    }

    public function edit($id)
    {
        return MarriageRegistrationForm::with(['marriageRegistrationDetail', 'marriageRegistrationGroomDetail', 'marriageRegistrationBrideInformation', 'marriageRegistrationPriestInformation', 'marriageRegistrationWitnessInformation'])->first();
    }

    public function storeMarriageRegistrationForm($request)
    {
        DB::beginTransaction();
        try {
            $data = $request->all();
            $data['user_id'] = Auth::user()->id;
            if ($request->hasFile('registration_from_affidavit_for_marriage_outside_maharashtras')) {
                $filePath = $request->file('registration_from_affidavit_for_marriage_outside_maharashtras')->store('marriage/registration-form');

                // Delete old file if updating an existing record
                if (isset($data['marriage_reg_form_id'])) {
                    $existingForm = MarriageRegistrationForm::find($data['marriage_reg_form_id']);
                    if ($existingForm && Storage::exists($existingForm->registration_from_affidavit_for_marriage_outside_maharashtra)) {
                        Storage::delete($existingForm->registration_from_affidavit_for_marriage_outside_maharashtra);
                    }
                }

                $data['registration_from_affidavit_for_marriage_outside_maharashtra'] = $filePath;
            }

            $marriageRegistrationForm = MarriageRegistrationForm::updateOrCreate(['id' => $data['marriage_reg_form_id'] ?? null], $data);


            // code to send data to marriage portal
            $fileData = [
                'registration_from_affidavit_for_marriage_outside_maharashtras' => $request->file('registration_from_affidavit_for_marriage_outside_maharashtras')
            ];
            $data = $this->curlAPiService->sendPostRequest($request->all(), config('rtsapiurl.marriage') . 'ApiController/insert_marriage', $fileData);

            $arr = json_decode($data);

            if ($arr->success) {
                MarriageRegistrationForm::where('id', $marriageRegistrationForm->id)->update([
                    'mp_id' => $arr->result->mp_id,
                    'application_no' => $arr->result->application_id
                ]);
            } else {
                DB::rollback();
                return false;
            }
            // end of code to send data to marriage portal


            DB::commit();

            return $marriageRegistrationForm;
        } catch (\Exception $e) {
            DB::rollback();
            Log::error($e);
            return false;
        }
    }

    public function storeMarriageRegistrationDetails($request)
    {
        DB::beginTransaction();

        try {
            $data = $request->all();
            $data['registration_details_marriage_date_in_english'] = date('Y-m-d', strtotime($data['registration_details_marriage_date_in_english']));
            // Check if we are updating an existing record
            $marriageRegFormId = $data['marriage_reg_form_id'] ?? null;
            $existingForm = null;

            if ($marriageRegFormId) {
                $existingForm = MarriageRegistrationDetail::where('marriage_reg_form_id', $marriageRegFormId)->first();
            }

            // Handle file uploads
            $data['registration_details_couple_photo'] = $this->handleFileUpload(
                $request,
                'registration_details_couple_photos',
                'marriage/registration-details',
                $existingForm ? $existingForm->registration_details_couple_photo : null
            );

            $data['registration_details_wedding_card_image'] = $this->handleFileUpload(
                $request,
                'registration_details_wedding_card_images',
                'marriage/registration-details',
                $existingForm ? $existingForm->registration_details_wedding_card_image : null
            );

            // Update or create the record
            $marriageRegistrationDetail = MarriageRegistrationDetail::updateOrCreate(
                ['marriage_reg_form_id' => $marriageRegFormId],
                $data
            );

            // code to send data to marriage portal
            $fileData = [
                'registration_details_couple_photos' => $request->file('registration_details_couple_photos'),
                'registration_details_wedding_card_images' => $request->file('registration_details_wedding_card_images'),
            ];
            $data = $this->curlAPiService->sendPostRequest($request->all(), config('rtsapiurl.marriage') . 'ApiController/insert_marriage_details', $fileData);

            $arr = json_decode($data);

            if (!$arr->success) {
                DB::rollback();
                return false;
            }
            // end of code to send data to marriage portal

            DB::commit();
            return $marriageRegistrationDetail;
        } catch (\Exception $e) {
            DB::rollback();
            Log::error('Error handling marriage registration:', [
                'error' => $e->getMessage(),
                'stack' => $e->getTraceAsString(),
                'request' => $request->all(),
            ]);
            return false;
        }
    }

    public function storeGroomInformation($request)
    {
        DB::beginTransaction();

        try {
            $data = $request->all();
            $data['groom_info_dob'] = date('Y-m-d', strtotime($data['groom_info_dob']));
            // Check if we are updating an existing record
            $marriageRegFormId = $data['marriage_reg_form_id'] ?? null;
            $existingForm = null;

            if ($marriageRegFormId) {
                $existingForm = MarriageRegistrationGroomDetail::where('marriage_reg_form_id', $marriageRegFormId)->first();
            }

            // Handle file uploads
            $data['groom_info_photo'] = $this->handleFileUpload($request, 'groom_info_photos', 'marriage/groom-information', $existingForm ? $existingForm->groom_info_photo : null);

            $data['groom_info_id_proof_file'] = $this->handleFileUpload($request, 'groom_info_id_proof_files', 'marriage/groom-information', $existingForm ? $existingForm->groom_info_id_proof_file : null);

            $data['groom_info_residential_proof_file'] = $this->handleFileUpload($request, 'groom_info_residential_proof_files', 'marriage/groom-information', $existingForm ? $existingForm->groom_info_residential_proof_file : null);

            $data['groom_info_age_proof_file'] = $this->handleFileUpload($request, 'groom_info_age_proof_files', 'marriage/groom-information', $existingForm ? $existingForm->groom_info_age_proof_file : null);

            $data['groom_info_upload_signature'] = $this->handleFileUpload($request, 'groom_info_upload_signatures', 'marriage/groom-information', $existingForm ? $existingForm->groom_info_upload_signature : null);

            $data['groom_info_upload_previous_status_proof'] = $this->handleFileUpload($request, 'groom_info_upload_previous_status_proofs', 'marriage/groom-information', $existingForm ? $existingForm->groom_info_upload_previous_status_proof : null);

            // Update or create the record
            $marriageRegistrationDetail = MarriageRegistrationGroomDetail::updateOrCreate(
                ['marriage_reg_form_id' => $marriageRegFormId],
                $data
            );


            // code to send data to marriage portal
            $fileData = [
                'groom_info_photos' => $request->file('groom_info_photos'),
                'groom_info_id_proof_files' => $request->file('groom_info_id_proof_files'),
                'groom_info_residential_proof_files' => $request->file('groom_info_residential_proof_files'),
                'groom_info_age_proof_files' => $request->file('groom_info_age_proof_files'),
                'groom_info_upload_signatures' => $request->file('groom_info_upload_signatures'),
                'groom_info_upload_previous_status_proofs' => $request->file('groom_info_upload_previous_status_proofs'),
            ];
            $data = $this->curlAPiService->sendPostRequest($request->all(), config('rtsapiurl.marriage') . 'ApiController/insert_groom_details', $fileData);

            $arr = json_decode($data);

            if (!$arr->success) {
                DB::rollback();
                return false;
            }
            // end of code to send data to marriage portal

            DB::commit();
            return $marriageRegistrationDetail;
        } catch (\Exception $e) {
            DB::rollback();
            Log::error('Error handling groom information:', [
                'error' => $e->getMessage(),
                'stack' => $e->getTraceAsString(),
                'request' => $request->all(),
            ]);
            return false;
        }
    }

    public function storeBrideInformation($request)
    {
        DB::beginTransaction();

        try {
            $data = $request->all();
            $data['bride_info_dob'] = date('Y-m-d', strtotime($data['bride_info_dob']));
            // Check if we are updating an existing record
            $marriageRegFormId = $data['marriage_reg_form_id'] ?? null;
            $existingForm = null;

            if ($marriageRegFormId) {
                $existingForm = MarriageRegistrationBrideInformation::where('marriage_reg_form_id', $marriageRegFormId)->first();
            }

            // Handle file uploads
            $data['bride_info_photo'] = $this->handleFileUpload($request, 'bride_info_photos', 'marriage/groom-information', $existingForm ? $existingForm->bride_info_photo : null);

            $data['bride_info_id_proof_file'] = $this->handleFileUpload($request, 'bride_info_id_proof_files', 'marriage/groom-information', $existingForm ? $existingForm->bride_info_id_proof_file : null);

            $data['bride_info_residential_proof_file'] = $this->handleFileUpload($request, 'bride_info_residential_proof_files', 'marriage/groom-information', $existingForm ? $existingForm->bride_info_residential_proof_file : null);

            $data['bride_info_age_proof_file'] = $this->handleFileUpload($request, 'bride_info_age_proof_files', 'marriage/groom-information', $existingForm ? $existingForm->bride_info_age_proof_file : null);

            $data['bride_info_upload_signature'] = $this->handleFileUpload($request, 'bride_info_upload_signatures', 'marriage/groom-information', $existingForm ? $existingForm->bride_info_upload_signature : null);

            $data['bride_info_upload_previous_status_proof'] = $this->handleFileUpload($request, 'bride_info_upload_previous_status_proofs', 'marriage/groom-information', $existingForm ? $existingForm->bride_info_upload_previous_status_proof : null);

            // Update or create the record
            $marriageRegistrationDetail = MarriageRegistrationBrideInformation::updateOrCreate(
                ['marriage_reg_form_id' => $marriageRegFormId],
                $data
            );

            // code to send data to marriage portal
            $fileData = [
                'bride_info_photos' => $request->file('bride_info_photos'),
                'bride_info_id_proof_files' => $request->file('bride_info_id_proof_files'),
                'bride_info_residential_proof_files' => $request->file('bride_info_residential_proof_files'),
                'bride_info_age_proof_files' => $request->file('bride_info_age_proof_files'),
                'bride_info_upload_signatures' => $request->file('bride_info_upload_signatures'),
                'bride_info_upload_previous_status_proofs' => $request->file('bride_info_upload_previous_status_proofs'),
            ];
            $data = $this->curlAPiService->sendPostRequest($request->all(), config('rtsapiurl.marriage') . 'ApiController/insert_bride_details', $fileData);

            $arr = json_decode($data);

            if (!$arr->success) {
                DB::rollback();
                return false;
            }
            // end of code to send data to marriage portal

            DB::commit();
            return $marriageRegistrationDetail;
        } catch (\Exception $e) {
            DB::rollback();
            Log::error('Error handling groom information:', [
                'error' => $e->getMessage(),
                'stack' => $e->getTraceAsString(),
                'request' => $request->all(),
            ]);
            return false;
        }
    }

    public function storePriestInformation($request)
    {
        DB::beginTransaction();
        try {
            $data = $request->all();
            // Check if we are updating an existing record
            $marriageRegFormId = $data['marriage_reg_form_id'] ?? null;
            $existingForm = null;

            if ($marriageRegFormId) {
                $existingForm = MarriageRegistrationDetail::where('marriage_reg_form_id', $marriageRegFormId)->first();
            }

            // Handle file uploads
            $data['priest_info_upload_signature'] = $this->handleFileUpload($request, 'priest_info_upload_signatures', 'marriage/priest-information', $existingForm ? $existingForm->priest_info_upload_signature : null);

            // Update or create the record
            $marriageRegistrationDetail = MarriageRegistrationPriestInformation::updateOrCreate(
                ['marriage_reg_form_id' => $marriageRegFormId],
                $data
            );


            // code to send data to marriage portal
            $fileData = [
                'priest_info_upload_signatures' => $request->file('priest_info_upload_signatures'),
            ];
            $data = $this->curlAPiService->sendPostRequest($request->all(), config('rtsapiurl.marriage') . 'ApiController/insert_priest_details', $fileData);

            $arr = json_decode($data);

            if (!$arr->success) {
                DB::rollback();
                return false;
            }
            // end of code to send data to marriage portal


            DB::commit();
            return $marriageRegistrationDetail;
        } catch (\Exception $e) {
            DB::rollback();
            Log::error('Error handling marriage registration:', [
                'error' => $e->getMessage(),
                'stack' => $e->getTraceAsString(),
                'request' => $request->all(),
            ]);
            return false;
        }
    }

    public function storeWitnessInformation($request)
    {
        DB::beginTransaction();
        try {
            $data = $request->all();
            // Check if we are updating an existing record
            $marriageRegFormId = $data['marriage_reg_form_id'] ?? null;
            $existingForm = null;

            if ($marriageRegFormId) {
                $existingForm = MarriageRegistrationWitnessInformation::where('marriage_reg_form_id', $marriageRegFormId)->first();
            }

            // Handle file uploads
            $data['first_witness_info_witness_photo'] = $this->handleFileUpload($request, 'first_witness_info_witness_photos', 'marriage/witness-information', $existingForm ? $existingForm->first_witness_info_witness_photo : null);

            $data['first_witness_info_upload_signature'] = $this->handleFileUpload($request, 'first_witness_info_upload_signatures', 'marriage/witness-information', $existingForm ? $existingForm->first_witness_info_upload_signature : null);

            $data['first_witness_info_upload_document'] = $this->handleFileUpload($request, 'first_witness_info_upload_documents', 'marriage/witness-information', $existingForm ? $existingForm->first_witness_info_upload_document : null);


            $data['second_witness_info_witness_photo'] = $this->handleFileUpload($request, 'second_witness_info_witness_photos', 'marriage/witness-information', $existingForm ? $existingForm->second_witness_info_witness_photo : null);

            $data['second_witness_info_upload_signature'] = $this->handleFileUpload($request, 'second_witness_info_upload_signatures', 'marriage/witness-information', $existingForm ? $existingForm->second_witness_info_upload_signature : null);

            $data['second_witness_info_upload_document'] = $this->handleFileUpload($request, 'second_witness_info_upload_documents', 'marriage/witness-information', $existingForm ? $existingForm->second_witness_info_upload_document : null);


            $data['third_witness_info_witness_photo'] = $this->handleFileUpload($request, 'third_witness_info_witness_photos', 'marriage/witness-information', $existingForm ? $existingForm->third_witness_info_witness_photo : null);

            $data['third_witness_info_upload_signature'] = $this->handleFileUpload($request, 'third_witness_info_upload_signatures', 'marriage/witness-information', $existingForm ? $existingForm->third_witness_info_upload_signature : null);

            $data['third_witness_info_upload_document'] = $this->handleFileUpload($request, 'third_witness_info_upload_documents', 'marriage/witness-information', $existingForm ? $existingForm->third_witness_info_upload_document : null);

            // Update or create the record
            $marriageRegistrationDetail = MarriageRegistrationWitnessInformation::updateOrCreate(
                ['marriage_reg_form_id' => $marriageRegFormId],
                $data
            );


            // code to send data to marriage portal
            $fileData = [
                'priest_info_upload_signatures' => $request->file('priest_info_upload_signatures'),
            ];
            $data = $this->curlAPiService->sendPostRequest($request->all(), config('rtsapiurl.marriage') . 'ApiController/insert_priest_details', $fileData);

            $arr = json_decode($data);

            if ($arr->success) {
                // call function to send data to aapale sarkar portal
                if (Auth::user()->is_aapale_sarkar_user) {
                    $aapaleSarkarCredential = ServiceCredential::where('service_name', 'Marriage register certificate')->first();

                    $send = $this->aapaleSarkarLoginCheckService->encryptAndSendRequestToAapaleSarkar(Auth::user()->trackid, $aapaleSarkarCredential->client_code, Auth::user()->user_id, $aapaleSarkarCredential->service_id, 'application number', 'N', 'NA', 'N', 'NA', "20", date('Y-m-d', strtotime('+20 days')), 23.60, 1, 2, 'Payment Pending', $aapaleSarkarCredential->ulb_id, $aapaleSarkarCredential->ulb_district, 'NA', 'NA', 'NA', $aapaleSarkarCredential->check_sum_key, $aapaleSarkarCredential->str_key, $aapaleSarkarCredential->str_iv, $aapaleSarkarCredential->soap_end_point_url, $aapaleSarkarCredential->soap_action_app_status_url);

                    if (!$send) {
                        return false;
                    }
                }
                // end of call function to send data to aapale sarkar portal
            } else {
                DB::rollback();
                return false;
            }

            // end of code to send data to marriage portal

            DB::commit();
            return $marriageRegistrationDetail;
        } catch (\Exception $e) {
            DB::rollback();
            Log::error('Error handling marriage registration:', [
                'error' => $e->getMessage(),
                'stack' => $e->getTraceAsString(),
                'request' => $request->all(),
            ]);
            return false;
        }
    }


    private function handleFileUpload($request, $fileInputName, $storagePath, $existingFilePath = null)
    {
        if ($request->hasFile($fileInputName)) {
            // Store the new file
            $filePath = $request->file($fileInputName)->store($storagePath);

            // Delete the old file if it exists
            if ($existingFilePath && Storage::exists($existingFilePath)) {
                Storage::delete($existingFilePath);
            }

            return $filePath;
        }

        // Return the existing file path if no new file is uploaded
        return $existingFilePath;
    }
}
