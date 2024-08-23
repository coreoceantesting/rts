<?php

namespace App\Http\Requests\PropertyTax;

use Illuminate\Foundation\Http\FormRequest;

class SelfAssessmentRequest extends FormRequest
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
                'applicant_mobile_no' => 'required|min:10|max:10',
                'email_id' => 'required',
                'aadhar_no' => 'required|min:12|max:12',
                'property_owner_name' => 'required',
                'property_address' => 'required',
                'city_serve_number' => 'required',
                'property_no' => 'required',
                'house_no' => 'required',
                'zone' => 'required',
                'ward_area' => 'required',
                'property_usage' => 'required',
                'construction_type' => 'required',
                'is_construction_authorized' => 'required',
                'is_there_water_connection' => 'required',
                'property_area' => 'required',
                'uploaded_applications' => 'nullable|file|mimes:pdf,PDF,png,PNG,jpg,JPG,jpeg,JPEG|max:2048',
                'is_correct_info' => 'required'
            ];
        } else {
            return [
                'applicant_full_name' => 'required',
                'applicant_full_address' => 'required',
                'applicant_mobile_no' => 'required|min:10|max:10',
                'email_id' => 'required',
                'aadhar_no' => 'required|min:12|max:12',
                'property_owner_name' => 'required',
                'property_address' => 'required',
                'city_serve_number' => 'required',
                'property_no' => 'required',
                'house_no' => 'required',
                'zone' => 'required',
                'ward_area' => 'required',
                'property_usage' => 'required',
                'construction_type' => 'required',
                'is_construction_authorized' => 'required',
                'is_there_water_connection' => 'required',
                'property_area' => 'required',
                'uploaded_applications' => 'required|file|mimes:pdf,PDF,png,PNG,jpg,JPG,jpeg,JPEG|max:2048',
                'is_correct_info' => 'required'
            ];
        }
    }

    public function messages()
    {
        return [
            'applicant_full_name.required' => 'Please enter full name',
            'applicant_full_address.required' => 'Please enter full address',
            'applicant_mobile_no.required' => 'Please enter mobile no',
            'email_id.required' => 'Please enter email',
            'aadhar_no.required' => 'Please enter aadhar no',
            'property_owner_name.required' => 'Please enter property owner name',
            'property_address.required' => 'Please enter property address',
            'city_serve_number.required' => 'Please enter city survey name',
            'property_no.required' => 'Please enter property no',
            'house_no.required' => 'Please enter house no',
            'zone.required' => 'Please enter zone',
            'ward_area.required' => 'Please select ward',
            'property_usage.required' => 'Please select property usage',
            'construction_type.required' => 'Please select construction type',
            'is_construction_authorized.required' => 'Please confirm is construction authorized',
            'is_there_water_connection.required' => 'Please confirm is there water connection',
            'property_area.required' => 'Please enter property area',
            'uploaded_applications.required' => 'Please upload application file',
            'uploaded_applications.mimes' => 'File should be png, jpg and pdf type',
            'uploaded_applications.max' => 'File should be less than 2mb',
            'is_correct_info.required' => 'Please accept declaration'
        ];
    }
}
