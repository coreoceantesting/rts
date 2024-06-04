<?php

namespace App\Models\Marriage;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MarriageRegistrationForm extends Model
{
    use HasFactory;

    protected $table = "marriage_reg_details";

    protected $fillable = ["registration_from_applicant_mobile_no", "registration_from_applicant_full_name", "registration_from_applicant_home_address", "registration_from_pincode", "registration_from_applicant_email", "registration_from_aadhar_card_no", "registration_from_pan_card_no", "registration_from_residential_ward_name", "registration_from_marriage_solemnized_within_maharashtra_state", "registration_from_affidavit_for_marriage_outside_maharashtra"];
}
