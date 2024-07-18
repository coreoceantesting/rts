<?php

namespace App\Http\Requests\ConstructionDepartment\RoadCutting;

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
            'applicant_type' => 'required',
            'applicant_name' => 'required',
            'applicant_full_address' => 'required',
            'zone' => 'required',
            'ward' => 'required',
            'company_name' => 'required',
            'designation' => 'required',
            'mobile_no' => 'required|min:10|max:10',
            'email_id' => 'required',
            'aadhar_no' => 'required|min:12|max:12',
            'road_cutting_purpose' => 'required',
            'road_length' => 'required',
            'no_of_location' => 'required',
            'road_cutting_address' => 'required',
            'location_size' => 'required',
            'upload_prescribed_formats' => 'required|file|mimes:pdf,PDF,png,PNG,jpg,JPG,jpeg,JPEG|max:2048',
            'upload_no_dues_certificates' => 'required|file|mimes:pdf,PDF,png,PNG,jpg,JPG,jpeg,JPEG|max:2048',
            'upload_gov_instructed_docs' => 'required|file|mimes:pdf,PDF,png,PNG,jpg,JPG,jpeg,JPEG|max:2048',
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
