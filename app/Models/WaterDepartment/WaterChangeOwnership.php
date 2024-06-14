<?php

namespace App\Models\WaterDepartment;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WaterChangeOwnership extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'is_aapale_sarkar_payment_paid',
        'new_owner_name',
        'address',
        'aadhar_no',
        'mobile_no',
        'email_id',
        'property_no',
        'zone',
        'ward_area',
        'new_tap_connection',
        'house_no',
        'landmark',
        'current_connection_is_authorized',
        'no_of_user',
        'applicant_or_tenant',
        'old_owner_name',
        'criminal_judicial_issue',
        'tap_size',
        'existing_connection_detail',
        'place_belongs_to_municipal',
        'comment',
        'application_document',
        'ownership_document',
        'nodues_document'
    ];
}
