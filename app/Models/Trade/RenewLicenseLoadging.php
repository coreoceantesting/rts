<?php

namespace App\Models\Trade;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;

class RenewLicenseLoadging extends Model
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
        'status'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->ip = Request::ip();
        });
    }
}
