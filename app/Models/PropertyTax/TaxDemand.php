<?php

namespace App\Models\PropertyTax;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Facades\Request;

class TaxDemand extends Model
{
    use HasFactory;

    protected $table = "tax_demands";

    protected $fillable = [
        'upic_id',
        'service_id',
        'application_no',
        'user_id',
        'is_aapale_sarkar_payment_paid',
        'applicant_full_name',
        'applicant_full_address',
        'applicant_mobile_no',
        'email_id',
        'aadhar_no',
        'property_owner_name',
        'property_address',
        'property_no',
        'survey_number',
        'index_number',
        'house_no',
        'zone',
        'ward_area',
        'property_area',
        'property_usage',
        'construction_type',
        'is_construction_authorized',
        'is_there_water_connection',
        'uploaded_application',
        'aapale_sarkar_payment_date',
        'status',
        'ip'
    ];

    protected function serviceId(): Attribute
    {
        return Attribute::make(
            set: fn(string $value) => 6,
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
