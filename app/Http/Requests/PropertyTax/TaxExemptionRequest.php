<?php

namespace App\Http\Requests\PropertyTax;

use Illuminate\Foundation\Http\FormRequest;

class TaxExemptionRequest extends FormRequest
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
            'applicant_full_address' => 'required',
            'applicant_mobile_no' => 'required',
            'email_id' => 'required',
            'aadhar_no' => 'required',
            'property_owner_name' => 'required',
            'property_address' => 'required',
            'zone' => 'required',
            'ward_area' => 'required',
            'survey_number' => 'required',
            'house_no' => 'required',
            'property_no' => 'required',
            'property_area' => 'required',
            'property_usage' => 'required',
            'construction_type' => 'required',
            'is_construction_authorized' => 'required',
            'is_there_water_connection' => 'required',
            'date_of_commencement' => 'required',
            'no_dues_documents' => 'required|file|mimes:pdf,PDF,png,PNG,jpg,JPG,jpeg,JPEG|max:2048',
            'uploaded_applications' => 'required|file|mimes:pdf,PDF,png,PNG,jpg,JPG,jpeg,JPEG|max:2048',
            'is_correct_info' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'applicant_full_name.required' => 'Please enter applicant full name',
            'applicant_full_address.required' => 'Please enter applicant full address',
            'applicant_mobile_no.required' => 'Please enter applicant mobile no',
            'email_id.required' => 'Please enter email',
            'aadhar_no.required' => 'Please enter aadhar no',
            'property_owner_name.required' => 'Please enter property owner name',
            'property_address.required' => 'Please enter property address',
            'zone.required' => 'Please select zone',
            'ward_area.required' => 'Please select ward',
            'survey_number.required' => 'Please enter survey number',
            'house_no.required' => 'Please enter house no',
            'property_no.required' => 'Please enter property no',
            'property_area.required' => 'Please enter property area',
            'property_usage.required' => 'Please select property usage',
            'construction_type.required' => 'Please select construction type',
            'is_construction_authorized.required' => 'Please confirm is construction authorized',
            'is_there_water_connection.required' => 'Please confirm is there water connection',
            'date_of_commencement.required' => 'Please select commencement date',
            'no_dues_documents.required' => 'Please select no due documents',
            'no_dues_documents.mimes' => 'File should be png, jpg and pdf type',
            'no_dues_documents.max' => 'File should be less than 2mb',
            'uploaded_applications.required' => 'Please upload application file',
            'uploaded_applications.mimes' => 'File should be png, jpg and pdf type',
            'uploaded_applications.max' => 'File should be less than 2mb',
            'is_correct_info.required' => 'Please accept declaration'
        ];
    }
}
