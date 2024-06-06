<?php

namespace App\Http\Requests\Marriage;

use Illuminate\Foundation\Http\FormRequest;

class PriestInformationRequest extends FormRequest
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
            'marriage_reg_form_id' => 'required',
            'priest_info_fname_in_english' => 'required',
            'priest_info_mname_in_english' => 'required',
            'priest_info_lname_in_english' => 'required',
            'priest_info_fname_in_marathi' => 'required',
            'priest_info_mname_in_marathi' => 'required',
            'priest_info_lname_in_marathi' => 'required',
            'priest_info_address_in_english' => 'required',
            'priest_info_address_in_marathi' => 'required',
            'priest_info_mobile_no' => 'required|string|min:10|max:10|regex:/^[0-9]{10}$/',
            'priest_info_age' => 'required',
            'priest_info_religion' => 'required',
            'priest_info_upload_signature' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'priest_info_fname_in_english.required' => 'Please enter full name',
            'priest_info_mname_in_english.required' => 'Please enter middle name',
            'priest_info_lname_in_english.required' => 'Please enter last name',
            'priest_info_fname_in_marathi.required' => 'Please enter full name',
            'priest_info_mname_in_marathi.required' => 'Please enter middle name',
            'priest_info_lname_in_marathi.required' => 'Please enter last name',
            'priest_info_address_in_english.required' => 'Please enter address',
            'priest_info_address_in_marathi.required' => 'Please enter address',
            'priest_info_mobile_no.required' => 'Please enter mobile no',
            'priest_info_mobile_no.min' => 'Please enter 10 digit mobile no',
            'priest_info_mobile_no.max' => 'Please enter 10 digit mobile no',
            'priest_info_mobile_no.regex' => 'Please enter valid mobile number',
            'priest_info_age.required' => 'Please enter age',
            'priest_info_religion.required' => 'Please select religion',
            'priest_info_upload_signature.required' => 'Please upload signature'
        ];
    }
}
