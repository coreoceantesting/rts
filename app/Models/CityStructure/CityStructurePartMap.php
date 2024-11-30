<?php

namespace App\Models\CityStructure;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;

class CityStructurePartMap extends Model
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
        'applicant_name',
        'applicant_full_address',
        'mobile_no',
        'email_id',
        'aadhar_no',
        'zone',
        'servey_number',
        'prescribed_format',
        'upload_city_survey_certificate',
        'upload_city_servey_map',
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
