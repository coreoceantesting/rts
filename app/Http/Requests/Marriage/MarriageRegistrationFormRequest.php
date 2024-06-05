<?php

namespace App\Http\Requests\Marriage;

use Illuminate\Foundation\Http\FormRequest;

class MarriageRegistrationFormRequest extends FormRequest
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
            // 'registration_from_applicant_mobile_no' => 'required|string|min:10|max:10|regex:/^([0|\+[0-9]{1,5})?([7-9][0-9]{9})$/',
            // 'registration_from_applicant_full_name' => 'required',
            // 'registration_from_applicant_home_address' => 'required',
            // 'registration_from_pincode' => 'required|string|min:6|max:6|regex:/^([0|\+[0-9])$/',
            // 'registration_from_applicant_email' => 'required|email',
            // 'registration_from_aadhar_card_no' => 'required|string|min:12|max:12|regex:/^([0|\+[0-9])$/',
            // 'registration_from_alternate_mobile_number' => 'nullable',
            // 'registration_from_pan_card_no' => 'required',
            // 'registration_from_residential_ward_name' => 'required',
            // 'registration_from_marriage_solemnized_within_maharashtra_state' => 'required',
            // 'registration_from_affidavit_for_marriage_outside_maharashtra' => 'required|file|mimes:pdf,PDF|max:2048'
        ];
    }

    public function messages()
    {
        return [
            'registration_from_applicant_mobile_no.required' => 'Please enter mobile number',
            'registration_from_applicant_mobile_no.min' => 'Please enter 10 digit mobile number',
            'registration_from_applicant_mobile_no.max' => 'Please enter 10 digit mobile number',
            'registration_from_applicant_mobile_no.regex' => 'Please enter proper mobile number',
            'registration_from_applicant_full_name.required' => 'Please enter full name',
            'registration_from_applicant_home_address.required' => 'Please enter home address',
            'registration_from_pincode.required' => 'Please enter pincode',
            'registration_from_pincode.min' => 'Please enter 6 digit pincode',
            'registration_from_pincode.max' => 'Please enter 6 digit pincode',
            'registration_from_pincode.regex' => 'Please enter proper pincode',
            'registration_from_applicant_email.required' => 'Please enter email',
            'registration_from_applicant_email.email' => 'Please enter valid email',
            'registration_from_aadhar_card_no.required' => 'Please enter aadhar card no',
            'registration_from_aadhar_card_no.min' => 'Please enter 12 digit aadhar card no',
            'registration_from_aadhar_card_no.max' => 'Please enter 12 digit aadhar card no',
            'registration_from_aadhar_card_no.regex' => 'Please enter proper aadhar card no',
            'registration_from_pan_card_no.required' => 'Please enter pan card no',
            'registration_from_residential_ward_name.required' => 'Please select ward name',
            'registration_from_marriage_solemnized_within_maharashtra_state.required' => 'Please select state',
            'registration_from_affidavit_for_marriage_outside_maharashtra.required' => 'Please upload affidavit file for marriage outside maharastra',
            'registration_from_affidavit_for_marriage_outside_maharashtra.file' => 'Please upload proper file',
            'registration_from_affidavit_for_marriage_outside_maharashtra.mimes' => 'Please upload only pdf file',
            'registration_from_affidavit_for_marriage_outside_maharashtra.max' => 'File should be less than 2mb',

        ];
    }
}
