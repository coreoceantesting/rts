<?php

namespace App\Models\WaterDepartment;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Waternewconnection extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'is_aapale_sarkar_payment_paid',
        'applicant_full_name',
        'aadhar_no',
        'mobile_no',
        'email_id',
        'zone',
        'ward_area',
        'city_servey_no',
        'address',
        'landmark',
        'property_no',
        'total_person',
        'distance',
        'water_connection_use',
        'pipe_size',
        'no_of_tap',
        'current_no_of_tap',
        'total_tenants',
        'written_application_document',
        'ownership_document',
        'no_dues_document'
    ];
}
