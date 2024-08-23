<?php

namespace App\Models\Trade;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TradeNocForMandap extends Model
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
        'event_name',
        'commissioner_name',
        'registration_no',
        'registration_year',
        'name_of_chairman',
        'president_mobile_no',
        'ownership_of_place',
        'stage_permission_date',
        'stage_permission_end_date',
        'no_of_days',
        'stage_address',
        'zone',
        'ward_area',
        'plot_no',
        'stage_height',
        'stage_length',
        'stage_Width',
        'stage_area',
        'no_of_volunteer_workers',
        'stage_contractor_address',
        'contractor_contact_no',
        'decorator_or_electrical_contractor_name',
        'decorator_or_contractor_address',
        'decorator_or_electrical_contractor_contact_no',
        'sound_or_speaker_contractor_name',
        'sound_or_speaker_address',
        'sound_or_speaker_contractor_contact_no',
        'sound_or_speaker_type',
        'concerned_police_station',
        'concerned_traffic_police_station',
        'nearest_fire_station',
        'board_registration_document',
        'no_objection_document',
        'location_map_document',
        'fire_last_year_noObjection_document',
        'traffic_last_year_noObjection_document',
        'annexure',
    ];
}
