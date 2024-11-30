<?php

namespace App\Models\Trade;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;

class TradeChangeLicenseType extends Model
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
        'address',
        'mobile_no',
        'aadhar_no',
        'email_id',
        'zone',
        'ward_area',
        'current_permission_no',
        'old_treade_license_name',
        'new_treade_license_name',
        'remark',
        'no_dues_document',
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
