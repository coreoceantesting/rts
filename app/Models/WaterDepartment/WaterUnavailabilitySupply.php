<?php

namespace App\Models\WaterDepartment;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WaterUnavailabilitySupply extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'service_id',
        'water_connection_no',
        'aapale_sarkar_payment_date',
        'is_aapale_sarkar_payment_paid',
        'status',
        'applicant_name',
        'email_id',
        'mobile_no',
        'address',
        'police_station',
        'name_of_commercail_establishment',
        'zone',
        'ward_area',
        'address_of_com_establishment',
        'no_of_working_person',
        'per_day_water_demand',
        'other_info',
    ];
}
