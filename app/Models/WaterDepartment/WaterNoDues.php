<?php

namespace App\Models\WaterDepartment;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;

class WaterNoDues extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'service_id',
        'water_connection_no',
        'aapale_sarkar_payment_date',
        'is_aapale_sarkar_payment_paid',
        'status',
        'water_connection_no',
        'property_no',
        'property_owner_name',
        'aadhar_no',
        'mobile_no',
        'email_id',
        'zone',
        'ward_area',
        'address',
        'landmark',
        'plot_no',
        'house_no',
        'applicant_is_on_rent',
        'date_of_water_bill',
        'criminal_judicial_issue',
        'tap_size',
        'current_existing_tap_type',
        'place_belongs_to_municipal',
        'current_connection_is_illegal',
        'application_document',
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
