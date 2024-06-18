<?php

namespace App\Models\WaterDepartment;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WaterPressureComplaint extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'is_aapale_sarkar_payment_paid',
        'property_owner_name',
        'aadhar_no',
        'mobile_no',
        'email_id',
        'zone',
        'ward_area',
        'plot_no',
        'house_no',
        'landmark',
        'address',
        'current_connection_is_illegal',
        'applicant_is_on_rent',
        'criminal_judicial_issue',
        'tap_size',
        'current_existing_tap_type',
        'place_belongs_to_municipal',
        'comment',
        'application_document',
    ];
}
