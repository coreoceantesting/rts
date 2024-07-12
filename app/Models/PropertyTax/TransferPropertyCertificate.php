<?php

namespace App\Models\PropertyTax;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class TransferPropertyCertificate extends Model
{
    use HasFactory;

    protected $table = "transfer_property_certificates";

    protected $fillable = ['upic_id', 'service_id', 'application_no', 'user_id', 'is_aapale_sarkar_payment_paid', 'applicant_full_name', 'applicant_full_address', 'applicant_mobile_no', 'email_id', 'aadhar_no', 'property_owner_name', 'property_address', 'survey_number', 'zone', 'ward_area', 'property_no', 'house_no', 'date_of_notice', 'date_of_documentation', 'name_of_seller', 'name_of_buyer', 'compensation_amount', 'what_are_they', 'date_of_registration_document', 'place', 'no_from_determined_book', 'no_of_officer', 'length_width_of_land', 'border', 'uploaded_application', 'certificate_of_no_dues', 'copy_of_document', 'remark', 'aapale_sarkar_payment_date', 'status'];

    protected function dateOfNotice(): Attribute
    {
        return Attribute::make(
            set: fn (string $value) => date('Y-m-d', strtotime($value)),
        );
    }

    protected function dateOfDocumentation(): Attribute
    {
        return Attribute::make(
            set: fn (string $value) => date('Y-m-d', strtotime($value)),
        );
    }

    protected function dateOfRegistrationDocument(): Attribute
    {
        return Attribute::make(
            set: fn (string $value) => date('Y-m-d', strtotime($value)),
        );
    }

    protected function serviceId(): Attribute
    {
        return Attribute::make(
            set: fn (string $value) => 4,
        );
    }
}
