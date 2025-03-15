<?php

namespace App\Models\MallaNisaranDepartment;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;

class Drainage extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'ip',
        'service_id',
        'aapale_sarkar_payment_date',
        'status',
        'application_no',
        'is_payment_paid_aapale_sarkar',
        'status_remark',
        'payment_date',
        'is_payment_paid',
        'is_aapale_sarkar_payment_paid',
        'connection_type',
        'conn_property_type',
        'application_category',
        'title',
        'f_name',
        'm_name',
        'l_name',
        'mobile_no',
        'email',
        'aadhar_no',
        'gender',
        'age',
        'address',
        'landmark',
        'permanent_address',
        'city_name',
        'pincode',
        'state',
        'csmc_prop_no',
        'cts_no',
        'Zone',
        'ward_no',
        'detail_address',
        'lacality',
        'longitude',
        'lattitude',
        'near_landmark',
        'property_city',
        'property_state',
        'property_pincode',
        'place_business',
        'sewer_diameter',
        'branch_line',
        'diameter_connection',
        'sewer_line',
        'csmc_connection',
        'name_plumber',
        'property_tax',
        'property_photo',
        'water_tax',
        'passport_size_photo',
        'aadharcard_photo'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->ip = Request::ip();
        });
    }
}
