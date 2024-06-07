<?php

namespace App\Models\Marriage;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Marriage\MarriageRegistrationForm;

class MarriageRegistrationGroomDetail extends Model
{
    use HasFactory;

    protected $table = "marriage_reg_groom_infos";

    protected $fillable = ["marriage_reg_form_id", "groom_info_fname_in_english", "groom_info_mname_in_english", "groom_info_lname_in_english", "groom_info_fname_in_marathi", "groom_info_mname_in_marathi", "groom_info_lname_in_marathi", "groom_info_address_in_english", "groom_info_address_in_marathi", "groom_info_pincode", "groom_info_pincode_in_marathi", "groom_info_mobile_no", "groom_info_email", "groom_info_aadhar_card_no", "groom_info_dob", "groom_info_age", "groom_info_gender", "groom_info_religion_by_birth", "groom_info_religion_by_adoption", "groom_info_photo", "groom_info_id_proof", "groom_info_residential_proof", "groom_info_age_proof", "groom_info_id_proof_file", "groom_info_residential_proof_file", "groom_info_age_proof_file", "groom_info_upload_signature", "groom_info_previous_status", "groom_info_previous_status_proof", "groom_info_upload_previous_status_proof"];

    public function marriageRegForm()
    {
        return $this->belongsTo(MarriageRegistrationForm::class, 'marriage_reg_form_id', 'id');
    }
}
