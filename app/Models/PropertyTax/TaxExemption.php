<?php

namespace App\Models\PropertyTax;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaxExemption extends Model
{
    use HasFactory;

    protected $table = "tax_exemptions";

    protected $fillable = ['user_id', 'is_aapale_sarkar_payment_paid', 'applicant_full_name', 'applicant_full_address', 'applicant_mobile_no', 'email_id', 'aadhar_no', 'property_owner_name', 'property_address', 'zone', 'ward_area', 'survey_number', 'index_number', 'house_no', 'property_no', 'property_area', 'property_usage', 'construction_type', 'is_construction_authorized', 'is_there_water_connection', 'date_of_commencement', 'no_dues_document', 'uploaded_application'];
}
