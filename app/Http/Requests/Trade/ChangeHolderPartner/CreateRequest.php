<?php

namespace App\Http\Requests\Trade\ChangeHolderPartner;

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
            'mobile_num' => 'required|max:10|min:10',
            'email' => 'required',
            'aadhar_num' => 'required|max:12|min:12',
            'propert_number' => 'required',
            'resi_address' => 'required',
            'owner_name' => 'required',
            'owner_aadhar_num' => 'required',
            'existing_name' => 'required',
            'new_name' => 'required',
            'owner_status' => 'required',
            'business_type' => 'required',
            'new_business_name' => 'required',
            'reason' => 'required',
            'application_docs' => 'required|file|mimes:pdf,PDF,png,PNG,jpg,JPG,jpeg,JPEG|max:2048',
            'partner_name' => 'required',
            // 'partner_aadhar' => 'required|max:12|min:12',
            'partner_address' => 'required',
            // 'partner_mobile_num' => 'required|max:10|min:10',
            'partner_email' => 'required',
            'partner_status' => 'required',
            'is_correct_info' => 'required',
            

        ];
    }

    public function messages()
    {
        return [
            'is_correct_info.required' => 'Please Accept Declaration'
        ];
    }
}
