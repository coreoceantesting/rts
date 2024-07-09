<?php

namespace App\Http\Requests\PropertyTax;

use Illuminate\Foundation\Http\FormRequest;

class NewTaxationRequest extends FormRequest
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
     * @return array<string => 'required',
     *  \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'upic_id' => 'required',
            'applicant_full_name' => 'required',
            'applicant_full_address' => 'required',
            'owner_name' => 'required',
            'applicant_mobile_no' => 'required',
            'email_id' => 'required',
            'aadhar_no' => 'required',
            'property_address' => 'required',
            'property_no' => 'required',
            'survey_number' => 'required',
            'zone' => 'required',
            'ward_area' => 'required',
            'property_usage' => 'required',
            'construction_type' => 'required',
            'is_construction_authorized' => 'required',
            'is_there_water_connection' => 'required',
            'property_area' => 'required',
            'uploaded_applications' => 'required|file|mimes:pdf,PDF,png,PNG,jpg,JPG,jpeg,JPEG|max:2048',
            'certificate_of_no_duess' => 'required|file|mimes:pdf,PDF,png,PNG,jpg,JPG,jpeg,JPEG|max:2048',
            'is_correct_info' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'applicant_full_name.required' => 'Please enter full name',
            'applicant_full_address.required' => 'Please enter full address',
            'owner_name.required' => 'Please enter owner name',
            'applicant_mobile_no.required' => 'Please enter mobile no',
            'email_id.required' => 'Please enter email',
            'aadhar_no.required' => 'Please enter aadhar no',
            'property_address.required' => 'Please enter property address',
            'property_no.required' => 'Please enter property no',
            'survey_number.required' => 'Please enter survey number',
            'zone.required' => 'Please select zone',
            'ward_area.required' => 'Please select ward',
            'property_usage.required' => 'Please select property usage',
            'construction_type.required' => 'Please select contruction type',
            'is_construction_authorized.required' => 'Please select is construction authorized',
            'is_there_water_connection.required' => 'Please select is there water connection',
            'property_area.required' => 'Please enter property area',
            'uploaded_applications.required' => 'Please select upload application file',
            'uploaded_applications.mimes' => 'File should be png, jpg and pdf type',
            'uploaded_applications.max' => 'File should be less than 2mb',
            'certificate_of_no_duess.required' => 'Please select no due certificate file',
            'certificate_of_no_duess.mimes' => 'File should be png, jpg and pdf type',
            'certificate_of_no_duess.max' => 'File should be less than 2mb',
            'is_correct_info.required' => 'Please accept declaration'
        ];
    }
}
