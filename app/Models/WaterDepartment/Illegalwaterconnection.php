<?php

namespace App\Models\WaterDepartment;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;

class Illegalwaterconnection extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'service_id',
        'water_connection_no',
        'aapale_sarkar_payment_date',
        'is_aapale_sarkar_payment_paid',
        'status',
        'complainants_full_name',
        'address',
        'aadhar_no',
        'mobile_no',
        'email_id',
        'unauthorized_tap_connection',
        'zone',
        'ward_area',
        'plot_no',
        'house_no',
        'landmark',
        'unauthorized_connection_address',
        'current_connection_is_authorized',
        'applicant_or_tenant',
        'unauthorized_is_tenant',
        'criminal_judicial_issue',
        'existing_connection_detail',
        'place_belongs_to_municipal',
        'comment',
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
