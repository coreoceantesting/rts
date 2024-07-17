<?php

namespace App\Http\Requests\Trade\ChangeLicenseType;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'applicant_full_name' => 'required',
            'address' => 'required',
            'mobile_no' => 'required|min:10|max:10',
            'aadhar_no' => 'required|min:12|max:12',
            'email_id' => 'required',
            'zone' => 'required',
            'ward_area' => 'required',
            'current_permission_no' => 'required',
            'old_treade_license_name' => 'required',
            'new_treade_license_name' => 'required',
            'remark' => 'required',
            'no_dues_documents' => 'nullable|file|mimes:pdf,PDF,png,PNG,jpg,JPG,jpeg,JPEG|max:2048',
            'application_documents' => 'nullable|file|mimes:pdf,PDF,png,PNG,jpg,JPG,jpeg,JPEG|max:2048',
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
