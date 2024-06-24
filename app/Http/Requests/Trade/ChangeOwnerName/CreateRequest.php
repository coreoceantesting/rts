<?php

namespace App\Http\Requests\Trade\ChangeOwnerName;

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
            'current_permission_no' => 'required',
            'applicant_full_name' => 'required',
            'old_owner_name' => 'required',
            'new_owner_name' => 'required',
            'old_partner_name' => 'required',
            'new_partner_name' => 'required',
            'address' => 'required',
            'mobile_no' => 'required|min:10|max:10',
            'email_id' => 'required',
            'zone' => 'required',
            'ward_area' => 'required',
            'remark' => 'required',
            'no_dues_document' => 'required|file|mimes:pdf,PDF,png,PNG,jpg,JPG,jpeg,JPEG',
            'application_document' => 'required|file|mimes:pdf,PDF,png,PNG,jpg,JPG,jpeg,JPEG',
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
