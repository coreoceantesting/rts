<?php

namespace App\Models\ConstructionDepartment;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;

class ConstructionRoadCutting extends Model
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
        'applicant_type',
        'applicant_name',
        'applicant_full_address',
        'zone',
        'ward',
        'company_name',
        'designation',
        'mobile_no',
        'email_id',
        'aadhar_no',
        'road_cutting_purpose',
        'road_length',
        'no_of_location',
        'road_cutting_address',
        'location_size',
        'upload_prescribed_format',
        'upload_no_dues_certificate',
        'upload_gov_instructed_doc',
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
