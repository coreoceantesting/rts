<?php

namespace App\Models\WaterDepartment;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WaterDisconnectSupply extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'is_aapale_sarkar_payment_paid',
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
        'criminal_judicial_issue',
        'tap_size',
        'existing_connection_detail',
        'place_belongs_to_municipal',
        'comment',
        'application_document',
        'nodues_document'
    ];
}
