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
            if ($request->hasFile('registration_from_affidavit_for_marriage_outside_maharashtras')) {
                $request['registration_from_affidavit_for_marriage_outside_maharashtra'] = $request->registration_from_affidavit_for_marriage_outside_maharashtras->store('marriage/registration-form');
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
            if ($request->hasFile('registration_details_couple_photos')) {
                $request['registration_details_couple_photo'] = $request->registration_details_couple_photos->store('marriage/registration-details');
            }

            if ($request->hasFile('registration_details_wedding_card_images')) {
                $request['registration_details_wedding_card_image'] = $request->registration_details_wedding_card_images->store('marriage/registration-details');
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

            if ($request->hasFile('groom_info_photos')) {
                $request['groom_info_photo'] = $request->groom_info_photos->store('marriage/groom-information');
            }

            if ($request->hasFile('groom_info_id_proof_files')) {
                $request['groom_info_id_proof_file'] = $request->groom_info_id_proof_files->store('marriage/groom-information');
            }

            if ($request->hasFile('groom_info_residential_proof_files')) {
                $request['groom_info_residential_proof_file'] = $request->groom_info_residential_proof_files->store('marriage/groom-information');
            }

            if ($request->hasFile('groom_info_age_proof_files')) {
                $request['groom_info_age_proof_file'] = $request->groom_info_age_proof_files->store('marriage/groom-information');
            }

            if ($request->hasFile('groom_info_upload_signatures')) {
                $request['groom_info_upload_signature'] = $request->groom_info_upload_signatures->store('marriage/groom-information');
            }

            if ($request->hasFile('groom_info_upload_previous_status_proofs')) {
                $request['groom_info_upload_previous_status_proof'] = $request->groom_info_upload_previous_status_proofs->store('marriage/groom-information');
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

            if ($request->hasFile('bride_info_photos')) {
                $request['bride_info_photo'] = $request->bride_info_photos->store('marriage/bride-information');
            }

            if ($request->hasFile('bride_info_id_proof_files')) {
                $request['bride_info_id_proof_file'] = $request->bride_info_id_proof_files->store('marriage/bride-information');
            }

            if ($request->hasFile('bride_info_residential_proof_files')) {
                $request['bride_info_residential_proof_file'] = $request->bride_info_residential_proof_files->store('marriage/bride-information');
            }

            if ($request->hasFile('bride_info_age_proof_files')) {
                $request['bride_info_age_proof_file'] = $request->bride_info_age_proof_files->store('marriage/bride-information');
            }

            if ($request->hasFile('bride_info_upload_signatures')) {
                $request['bride_info_upload_signature'] = $request->bride_info_upload_signatures->store('marriage/bride-information');
            }

            if ($request->hasFile('bride_info_upload_previous_status_proofs')) {
                $request['bride_info_upload_previous_status_proof'] = $request->bride_info_upload_previous_status_proofs->store('marriage/bride-information');
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
            if ($request->hasFile('priest_info_upload_signatures')) {
                $request['priest_info_upload_signature'] = $request->priest_info_upload_signatures->store('marriage/priest-information');
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
            if ($request->hasFile('first_witness_info_witness_photos')) {
                $request['first_witness_info_witness_photo'] = $request->first_witness_info_witness_photos->store('marriage/witness-information');
            }

            if ($request->hasFile('first_witness_info_upload_signatures')) {
                $request['first_witness_info_upload_signature'] = $request->first_witness_info_upload_signatures->store('marriage/witness-information');
            }

            if ($request->hasFile('first_witness_info_upload_documents')) {
                $request['first_witness_info_upload_document'] = $request->first_witness_info_upload_documents->store('marriage/witness-information');
            }



            if ($request->hasFile('second_witness_info_witness_photos')) {
                $request['second_witness_info_witness_photo'] = $request->second_witness_info_witness_photos->store('marriage/witness-information');
            }

            if ($request->hasFile('second_witness_info_upload_signatures')) {
                $request['second_witness_info_upload_signature'] = $request->second_witness_info_upload_signatures->store('marriage/witness-information');
            }

            if ($request->hasFile('second_witness_info_upload_documents')) {
                $request['second_witness_info_upload_document'] = $request->second_witness_info_upload_documents->store('marriage/witness-information');
            }


            if ($request->hasFile('third_witness_info_witness_photos')) {
                $request['third_witness_info_witness_photo'] = $request->third_witness_info_witness_photos->store('marriage/witness-information');
            }

            if ($request->hasFile('third_witness_info_upload_signatures')) {
                $request['third_witness_info_upload_signature'] = $request->third_witness_info_upload_signatures->store('marriage/witness-information');
            }

            if ($request->hasFile('third_witness_info_upload_documents')) {
                $request['third_witness_info_upload_document'] = $request->third_witness_info_upload_documents->store('marriage/witness-information');
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
