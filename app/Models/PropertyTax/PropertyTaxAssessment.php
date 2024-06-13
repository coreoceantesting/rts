<?php

namespace App\Models\PropertyTax;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyTaxAssessment extends Model
{
    use HasFactory;

    protected $table = "property_tax_issuance_of_property_tax_assessments";

    protected $fillable = ['user_id', 'is_aapale_sarkar_payment_paid', 'applicant_name', 'applicant_full_address', 'applicant_mobile_no', 'email_id', 'aadhar_no', 'property_owner_name', 'index_number', 'property_no', 'property_address', 'assessment_for_year', 'zone', 'ward_area', 'house_no', 'property_usage', 'construction_type', 'is_construction_authorized', 'is_there_water_connection', 'property_area', 'uploaded_application', 'certificate_of_no_dues'];
}
