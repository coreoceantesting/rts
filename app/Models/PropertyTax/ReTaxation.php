<?php

namespace App\Models\PropertyTax;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Facades\Request;

class ReTaxation extends Model
{
    use HasFactory;

    protected $table = "re_taxations";

    protected $fillable = [
        'upic_id',
        'application_no',
        'user_id',
        'is_aapale_sarkar_payment_paid',
        'applicant_name',
        'applicant_full_address',
        'applicant_mobile_no',
        'email_id',
        'aadhar_no',
        'zone',
        'ward_area',
        'property_owner_name',
        'property_address',
        'property_no',
        'index_number',
        'house_no',
        'property_usage',
        'construction_type',
        'is_construction_authorized',
        'is_there_water_connection',
        'property_area',
        'date_of_commencement',
        'reason_for_reassessment',
        'uploaded_application',
        'service_id',
        'aapale_sarkar_payment_date',
        'status',
        'ip'
    ];

    protected function dateOfCommencement(): Attribute
    {
        return Attribute::make(
            set: fn(string $value) => date('Y-m-d', strtotime($value)),
        );
    }

    protected function serviceId(): Attribute
    {
        return Attribute::make(
            set: fn(string $value) => 8,
        );
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->ip = Request::ip();
        });
    }
}
