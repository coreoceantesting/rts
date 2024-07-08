<?php

namespace App\Models\PropertyTax;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaxDemand extends Model
{
    use HasFactory;

    protected $table = "tax_demands";

    protected $fillable = ['upic_id', 'user_id', 'is_aapale_sarkar_payment_paid', 'applicant_full_name', 'applicant_full_address', 'applicant_mobile_no', 'email_id', 'aadhar_no', 'property_owner_name', 'property_address', 'property_no', 'survey_number', 'index_number', 'house_no', 'zone', 'ward_area', 'property_area', 'property_usage', 'construction_type', 'is_construction_authorized', 'is_there_water_connection', 'uploaded_application'];
}
