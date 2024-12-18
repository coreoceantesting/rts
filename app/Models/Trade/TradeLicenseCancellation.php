<?php

namespace App\Models\Trade;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;

class TradeLicenseCancellation extends Model
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
        'email_id',
        'aadhar_no',
        'current_permission_no',
        'current_permission_date',
        'business_start_date',
        'business_or_trade_name',
        'new_permission_detail',
        'reason_for_trade_license_cancellation',
        'zone',
        'ward_area',
        'plot_no',
        'permission_details',
        'is_preveious_permission_declined_by_council',
        'previous_permission_decline_reason',
        'is_place_owned_by_council',
        'is_any_dues_pending_of_council',
        'trade_or_business_type',
        'property_no',
        'remark',
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
