<?php

namespace App\Models\WaterDepartment;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;

class Waternewconnection extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'service_id',
        'water_connection_no',
        'aapale_sarkar_payment_date',
        'is_aapale_sarkar_payment_paid',
        'status',
        'applicant_full_name',
        'aadhar_no',
        'mobile_no',
        'email_id',
        'zone',
        'ward_area',
        'city_servey_no',
        'address',
        'landmark',
        'property_no',
        'total_person',
        'distance',
        'water_connection_use',
        'pipe_size',
        'no_of_tap',
        'current_no_of_tap',
        'total_tenants',
        'written_application_document',
        'ownership_document',
        'no_dues_document',
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
