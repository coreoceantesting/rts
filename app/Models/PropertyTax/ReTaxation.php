<?php

namespace App\Models\PropertyTax;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReTaxation extends Model
{
    use HasFactory;

    protected $table = "re_taxations";

    protected $fillable = ['user_id', 'is_aapale_sarkar_payment_paid', 'applicant_name', 'applicant_full_address', 'applicant_mobile_no', 'email_id', 'aadhar_no', 'zone', 'ward_area', 'property_owner_name', 'property_address', 'property_no', 'index_number', 'house_no', 'property_usage', 'construction_type', 'is_construction_authorized', 'is_there_water_connection', 'property_area', 'date_of_commencement', 'reason_for_reassessment', 'uploaded_application'];
}
