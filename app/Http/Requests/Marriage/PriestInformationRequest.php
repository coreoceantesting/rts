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
            // 'marriage_reg_form_id' => 'required',
            // 'priest_info_fname_in_english' => 'required',
            // 'priest_info_mname_in_english' => 'required',
            // 'priest_info_lname_in_english' => 'required',
            // 'priest_info_fname_in_marathi' => 'required',
            // 'priest_info_mname_in_marathi' => 'required',
            // 'priest_info_lname_in_marathi' => 'required',
            // 'priest_info_address_in_english' => 'required',
            // 'priest_info_address_in_marathi' => 'required',
            // 'priest_info_mobile_no' => 'required',
            // 'priest_info_age' => 'required',
            // 'priest_info_religion' => 'required',
            // 'priest_info_upload_signature' => 'required',
        ];
    }

    public function messages()
    {
        return [
            //
        ];
    }
}
