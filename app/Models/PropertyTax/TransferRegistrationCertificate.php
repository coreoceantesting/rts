<?php

namespace App\Models\PropertyTax;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;

class TransferRegistrationCertificate extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'service_id',
        'aapale_sarkar_payment_date',
        'status',
        'is_aapale_sarkar_payment_paid',
        'applicant_full_name',
        'applicant_full_address',
        'applicant_mobile_no',
        'email_id',
        'aadhar_no',
        'property_owner_name',
        'property_address',
        'property_no',
        'house_no',
        'zone',
        'ward_area',
        'uploaded_application',
        'survey_number',
        'date_of_notice',
        'date_of_documentation',
        'name_of_seller',
        'name_of_buyer',
        'compensation_amount',
        'what_are_they',
        'date_of_registration_document',
        'place',
        'no_from_determined_book',
        'no_of_officer',
        'length_width_of_land',
        'border',
        'no_dues_document',
        'copy_of_document',
        'remark',
        'ip'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->ip = Request::ip();
        });
    }
}
