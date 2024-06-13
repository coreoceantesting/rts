<?php

namespace App\Http\Requests\PropertyTax;

use Illuminate\Foundation\Http\FormRequest;

class NoDueCertificateRequest extends FormRequest
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
            'applicant_name_eng' => 'required',
            'applicant_name_mar' => 'required',
            'applicant_full_address_eng' => 'required',
            'applicant_full_address_mar' => 'required',
            'applicant_mobile_no' => 'required',
            'email_id' => 'required',
            'aadhar_no' => 'required',
            'zone' => 'required',
            'ward_area' => 'required',
            'property_address' => 'required',
            'house_no' => 'required',
            'index_number' => 'required',
            'property_no' => 'required',
            'annual_period' => 'required',
            'uploaded_application' => 'required',
            'is_correct_info' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'applicant_name_eng.required' => '',
            'applicant_name_mar.required' => '',
            'applicant_full_address_eng.required' => '',
            'applicant_full_address_mar.required' => '',
            'applicant_mobile_no.required' => '',
            'email_id.required' => '',
            'aadhar_no.required' => '',
            'zone.required' => '',
            'ward_area.required' => '',
            'property_address.required' => '',
            'house_no.required' => '',
            'index_number.required' => '',
            'property_no.required' => '',
            'annual_period.required' => '',
            'uploaded_application.required' => '',
            'is_correct_info.required' => 'Please accept declaration'
        ];
    }
}
