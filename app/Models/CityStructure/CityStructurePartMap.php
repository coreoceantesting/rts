<?php

namespace App\Models\CityStructure;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CityStructurePartMap extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'is_aapale_sarkar_payment_paid',
        'applicant_name',
        'applicant_full_address',
        'mobile_no',
        'email_id',
        'aadhar_no',
        'zone',
        'servey_number',
        'prescribed_format',
        'upload_city_survey_certificate',
        'upload_city_servey_map',
    ];
}
