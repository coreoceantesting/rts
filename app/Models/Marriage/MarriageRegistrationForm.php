<?php

namespace App\Models\Marriage;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Marriage\MarriageRegistrationDetail;
use App\Models\Marriage\MarriageRegistrationGroomDetail;
use App\Models\Marriage\MarriageRegistrationBrideInformation;
use App\Models\Marriage\MarriageRegistrationPriestInformation;
use App\Models\Marriage\MarriageRegistrationWitnessInformation;

class MarriageRegistrationForm extends Model
{
    use HasFactory;

    protected $table = "marriage_reg_forms";

    protected $fillable = ["application_no", "mp_id", "registration_from_applicant_mobile_no", "registration_from_applicant_full_name", "registration_from_applicant_home_address", "registration_from_pincode", "registration_from_applicant_email", "registration_from_aadhar_card_no", "registration_from_pan_card_no", "registration_from_residential_ward_name", "registration_from_marriage_solemnized_within_maharashtra_state", "registration_from_affidavit_for_marriage_outside_maharashtra", "registration_from_alternate_mobile_number"];

    public function marriageRegistrationDetail()
    {
        return $this->hasOne(MarriageRegistrationDetail::class, 'marriage_reg_form_id', 'id');
    }

    public function marriageRegistrationGroomDetail()
    {
        return $this->hasOne(MarriageRegistrationGroomDetail::class, 'marriage_reg_form_id', 'id');
    }

    public function marriageRegistrationBrideInformation()
    {
        return $this->hasOne(MarriageRegistrationBrideInformation::class, 'marriage_reg_form_id', 'id');
    }

    public function marriageRegistrationPriestInformation()
    {
        return $this->hasOne(MarriageRegistrationPriestInformation::class, 'marriage_reg_form_id', 'id');
    }

    public function marriageRegistrationWitnessInformation()
    {
        return $this->hasOne(MarriageRegistrationWitnessInformation::class, 'marriage_reg_form_id', 'id');
    }
}
