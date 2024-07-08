<?php

namespace App\Models\PropertyTax;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SelfAssessment extends Model
{
    use HasFactory;

    protected $table = "self_assessments";

    protected $fillable = ['upic_id', 'user_id', 'is_aapale_sarkar_payment_paid', 'applicant_full_name', 'applicant_full_address', 'applicant_mobile_no', 'email_id', 'aadhar_no', 'property_owner_name', 'property_address', 'city_serve_number', 'property_no', 'index_number', 'house_no', 'zone', 'ward_area', 'property_usage', 'construction_type', 'is_construction_authorized', 'is_there_water_connection', 'property_area', 'uploaded_application'];
}
