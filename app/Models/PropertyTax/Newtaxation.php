<?php

namespace App\Models\PropertyTax;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Newtaxation extends Model
{
    use HasFactory;

    protected $table = "newtaxations";

    protected $fillable = ['upic_id', 'application_no', 'user_id', 'is_aapale_sarkar_payment_paid', 'applicant_full_name', 'applicant_full_address', 'owner_name', 'applicant_mobile_no', 'email_id', 'aadhar_no', 'property_address', 'property_no', 'survey_number', 'zone', 'ward_area', 'property_usage', 'construction_type', 'is_construction_authorized', 'is_there_water_connection', 'property_area', 'uploaded_application', 'certificate_of_no_dues', 'service_id', 'aapale_sarkar_payment_date', 'status'];

    protected function serviceId(): Attribute
    {
        return Attribute::make(
            set: fn (string $value) => 5,
        );
    }
}
