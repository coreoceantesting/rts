<?php

namespace App\Models\Marriage;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Marriage\MarriageRegistrationForm;
use Illuminate\Support\Facades\Request;

class MarriageRegistrationWitnessInformation extends Model
{
    use HasFactory;

    protected $table = "marriage_reg_witness_info";

    protected $fillable = [
        "marriage_reg_form_id",
        "first_witness_info_fname_in_english",
        "first_witness_info_fname_in_marathi",
        "first_witness_info_mobile_no",
        "first_witness_info_dob",
        "first_witness_info_age",
        "first_witness_info_gender",
        "first_witness_info_relation",
        "first_witness_info_address_in_english",
        "first_witness_info_address_in_marathi",
        "first_witness_info_id_proof",
        "first_witness_info_witness_photo",
        "first_witness_info_upload_signature",
        "first_witness_info_upload_document",
        "second_witness_info_fname_in_english",
        "second_witness_info_fname_in_marathi",
        "second_witness_info_mobile_no",
        "second_witness_info_dob",
        "second_witness_info_age",
        "second_witness_info_gender",
        "second_witness_info_relation",
        "second_witness_info_address_in_english",
        "second_witness_info_address_in_marathi",
        "second_witness_info_id_proof",
        "second_witness_info_witness_photo",
        "second_witness_info_upload_signature",
        "second_witness_info_upload_document",
        "third_witness_info_fname_in_english",
        "third_witness_info_fname_in_marathi",
        "third_witness_info_mobile_no",
        "third_witness_info_dob",
        "third_witness_info_age",
        "third_witness_info_gender",
        "third_witness_info_relation",
        "third_witness_info_address_in_english",
        "third_witness_info_address_in_marathi",
        "third_witness_info_id_proof",
        "third_witness_info_witness_photo",
        "third_witness_info_upload_signature",
        "third_witness_info_upload_document",
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
