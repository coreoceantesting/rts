<?php

namespace App\Http\Requests\ConstructionDepartment\DrainageConnection;

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
            'applicant_name' => 'required',
            'applicant_area_details' => 'required',
            'applicant_full_address' => 'required',
            'zone' => 'required',
            'ward' => 'required',
            'mobile_no' => 'required|min:10|max:10',
            'aadhar_no' => 'required|min:12|max:12',
            'email_id' => 'required',
            'property_number' => 'required',
            'property_usage' => 'required',
            'connection_size_inches' => 'required',
            'construction_date' => 'required',
            'flat_assesment_date' => 'required',
            'flat_map_date' => 'required',
            'current_water_tax_amount' => 'required',
            'current_tax_paid_date' => 'required',
            'lichpit_count' => 'required',
            'is_toilet_available' => 'required',
            'total_residencial_people_count' => 'required',
            'total_renter_count' => 'required',
            'connection_size_feet' => 'required',
            'upload_prescribed_formats' => 'nullable|file|mimes:pdf,PDF,png,PNG,jpg,JPG,jpeg,JPEG|max:2048',
            'upload_no_dues_certificates' => 'nullable|file|mimes:pdf,PDF,png,PNG,jpg,JPG,jpeg,JPEG|max:2048',
            'upload_property_ownerships' => 'nullable|file|mimes:pdf,PDF,png,PNG,jpg,JPG,jpeg,JPEG|max:2048',
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
