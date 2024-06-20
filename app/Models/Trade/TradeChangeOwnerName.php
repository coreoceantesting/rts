<?php

namespace App\Models\Trade;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TradeChangeOwnerName extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'is_aapale_sarkar_payment_paid',
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
        'no_dues_document',
        'application_document'
    ];
}
