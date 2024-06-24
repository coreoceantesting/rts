<?php

namespace App\Http\Requests\CityStructure\ZoneCertificate;

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
            'applicant_name' => 'required',
            'applicant_full_address' => 'required',
            'mobile_no' => 'required|min:10|max:10',
            'email_id' => 'required',
            'aadhar_no' => 'required|min:12|max:12',
            'zone' => 'required',
            'servey_number' => 'required',
            'prescribed_format' => 'required|file|mimes:pdf,PDF,png,PNG,jpg,JPG,jpeg,JPEG',
            'upload_city_survey_certificate' => 'required|file|mimes:pdf,PDF,png,PNG,jpg,JPG,jpeg,JPEG',
            'upload_city_servey_map' => 'required|file|mimes:pdf,PDF,png,PNG,jpg,JPG,jpeg,JPEG',
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
