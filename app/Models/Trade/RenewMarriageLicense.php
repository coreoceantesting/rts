<?php

namespace App\Models\Trade;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;


class RenewMarriageLicense extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'ip',
        'zone',
        'f_name',
        'm_name',
        'l_name',
        'marathi_f_name',
        'marathi_m_name',
        'marathi_l_name',
        'mobile_num',
        'aadhar_num',
        'email',
        'address',
        'marathi_address',
        'purpose',
        'marathi_purpose',
        'application_no',
        'service_id',
        'payment_date',
        'is_payment_paid',
        'is_payment_paid_aapale_sarkar',
        'aapale_sarkar_payment_date',
        'status',
        'ward_area',
        'shop_name',
        'marathi_shop_name',
        'pencard_num',
        'e_mail',
        'financial_year',
        'to_year',
        'amount',
        'trade_type',
        'rate',
        'trade',
        'manufactured',
        'business_premises',
        'owner_place',
        'address_owner_premises',
        'rental_agreement',
        'area_used',
        'noc_certificate',
        'business_start',
        'registration_no',
        'food_drug',
        'aadharcard_number',
        'director_name',
        'contact_no',
        'alternet_email',
        'gender',
        'alternet_address',
        'application_type',
        'director_image',
        'other_documents',
        'fire_certificate',
        'market_license',
        'food_drug_img',
        'shop_act',
        'pancard_image',
        'aadharcard_image',
        'tax_receipt_img',
        'interior_photo',
        'exterior_photo'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->ip = Request::ip();
        });
    }
}
