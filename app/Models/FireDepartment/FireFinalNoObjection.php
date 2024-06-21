<?php

namespace App\Models\FireDepartment;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FireFinalNoObjection extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'is_aapale_sarkar_payment_paid',
        'applicant_full_name',
        'address',
        'mobile_no',
        'email_id',
        'aadhar_no',
        'zone',
        'ward_area',
        'building_type',
        'house_no',
        'building_name',
        'city_structure',
        'uploaded_application',
        'no_dues_document',
        'architect_application_document',
        'erection_of_fire_document',
        'licensing_agency_document',
        'guarantee_of_developer_document',
    ];
}
