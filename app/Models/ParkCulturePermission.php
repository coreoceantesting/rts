<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;

class ParkCulturePermission extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'service_id',
        'aapale_sarkar_payment_date',
        'status',
        'application_no',
        'is_payment_paid_aapale_sarkar',
        'status_remark',
        'is_payment_paid',
        'applicant_name',
        'full_address',
        'mobile_no',
        'zone',
        'ward_area',
        'email_id',
        'aadhar_number',
        'pancard_number',
        'full_address',
        'business_name',
        'business_type',
        'business',
        'gst',
        'area',
        'date_commencement',
        'address_est',
        'advance_device',
        'first_aid',
        'numb_of_worker',
        'number_of_women',
        'number_of_men',
        'other',
        'gumasta_certificate',
        'aadhar_pan',
        'land_ownership',
        'water_bill',
        'no_objection_certificate',
        'photo_of_place',
        'property_tax',
        'tenancy_agreement',
        'site_occupancy',
        'medical_certificate',
        'pest_control',
        'gst_registration',
        'drug_administration',
        'fire_rigade',
        'liquor_license',
        'ip'
    ];
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->ip = Request::ip();
        });
    }
}
