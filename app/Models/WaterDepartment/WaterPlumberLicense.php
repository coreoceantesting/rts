<?php

namespace App\Models\WaterDepartment;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WaterPlumberLicense extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'is_aapale_sarkar_payment_paid',
        'applicant_name',
        'address',
        'aadhar_no',
        'mobile_no',
        'email_id',
        'zone',
        'ward_area',
        'education_institutation',
        'education_qualification',
        'training_institute_name',
        'year_of_passing',
        'have_experience',
        'application_document',
        'nodues_document',
    ];
}
