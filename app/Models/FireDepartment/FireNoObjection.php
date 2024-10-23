<?php

namespace App\Models\FireDepartment;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FireNoObjection extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'service_id',
        'status',
        'status_remark',
        'payment_date',
        'is_payment_paid',
        'upic_id',
        'application_no',
        'is_aapale_sarkar_payment_paid',
        'aapale_sarkar_payment_date',
        'applicant_full_name',
        'building_type',
        'building_name',
        'address',
        'mobile_no',
        'email_id',
        'aadhar_no',
        'zone',
        'ward_area',
        'subject',
        'uploaded_application',
        'no_dues_document',
        'architect_application_document',
        'fire_prevention_document',
        'capitation_fee_document',
    ];
}
