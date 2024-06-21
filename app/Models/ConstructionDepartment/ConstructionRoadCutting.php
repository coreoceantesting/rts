<?php

namespace App\Models\ConstructionDepartment;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConstructionRoadCutting extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'is_aapale_sarkar_payment_paid',
        'applicant_type',
        'applicant_name',
        'applicant_full_address',
        'zone',
        'ward',
        'company_name',
        'designation',
        'mobile_no',
        'email_id',
        'aadhar_no',
        'road_cutting_purpose',
        'road_length',
        'no_of_location',
        'road_cutting_address',
        'location_size',
        'upload_prescribed_format',
        'upload_no_dues_certificate',
        'upload_gov_instructed_doc'
    ];
}
