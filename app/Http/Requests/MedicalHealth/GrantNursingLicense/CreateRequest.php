<?php

namespace App\Http\Requests\MedicalHealth\GrantNursingLicense;

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
            'alternet_mobile' => 'required|max:10|min:10',
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
            'is_correct_info.required' => 'Please Accept Declaration',
            'f_name' => 'Please Enter First Name ',
            'm_name' => 'Please Enter Middle Name',
            'l_name' => 'Please Enter Last Name',
            'zone' => 'Please Select Zone',
            'email' => 'Please Enter Email Id',
            'address' => 'Please Enter Address',
            'noc_type' => 'Please Select Noc',
            'name_institute' => 'Please Enter Institute Name',
            'institute_address' => 'Please Enter Institute Address',
            'hospital_name' => 'Please Enter Hospital Name',
            'alternet_mobile' => 'Please Enter Mobile Number an min 10 digit or max 10 digit',
            'property_tax' => 'Please Select Property',
            'water_connection' => 'Please Select Water Connection',
            'fire_noc' => 'Please Select Fire Noc',
            'hospital_address' => 'Please Enter Hospital Address',
            'mobile_num' => 'Please Enter Mobile Number  an min 10 digit or max 10 digit',
            'aadhar_num' => 'Please Enter Aadhar Number an min 12 digit or max 12 digit',
            'property_number' => 'Please Enter Property Number',
            'alternet_email' => 'Please Enter Email Id',
            'noc_number' => 'Please Enter Noc Number',
        ];
    }
}
