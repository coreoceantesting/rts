<?php

namespace App\Http\Requests\Marriage;

use Illuminate\Foundation\Http\FormRequest;

class WitnessInformationRequest extends FormRequest
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
            // 'first_witness_info_fname_in_english' => 'required',
            // 'first_witness_info_fname_in_marathi' => 'required',
            // 'first_witness_info_mobile_no' => 'required',
            // 'first_witness_info_dob' => 'required',
            // 'first_witness_info_age' => 'required',
            // 'first_witness_info_gender' => 'required',
            // 'first_witness_info_relation' => 'required',
            // 'first_witness_info_address_in_english' => 'required',
            // 'first_witness_info_address_in_marathi' => 'required',
            // 'first_witness_info_id_proof' => 'required',
            // 'first_witness_info_witness_photo' => 'required',
            // 'first_witness_info_upload_signature' => 'required',
            // 'first_witness_info_upload_document' => 'required',
            // 'second_witness_info_fname_in_english' => 'required',
            // 'second_witness_info_fname_in_marathi' => 'required',
            // 'second_witness_info_mobile_no' => 'required',
            // 'second_witness_info_dob' => 'required',
            // 'second_witness_info_age' => 'required',
            // 'second_witness_info_gender' => 'required',
            // 'second_witness_info_relation' => 'required',
            // 'second_witness_info_address_in_english' => 'required',
            // 'second_witness_info_address_in_marathi' => 'required',
            // 'second_witness_info_id_proof' => 'required',
            // 'second_witness_info_witness_photo' => 'required',
            // 'second_witness_info_upload_signature' => 'required',
            // 'second_witness_info_upload_document' => 'required',
            // 'third_witness_info_fname_in_english' => 'required',
            // 'third_witness_info_fname_in_marathi' => 'required',
            // 'third_witness_info_mobile_no' => 'required',
            // 'third_witness_info_dob' => 'required',
            // 'third_witness_info_age' => 'required',
            // 'third_witness_info_gender' => 'required',
            // 'third_witness_info_relation' => 'required',
            // 'third_witness_info_address_in_english' => 'required',
            // 'third_witness_info_address_in_marathi' => 'required',
            // 'third_witness_info_id_proof' => 'required',
            // 'third_witness_info_witness_photo' => 'required',
            // 'third_witness_info_upload_signature' => 'required',
            // 'third_witness_info_upload_document' => 'required',
        ];
    }

    public function messages()
    {
        return [
            //
        ];
    }
}
