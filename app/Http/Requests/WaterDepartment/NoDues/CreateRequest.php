<?php

namespace App\Http\Requests\WaterDepartment\NoDues;

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
            'water_connection_no' => 'required',
            'property_no' => 'required',
            'property_owner_name' => 'required',
            'aadhar_no' => 'required|min:12|max:12',
            'mobile_no' => 'required|min:10|max:10',
            'email_id' => 'required',
            'zone' => 'required',
            'ward_area' => 'required',
            'address' => 'required',
            'landmark' => 'required',
            'plot_no' => 'required',
            'house_no' => 'required',
            'applicant_is_on_rent' => 'required',
            'date_of_water_bill' => 'required',
            'criminal_judicial_issue' => 'required',
            'tap_size' => 'required',
            'current_existing_tap_type' => 'required',
            'place_belongs_to_municipal' => 'required',
            'current_connection_is_illegal' => 'required',
            'application_document' => 'required',
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
