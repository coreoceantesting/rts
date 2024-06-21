<?php

namespace App\Http\Requests\FireDepartment\FinalNoObjection;

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
            'email_id' => 'required',
            'aadhar_no' => 'required|min:12|max:12',
            'zone' => 'required',
            'ward_area' => 'required',
            'building_type' => 'required',
            'house_no' => 'required',
            'building_name' => 'required',
            'city_structure' => 'required',
            'uploaded_application' => 'nullable',
            'no_dues_document' => 'nullable',
            'architect_application_document' => 'nullable',
            'erection_of_fire_document' => 'nullable',
            'licensing_agency_document' => 'nullable',
            'guarantee_of_developer_document' => 'nullable',
        ];
    }

    public function messages()
    {
        return [
            'is_correct_info.required' => 'Please Accept Declaration'
        ];
    }
}
