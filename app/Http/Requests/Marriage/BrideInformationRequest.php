<?php

namespace App\Http\Requests\Marriage;

use Illuminate\Foundation\Http\FormRequest;

class BrideInformationRequest extends FormRequest
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
            // 'marriage_reg_form_id' => 'required',
            // 'bride_info_fname_in_english' => 'required',
            // 'bride_info_mname_in_english' => 'required',
            // 'bride_info_lname_in_english' => 'required',
            // 'bride_info_fname_in_marathi' => 'required',
            // 'bride_info_mname_in_marathi' => 'required',
            // 'bride_info_lname_in_marathi' => 'required',
            // 'bride_info_address_in_english' => 'required',
            // 'bride_info_address_in_marathi' => 'required',
            // 'bride_info_pincode' => 'required',
            // 'bride_info_pincode_in_marathi' => 'required',
            // 'bride_info_mobile_no' => 'required',
            // 'bride_info_email' => 'required',
            // 'bride_info_aadhar_card_no' => 'required',
            // 'bride_info_dob' => 'required',
            // 'bride_info_age' => 'required',
            // 'bride_info_gender' => 'required',
            // 'bride_info_religion_by_birth' => 'required',
            // 'bride_info_religion_by_adoption' => 'required',
            // 'bride_info_photo' => 'required',
            // 'bride_info_id_proof' => 'required',
            // 'bride_info_residential_proof' => 'required',
            // 'bride_info_age_proof' => 'required',
            // 'bride_info_id_proof_file' => 'required',
            // 'bride_info_residential_proof_file' => 'required',
            // 'bride_info_age_proof_file' => 'required',
            // 'bride_info_upload_signature' => 'required',
            // 'bride_info_previous_status' => 'required',
            // 'bride_info_previous_status_proof' => 'required',
            // 'bride_info_upload_previous_status_proof' => 'required',
        ];
    }

    public function messages()
    {
        return [
            //
        ];
    }
}
