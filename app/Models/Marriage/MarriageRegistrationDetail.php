<?php

namespace App\Models\Marriage;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Marriage\MarriageRegistrationForm;

class MarriageRegistrationDetail extends Model
{
    use HasFactory;

    protected $table = "marriage_reg_details";

    protected $fillable = ["marriage_reg_form_id", "registration_details_form_filled_date", "registration_details_marriage_date_in_english", "registration_details_marriage_date_in_marathi", "registration_details_marriage_place_in_english", "registration_details_marriage_place_in_marathi", "registration_details_couple_photo", "registration_details_is_widow", "registration_details_is_previously_divorced", "registration_details_is_marriage_intercaste", "registration_details_wedding_card_image"];

    public function marriageRegForm()
    {
        return $this->hasOne(MarriageRegistrationForm::class, 'marriage_reg_form_id', 'id');
    }
}
