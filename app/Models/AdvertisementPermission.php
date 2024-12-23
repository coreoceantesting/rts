<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;

class AdvertisementPermission extends Model
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
        'mobile_no',
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
        'application',
        'owner_land',
        'society_letter',
        'resolution_soc',
        'light_bill',
        'structural_engineer',
        'stability_certificate',
        'police_noc',
        'location_plan',
        'site_dtp',
        'taking_i',
        'taking_ii',
        'advertising_insurance',
        'advertising_size',
        'rental_agreement',
        'ip',
        'applicant_object',
        'statuss',
        'faxid',
        'advertisement_medium',
        'advertisement_type',
        'format',
        'displaying_sign',
        'device_type',
        'length_foot',
        'length_meter',
        'width_foot',
        'width_meter',
        'total_foot',
        'total_meter',
        'land_owner',
        'no_objection_certificates',
        'rule_19',
        'applicant'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->ip = Request::ip();
        });
    }
}
