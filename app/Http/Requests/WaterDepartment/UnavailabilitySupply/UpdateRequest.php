<?php

namespace App\Http\Requests\WaterDepartment\UnavailabilitySupply;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'email_id' => 'required',
            'mobile_no' => 'required|min:10|max:10',
            'address' => 'required',
            'police_station' => 'required',
            'name_of_commercail_establishment' => 'required',
            'zone' => 'required',
            'ward_area' => 'required',
            'address_of_com_establishment' => 'required',
            'no_of_working_person' => 'required',
            'per_day_water_demand' => 'required',
            'other_info' => 'required',
        ];
    }


}
