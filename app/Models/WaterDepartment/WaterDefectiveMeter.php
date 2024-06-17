<?php

namespace App\Models\WaterDepartment;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WaterDefectiveMeter extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'is_aapale_sarkar_payment_paid',
        'owner_name',
        'aadhar_no',
        'mobile_no',
        'email_id',
        'zone',
        'ward_area',
        'plot_no',
        'house_no',
        'landmark',
        'address',
        'place_belongs_to_municipal',
        'current_connection_is_illegal',
        'applicant_or_tenant',
        'criminal_judicial_issue',
        'current_tap_detail',
        'property_no',
        'meter_reading',
        'size',
        'comment',
        'application_document',
    ];
}
