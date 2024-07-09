<?php

namespace App\Models\PropertyTax;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NoDueCertificate extends Model
{
    use HasFactory;

    protected $table = "no_due_certificates";

    protected $fillable = ['upic_id', 'application_no', 'user_id', 'is_aapale_sarkar_payment_paid', 'applicant_name_eng', 'applicant_name_mar', 'applicant_full_address_eng', 'applicant_full_address_mar', 'applicant_mobile_no', 'email_id', 'aadhar_no', 'zone', 'ward_area', 'property_address', 'house_no', 'index_number', 'property_no', 'annual_period', 'uploaded_application'];
}
