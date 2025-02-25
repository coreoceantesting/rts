<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;

class HoardingPermission extends Model
{
    use HasFactory;

    protected $table = 'hoarding_permissions';

    protected $fillable = [
        'user_id',
        'service_id',
        'aapale_sarkar_payment_date',
        'status',
        'application_no',
        'is_payment_paid_aapale_sarkar',
        'status_remark',
        'is_payment_paid',
        'f_name',
        'title',
        'm_name',
        'l_name',
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
        'building_permission',
        'paid_receipt',
        'structural_engineer',
        'certificate_of_structural',
        'no_objection_certificate',
        'sightseeing',
        'drawing_provided',
        'pr_card',
        'site_occupancy',
        'medical_certificate',
        'pest_control',
        'gst_registration',
        'drug_administration',
        'fire_rigade',
        'liquor_license',
        'ip',
        'type_hoarding',
        'advertisement_place',
        'chowk',
        'plot_no',
        'size_hoarding',
        'bussiness_hoarding',
        'format_advertisement',
        'height',
        'structure',
        'open_populated',
        'behalf',
        'detail_property',
        'detail_property_image',
        'postal_address',
        'consent_letter',
        'start_date',
        'end_date'

    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->ip = Request::ip();
        });
    }
}
