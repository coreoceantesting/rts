<?php

namespace App\Models\MedicalHealth;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;

class RenewalNursingLicense extends Model
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
        'noc_type',
        'property_number',
        'residential_number',
        'name_institute',
        'institute_address',
        'hospital_name',
        'alternet_mobile',
        'alternet_email',
        'property_tax',
        'water_connection',
        'fire_noc',
        'noc_number',
        'hospital_address'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->ip = Request::ip();
        });
    }
}
