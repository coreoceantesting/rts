<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;

class MobileTower extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'service_id',
        'aapale_sarkar_payment_date',
        'status',
        'application_no',
        'is_payment_paid_aapale_sarkar',
        'status_remark',
        'is_payment_paid',
        'name',
        'full_address',
        'mobile_no',
        'zone',
        'ward_area',
        'email_id',
        'aadhar_number',
        'pancard_number',
        'full_address',
        'business_name',
        'business_type',
        'business',
        'gst',
        'area',
        'date_commencement',
        'landlord_address',
        'advance_device',
        'first_aid',
        'numb_of_worker',
        'number_of_women',
        'number_of_men',
        'other',
        'other_documents',
        'aadhar_pan',
        'market_license',
        'food_drug_img',
        'shop_act',
        'fire_safety_certificate',
        'aadharcard_image',
        'tax_receipt_img',
        'interior_photo',
        'exterior_photo',
        'pest_control',
        'gst_registration',
        'drug_administration',
        'fire_rigade',
        'liquor_license',
        'ip',
        'm_name',
        'financial_year',
        'to_year',
        'amount',
        'trade_type',
        'rate',
        'trade',
        'manufactured',
        'business_premises',
        'registration_no',
        'food_drug',
        'director_name',
        'contact_no',
        'alternet_email',
        'gender',
        'alternet_address',
        'application_type',
        'owner_place',
        'rental_agreement',
        'noc_certificate',
        'director_photo',
        'business_start'
    ];
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->ip = Request::ip();
        });
    }
}
