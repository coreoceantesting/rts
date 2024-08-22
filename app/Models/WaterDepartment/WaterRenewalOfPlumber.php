<?php

namespace App\Models\WaterDepartment;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WaterRenewalOfPlumber extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'service_id',
        'water_connection_no',
        'aapale_sarkar_payment_date',
        'is_aapale_sarkar_payment_paid',
        'status',
        'plumber_license_no',
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
        'nodues_document',
        'educational_certificate_document',
        'application_document',
        'remark'
    ];
}
