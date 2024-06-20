<?php

namespace App\Http\Requests\Trade\NocForMandap;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'applicant_name' => 'required',
            'event_name' => 'required',
            'commissioner_name' => 'required',
            'registration_no' => 'required',
            'registration_year' => 'required',
            'name_of_chairman' => 'required',
            'president_mobile_no' => 'required|min:10|max:10',
            'ownership_of_place' => 'required',
            'stage_permission_date' => 'required',
            'stage_permission_end_date' => 'required',
            'no_of_days' => 'required',
            'stage_address' => 'required',
            'zone' => 'required',
            'ward_area' => 'required',
            'plot_no' => 'required',
            'stage_height' => 'required',
            'stage_length' => 'required',
            'stage_Width' => 'required',
            'stage_area' => 'required',
            'no_of_volunteer_workers' => 'required',
            'stage_contractor_address' => 'required',
            'contractor_contact_no' => 'required',
            'decorator_or_electrical_contractor_name' => 'required',
            'decorator_or_contractor_address' => 'required',
            'decorator_or_electrical_contractor_contact_no' => 'required|min:10|max:10',
            'sound_or_speaker_contractor_name' => 'required',
            'sound_or_speaker_address' => 'required',
            'sound_or_speaker_contractor_contact_no' => 'required|min:10|max:10',
            'sound_or_speaker_type' => 'required',
            'concerned_police_station' => 'required',
            'concerned_traffic_police_station' => 'required',
            'nearest_fire_station' => 'required',
            'board_registration_document' => 'required',
            'no_objection_document' => 'required',
            'location_map_document' => 'required',
            'fire_last_year_noObjection_document' => 'nullable',
            'traffic_last_year_noObjection_document' => 'nullable',
            'annexure' => 'nullable',
            'is_correct_info' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'is_correct_info.required' => 'Please Accept Declaration'
        ];
    }
}
