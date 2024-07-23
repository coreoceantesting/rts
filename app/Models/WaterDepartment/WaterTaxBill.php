<?php

namespace App\Models\WaterDepartment;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WaterTaxBill extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'water_connection_no',
        'is_aapale_sarkar_payment_paid',
        'property_owner_name',
        'aadhar_no',
        'email_id',
        'mobile_no',
        'zone',
        'ward_area',
        'address',
        'city_serve_no',
        'property_no',
        'house_no',
        'plot_no',
        'landmark',
        'new_water_con',
        'current_connection_is_illegal',
        'applicant_or_tenant',
        'criminal_judicial_issue',
        'place_belongs_to_municipal',
        'comment',
        'application_document',
    ];
}
