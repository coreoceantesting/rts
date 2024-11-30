<?php

namespace App\Models\Trade;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;

class TradeChangeOwnerCount extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'service_id',
        'water_connection_no',
        'aapale_sarkar_payment_date',
        'is_aapale_sarkar_payment_paid',
        'status',
        'current_permission_no',
        'applicant_full_name',
        'old_owner_name',
        'new_owner_name',
        'old_partner_name',
        'new_partner_name',
        'address',
        'mobile_no',
        'email_id',
        'zone',
        'ward_area',
        'remark',
        'application_document',
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
