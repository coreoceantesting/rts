<?php

namespace App\Http\Requests\Marriage;

use Illuminate\Foundation\Http\FormRequest;

class GroomInformationRequest extends FormRequest
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
            // 'groom_info_fname_in_english' => 'required',
            // 'groom_info_mname_in_english' => 'required',
            // 'groom_info_lname_in_english' => 'required',
            // 'groom_info_fname_in_marathi' => 'required',
            // 'groom_info_mname_in_marathi' => 'required',
            // 'groom_info_lname_in_marathi' => 'required',
            // 'groom_info_address_in_english' => 'required',
            // 'groom_info_address_in_marathi' => 'required',
            // 'groom_info_pincode' => 'required',
            // 'groom_info_pincode_in_marathi' => 'required',
            // 'groom_info_mobile_no' => 'required',
            // 'groom_info_email' => 'required',
            // 'groom_info_aadhar_card_no' => 'required',
            // 'groom_info_dob' => 'required',
            // 'groom_info_age' => 'required',
            // 'groom_info_gender' => 'required',
            // 'groom_info_religion_by_birth' => 'required',
            // 'groom_info_religion_by_adoption' => 'required',
            // 'groom_info_photo' => 'required',
            // 'groom_info_id_proof' => 'required',
            // 'groom_info_residential_proof' => 'required',
            // 'groom_info_age_proof' => 'required',
            // 'groom_info_id_proof_file' => 'required',
            // 'groom_info_residential_proof_file' => 'required',
            // 'groom_info_age_proof_file' => 'required',
            // 'groom_info_upload_signature' => 'required',
            // 'groom_info_previous_status' => 'required',
            // 'groom_info_previous_status_proof' => 'required',
            // 'groom_info_upload_previous_status_proof' => 'required',
        ];
    }

    public function messages()
    {
        return [
            //
        ];
    }
}
