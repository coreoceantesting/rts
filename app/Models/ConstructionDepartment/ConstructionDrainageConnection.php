<?php

namespace App\Models\ConstructionDepartment;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConstructionDrainageConnection extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'service_id',
        'status',
        'status_remark',
        'payment_date',
        'is_payment_paid',
        'upic_id',
        'application_no',
        'is_aapale_sarkar_payment_paid',
        'aapale_sarkar_payment_date',
        'applicant_name',
        'applicant_area_details',
        'applicant_full_address',
        'zone',
        'ward',
        'mobile_no',
        'aadhar_no',
        'email_id',
        'property_number',
        'property_usage',
        'connection_size_inches',
        'construction_date',
        'flat_assesment_date',
        'flat_map_date',
        'current_water_tax_amount',
        'current_tax_paid_date',
        'lichpit_count',
        'is_toilet_available',
        'total_residencial_people_count',
        'total_renter_count',
        'connection_size_feet',
        'upload_prescribed_format',
        'upload_no_dues_certificate',
        'upload_property_ownership',
    ];
}
