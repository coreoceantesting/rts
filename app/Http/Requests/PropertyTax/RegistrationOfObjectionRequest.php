<?php

namespace App\Http\Requests\PropertyTax;

use Illuminate\Foundation\Http\FormRequest;

class RegistrationOfObjectionRequest extends FormRequest
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
     * @return array<string => '',
     *  \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'applicant_full_name' => 'required',
            'applicant_full_address' => 'required',
            'applicant_mobile_no' => 'required',
            'email_id' => 'required',
            'aadhar_no' => 'required',
            'property_owner_name' => 'required',
            'property_address' => 'required',
            'zone' => 'required',
            'ward_area' => 'required',
            'city_serve_number' => 'required',
            'property_no' => 'required',
            'house_no' => 'required',
            'index_number' => 'required',
            'property_usage' => 'required',
            'construction_type' => 'required',
            'is_construction_authorized' => 'required',
            'is_there_water_connection' => 'required',
            'property_area' => 'required',
            'uploaded_application' => 'required',
            'no_dues_document' => 'required',
            'is_correct_info' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'applicant_full_name.required' => '',
            'applicant_full_address.required' => '',
            'applicant_mobile_no.required' => '',
            'email_id.required' => '',
            'aadhar_no.required' => '',
            'property_owner_name.required' => '',
            'property_address.required' => '',
            'zone.required' => '',
            'ward_area.required' => '',
            'city_serve_number.required' => '',
            'property_no.required' => '',
            'house_no.required' => '',
            'index_number.required' => '',
            'property_usage.required' => '',
            'construction_type.required' => '',
            'is_construction_authorized.required' => '',
            'is_there_water_connection.required' => '',
            'property_area.required' => '',
            'uploaded_application.required' => '',
            'no_dues_document.required' => '',
            'is_correct_info.required' => 'Please accept declaration'
        ];
    }
}
