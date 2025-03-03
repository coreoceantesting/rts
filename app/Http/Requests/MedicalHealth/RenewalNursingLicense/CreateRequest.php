<?php

namespace App\Http\Requests\MedicalHealth\RenewalNursingLicense;

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
            'f_name' => 'required',
            'm_name' => 'required',
            'l_name' => 'required',
            'zone' => 'required',
            'email' => 'required',
            'address' => 'required',
            'noc_type' => 'required',
            'name_institute' => 'required',
            'institute_address' => 'required',
            'hospital_name' => 'required',
            'alternet_mobile' => 'required',
            'property_tax' => 'required',
            'water_connection' => 'required',
            'fire_noc' => 'required',
            'hospital_address' => 'required',
            'mobile_num' => 'required|max:10|min:10',
            'aadhar_num' => 'required|max:12|min:12',
            'property_number' => 'required',
            'alternet_email' => 'required',
            'noc_number' => 'required',
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
