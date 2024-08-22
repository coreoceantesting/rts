<?php

namespace App\Models\WaterDepartment;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WaterChangeConnectionSize extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'service_id',
        'water_connection_no',
        'aapale_sarkar_payment_date',
        'is_aapale_sarkar_payment_paid',
        'status',
        'new_owner_name',
        'aadhar_no',
        'mobile_no',
        'email_id',
        'zone',
        'ward_area',
        'plot_no',
        'house_no',
        'landmark',
        'address',
        'current_connection_is_authorized',
        'applicant_or_tenant',
        'no_of_user',
        'criminal_judicial_issue',
        'existing_connection_detail',
        'old_tap_size',
        'new_tap_size',
        'new_tap_connection',
        'place_belongs_to_municipal',
        'comment',
        'application_document',
        'nodues_document'
    ];
}
