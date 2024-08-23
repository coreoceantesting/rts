<?php

namespace App\Models\Trade;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        'old_partner_count',
        'new_partner_count',
        'address',
        'mobile_no',
        'email_id',
        'zone',
        'ward_area',
        'remark',
        'application_document'
    ];
}
