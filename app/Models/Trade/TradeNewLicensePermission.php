<?php

namespace App\Models\Trade;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TradeNewLicensePermission extends Model
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
        'office_address',
        'mobile_no',
        'email_id',
        'aadhar_no',
        'business_start_date',
        'business_or_trade_name',
        'area_size',
        'new_permission_details',
        'zone',
        'ward_area',
        'plot_no',
        'city_servye_no',
        'description_of_new_trade_place',
        'is_preveious_permission_declined_by_council',
        'previous_permission_decline_reason',
        'is_place_owned_by_council',
        'is_any_dues_pending_of_council',
        'trade_or_business_type',
        'is_any_partnership_in_trade',
        'partner_count',
        'partner_names',
        'property_tax_no',
        'no_dues_document',
        'application_document'
    ];
}
