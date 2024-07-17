<?php

namespace App\Http\Requests\WaterDepartment\NewWaterConnection;

use Illuminate\Foundation\Http\FormRequest;

class CreateNewConnectionRequest extends FormRequest
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
            'aadhar_no' => 'required|min:12|max:12',
            'mobile_no' => 'required|min:10|max:10',
            'email_id' => 'required',
            'zone' => 'required',
            'ward_area' => 'required',
            'city_servey_no' => 'required',
            'address' => 'required',
            'landmark' => 'required',
            'property_no' => 'required',
            'total_person' => 'required',
            'distance' => 'required',
            'water_connection_use' => 'required',
            'pipe_size' => 'required',
            'no_of_tap' => 'required',
            'current_no_of_tap' => 'required',
            'total_tenants' => 'required',
            'written_application_documents' => 'required|file|mimes:pdf,PDF,png,PNG,jpg,JPG,jpeg,JPEG|max:2048',
            'ownership_documents' => 'required|file|mimes:pdf,PDF,png,PNG,jpg,JPG,jpeg,JPEG|max:2048',
            'no_dues_documents' => 'required|file|mimes:pdf,PDF,png,PNG,jpg,JPG,jpeg,JPEG|max:2048',
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
