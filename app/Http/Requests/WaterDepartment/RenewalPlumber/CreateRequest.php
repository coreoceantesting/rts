<?php

namespace App\Http\Requests\WaterDepartment\RenewalPlumber;

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
            'plumber_license_no' => 'required',
            'applicant_name' => 'required',
            'address' => 'required',
            'aadhar_no' => 'required|min:12|max:12',
            'mobile_no' => 'required|min:10|max:10',
            'email_id' => 'required',
            'zone' => 'required',
            'ward_area' => 'required',
            'education_institutation' => 'required',
            'education_qualification' => 'required',
            'training_institute_name' => 'required',
            'year_of_passing' => 'required',
            'have_experience' => 'required',
            'nodues_document' => 'required|file|mimes:pdf,PDF,png,PNG,jpg,JPG,jpeg,JPEG',
            'educational_certificate_document' => 'required|file|mimes:pdf,PDF,png,PNG,jpg,JPG,jpeg,JPEG',
            'application_document' => 'required|file|mimes:pdf,PDF,png,PNG,jpg,JPG,jpeg,JPEG',
            'remark' => 'required',
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
