<?php

namespace App\Models\Trade;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TradeLicenseTransfer extends Model
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
        'office_address',
        'mobile_no',
        'email_id',
        'aadhar_no',
        'current_permission_no',
        'current_permission_date',
        'business_start_date',
        'business_or_trade_name',
        'area_size',
        'new_permission_details',
        'zone',
        'ward_area',
        'permission_detail',
        'plot_no',
        'description_of_new_trade_place',
        'is_preveious_permission_declined_by_council',
        'previous_permission_decline_reason',
        'is_place_owned_by_council',
        'is_any_dues_pending_of_council',
        'trade_or_business_type',
        'partner_count',
        'partner_names',
        'property_no',
        'new_applicant_name',
        'new_applicant_email',
        'new_applicant_mobile_no',
        'new_applicant_aadhar_no',
        'address_of_new_applicant',
        'remark',
        'no_dues_document',
        'application_document'
    ];
}
