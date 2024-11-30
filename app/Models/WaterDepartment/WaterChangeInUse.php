<?php

namespace App\Models\WaterDepartment;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;

class WaterChangeInUse extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'service_id',
        'water_connection_no',
        'aapale_sarkar_payment_date',
        'is_aapale_sarkar_payment_paid',
        'status',
        'property_owner_name',
        'aadhar_no',
        'mobile_no',
        'email_id',
        'zone',
        'ward_area',
        'plot_no',
        'house_no',
        'landmark',
        'address',
        'property_type',
        'water_connection_no',
        'applicant_is_on_rent',
        'water_connection_size',
        'water_usage',
        'new_water_con_usage',
        'usage_residence_type',
        'current_connection_is_illegal',
        'no_of_user',
        'place_belongs_to_municipal',
        'any_police_complaint',
        'application_document',
        'nodues_document',
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
