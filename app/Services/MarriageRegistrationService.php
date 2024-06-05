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

class MarriageRegistrationService
{
    public function storeMarriageRegistrationForm($request)
    {
        DB::beginTransaction();
        try {
            if ($request->hasFile('registration_from_affidavit_for_marriage_outside_maharashtra')) {
                $request['registration_from_affidavit_for_marriage_outside_maharashtra'] = $request->registration_from_affidavit_for_marriage_outside_maharashtra->store('marriage/registration-form');
            }
            $marriageRegistrationForm = MarriageRegistrationForm::create($request->all());
            DB::commit();

            return $marriageRegistrationForm;
        } catch (\Exception $e) {
            DB::rollback();
            Log::info($e);
            return false;
        }
    }

    public function storeMarriageRegistrationDetails($request)
    {
        DB::beginTransaction();
        try {
            if ($request->hasFile('registration_details_couple_photo')) {
                $request['registration_details_couple_photo'] = $request->registration_details_couple_photo->store('marriage/registration-details');
            }

            if ($request->hasFile('registration_details_wedding_card_image')) {
                $request['registration_details_wedding_card_image'] = $request->registration_details_wedding_card_image->store('marriage/registration-details');
            }

            $marriageRegistrationDetail = MarriageRegistrationDetail::create($request->all());
            DB::commit();

            return $marriageRegistrationDetail;
        } catch (\Exception $e) {
            DB::rollback();
            Log::info($e);
            return false;
        }
    }

    public function storeGroomInformation($request)
    {
        DB::beginTransaction();
        try {

            if ($request->hasFile('groom_info_photo')) {
                $request['groom_info_photo'] = $request->groom_info_photo->store('marriage/groom-information');
            }

            if ($request->hasFile('groom_info_id_proof_file')) {
                $request['groom_info_id_proof_file'] = $request->groom_info_id_proof_file->store('marriage/groom-information');
            }

            if ($request->hasFile('groom_info_residential_proof_file')) {
                $request['groom_info_residential_proof_file'] = $request->groom_info_residential_proof_file->store('marriage/groom-information');
            }

            if ($request->hasFile('groom_info_age_proof_file')) {
                $request['groom_info_age_proof_file'] = $request->groom_info_age_proof_file->store('marriage/groom-information');
            }

            if ($request->hasFile('groom_info_upload_signature')) {
                $request['groom_info_upload_signature'] = $request->groom_info_upload_signature->store('marriage/groom-information');
            }

            if ($request->hasFile('groom_info_upload_previous_status_proof')) {
                $request['groom_info_upload_previous_status_proof'] = $request->groom_info_upload_previous_status_proof->store('marriage/groom-information');
            }

            $groomDetail = MarriageRegistrationGroomDetail::create($request->all());
            DB::commit();

            return $groomDetail;
        } catch (\Exception $e) {
            DB::rollback();
            Log::info($e);
            return false;
        }
    }

    public function storeBrideInformation($request)
    {
        DB::beginTransaction();
        try {

            if ($request->hasFile('bride_info_photo')) {
                $request['bride_info_photo'] = $request->bride_info_photo->store('marriage/bride-information');
            }

            if ($request->hasFile('bride_info_id_proof_file')) {
                $request['bride_info_id_proof_file'] = $request->bride_info_id_proof_file->store('marriage/bride-information');
            }

            if ($request->hasFile('bride_info_residential_proof_file')) {
                $request['bride_info_residential_proof_file'] = $request->bride_info_residential_proof_file->store('marriage/bride-information');
            }

            if ($request->hasFile('bride_info_age_proof_file')) {
                $request['bride_info_age_proof_file'] = $request->bride_info_age_proof_file->store('marriage/bride-information');
            }

            if ($request->hasFile('bride_info_upload_signature')) {
                $request['bride_info_upload_signature'] = $request->bride_info_upload_signature->store('marriage/bride-information');
            }

            if ($request->hasFile('bride_info_upload_previous_status_proof')) {
                $request['bride_info_upload_previous_status_proof'] = $request->bride_info_upload_previous_status_proof->store('marriage/bride-information');
            }

            $brideDetail = MarriageRegistrationBrideInformation::create($request->all());
            DB::commit();

            return $brideDetail;
        } catch (\Exception $e) {
            DB::rollback();
            Log::info($e);
            return false;
        }
    }

    public function storePriestInformation($request)
    {
        DB::beginTransaction();
        try {
            if ($request->hasFile('priest_info_upload_signature')) {
                $request['priest_info_upload_signature'] = $request->priest_info_upload_signature->store('marriage/priest-information');
            }

            $priestInfo = MarriageRegistrationPriestInformation::create($request->all());
            DB::commit();

            return $priestInfo;
        } catch (\Exception $e) {
            DB::rollback();
            Log::info($e);
            return false;
        }
    }

    public function storeWitnessInformation($request)
    {
        DB::beginTransaction();
        try {
            if ($request->hasFile('first_witness_info_witness_photo')) {
                $request['first_witness_info_witness_photo'] = $request->first_witness_info_witness_photo->store('marriage/witness-information');
            }

            if ($request->hasFile('first_witness_info_upload_signature')) {
                $request['first_witness_info_upload_signature'] = $request->first_witness_info_upload_signature->store('marriage/witness-information');
            }

            if ($request->hasFile('first_witness_info_upload_document')) {
                $request['first_witness_info_upload_document'] = $request->first_witness_info_upload_document->store('marriage/witness-information');
            }



            if ($request->hasFile('second_witness_info_witness_photo')) {
                $request['second_witness_info_witness_photo'] = $request->second_witness_info_witness_photo->store('marriage/witness-information');
            }

            if ($request->hasFile('second_witness_info_upload_signature')) {
                $request['second_witness_info_upload_signature'] = $request->second_witness_info_upload_signature->store('marriage/witness-information');
            }

            if ($request->hasFile('second_witness_info_upload_document')) {
                $request['second_witness_info_upload_document'] = $request->second_witness_info_upload_document->store('marriage/witness-information');
            }


            if ($request->hasFile('third_witness_info_witness_photo')) {
                $request['third_witness_info_witness_photo'] = $request->third_witness_info_witness_photo->store('marriage/witness-information');
            }

            if ($request->hasFile('third_witness_info_upload_signature')) {
                $request['third_witness_info_upload_signature'] = $request->third_witness_info_upload_signature->store('marriage/witness-information');
            }

            if ($request->hasFile('third_witness_info_upload_document')) {
                $request['third_witness_info_upload_document'] = $request->third_witness_info_upload_document->store('marriage/witness-information');
            }

            $witnessInfo = MarriageRegistrationWitnessInformation::create($request->all());
            DB::commit();

            return $witnessInfo;
        } catch (\Exception $e) {
            DB::rollback();
            Log::info($e);
            return false;
        }
    }
}
