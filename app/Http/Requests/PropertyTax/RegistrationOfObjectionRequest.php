<?php

namespace App\Http\Requests\PropertyTax;

use Illuminate\Foundation\Http\FormRequest;

class RegistrationOfObjectionRequest extends FormRequest
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
     * @return array<string => '',
     *  \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        if ($this->id && $this->id != "") {
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
                'city_serve_number' => 'required',
                'property_no' => 'required',
                'house_no' => 'required',
                'property_usage' => 'required',
                'construction_type' => 'required',
                'is_construction_authorized' => 'required',
                'is_there_water_connection' => 'required',
                'property_area' => 'required',
                'uploaded_applications' => 'nullable|file|mimes:pdf,PDF,png,PNG,jpg,JPG,jpeg,JPEG|max:2048',
                'no_dues_documents' => 'nullable|file|mimes:pdf,PDF,png,PNG,jpg,JPG,jpeg,JPEG|max:2048',
                'is_correct_info' => 'required'
            ];
        } else {
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
                'city_serve_number' => 'required',
                'property_no' => 'required',
                'house_no' => 'required',
                'property_usage' => 'required',
                'construction_type' => 'required',
                'is_construction_authorized' => 'required',
                'is_there_water_connection' => 'required',
                'property_area' => 'required',
                'uploaded_applications' => 'required|file|mimes:pdf,PDF,png,PNG,jpg,JPG,jpeg,JPEG|max:2048',
                'no_dues_documents' => 'required|file|mimes:pdf,PDF,png,PNG,jpg,JPG,jpeg,JPEG|max:2048',
                'is_correct_info' => 'required'
            ];
        }
    }

    public function messages()
    {
        return [
            'applicant_full_name.required' => 'Please enter applicant full name',
            'applicant_full_address.required' => 'Please enter applicant full address',
            'applicant_mobile_no.required' => 'Please enter mobile no',
            'email_id.required' => 'Please eneter email',
            'aadhar_no.required' => 'Please enter email',
            'property_owner_name.required' => 'Please enter property owner name',
            'property_address.required' => 'Please enter property address',
            'zone.required' => 'Please select zone',
            'ward_area.required' => 'Please select ward',
            'city_serve_number.required' => 'Please enter city survey numbert',
            'property_no.required' => 'Please enter property number',
            'house_no.required' => 'Please enter house no',
            'property_usage.required' => 'Please select property',
            'construction_type.required' => 'Please select contruction type',
            'is_construction_authorized.required' => 'Please confirm is contruction authorized',
            'is_there_water_connection.required' => 'Please confirm is there water connection',
            'property_area.required' => 'Please enter property area',
            'uploaded_applications.required' => 'Please select upload applicant file',
            'uploaded_applications.mimes' => 'File should be png, jpg and pdf type',
            'uploaded_applications.max' => 'File should be less than 2mb',
            'no_dues_documents.required' => 'Please select no due document file',
            'no_dues_documents.mimes' => 'File should be png, jpg and pdf type',
            'no_dues_documents.max' => 'File should be less than 2mb',
            'is_correct_info.required' => 'Please accept declaration'
        ];
    }
}
