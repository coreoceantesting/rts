<?php

namespace App\Models\Marriage;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Marriage\MarriageRegistrationForm;
use Illuminate\Support\Facades\Request;

class MarriageRegistrationBrideInformation extends Model
{
    use HasFactory;

    protected $table = "marriage_reg_bride_info";

    protected $fillable = [
        "marriage_reg_form_id",
        "bride_info_fname_in_english",
        "bride_info_mname_in_english",
        "bride_info_lname_in_english",
        "bride_info_fname_in_marathi",
        "bride_info_mname_in_marathi",
        "bride_info_lname_in_marathi",
        "bride_info_address_in_english",
        "bride_info_address_in_marathi",
        "bride_info_pincode",
        "bride_info_pincode_in_marathi",
        "bride_info_mobile_no",
        "bride_info_email",
        "bride_info_aadhar_card_no",
        "bride_info_dob",
        "bride_info_age",
        "bride_info_gender",
        "bride_info_religion_by_birth",
        "bride_info_religion_by_adoption",
        "bride_info_photo",
        "bride_info_id_proof",
        "bride_info_residential_proof",
        "bride_info_age_proof",
        "bride_info_id_proof_file",
        "bride_info_residential_proof_file",
        "bride_info_age_proof_file",
        "bride_info_upload_signature",
        "bride_info_previous_status",
        "bride_info_previous_status_proof",
        "bride_info_upload_previous_status_proof",
        'ip'
    ];

    public function marriageRegForm()
    {
        return $this->belongsTo(MarriageRegistrationForm::class, 'marriage_reg_form_id', 'id');
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->ip = Request::ip();
        });
    }
}
