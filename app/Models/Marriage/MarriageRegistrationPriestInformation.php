<?php

namespace App\Models\Marriage;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Marriage\MarriageRegistrationForm;

class MarriageRegistrationPriestInformation extends Model
{
    use HasFactory;

    protected $table = "marriage_reg_priest_info";

    protected $fillable = ["marriage_reg_form_id", "priest_info_fname_in_english", "priest_info_mname_in_english", "priest_info_lname_in_english", "priest_info_fname_in_marathi", "priest_info_mname_in_marathi", "priest_info_lname_in_marathi", "priest_info_address_in_english", "priest_info_address_in_marathi", "priest_info_mobile_no", "priest_info_age", "priest_info_religion", "priest_info_upload_signature"];

    public function marriageRegForm()
    {
        return $this->hasOne(MarriageRegistrationForm::class, 'marriage_reg_form_id', 'id');
    }
}
