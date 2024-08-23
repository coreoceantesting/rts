<?php

namespace App\Models\Trade;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TradeAutoRenewalLicensePermission extends Model
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
        'zone',
        'ward_area',
        'current_permission_no',
        'current_permission_date',
        'current_permission_expiry_date',
        'current_permission_validity_date',
        'business_start_date',
        'business_or_trade_name',
        'permission_detail',
        'plot_no',
        'description_of_trade_place',
        'is_preveious_permission_declined_by_council',
        'previous_permission_decline_reason',
        'is_place_owned_by_council',
        'is_any_dues_pending_of_council',
        'trade_or_business_type',
        'property_no',
        'remark',
        'no_dues_document',
        'application_document'
    ];
}
