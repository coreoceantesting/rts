<?php

namespace App\Http\Requests\FireDepartment\NoObjection;

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
            'building_type' => 'required',
            'building_name' => 'required',
            'address' => 'required',
            'mobile_no' => 'required|min:10|max:10',
            'email_id' => 'required',
            'aadhar_no' => 'required|min:12|max:12',
            'zone' => 'required',
            'ward_area' => 'required',
            'subject' => 'required',
            'uploaded_application' => 'nullable',
            'no_dues_document' => 'nullable',
            'architect_application_document' => 'nullable',
            'fire_prevention_document' => 'nullable',
            'capitation_fee_document' => 'nullable',
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
