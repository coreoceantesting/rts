<?php

namespace App\Http\Requests\PropertyTax;

use Illuminate\Foundation\Http\FormRequest;

class PropertyTaxAssessmentRequest extends FormRequest
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
        return [
            'applicant_name' => 'required',
            'applicant_full_address' => 'required',
            'applicant_mobile_no' => 'required',
            'email_id' => 'required',
            'aadhar_no' => 'required',
            'property_owner_name' => 'required',
            'property_no' => 'required',
            'property_address' => 'required',
            'assessment_for_year' => 'required',
            'zone' => 'required',
            'ward_area' => 'required',
            'house_no' => 'required',
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
            'applicant_name.required' => 'Please enter applicant name',
            'applicant_full_address.required' => 'Please enter applicant full address',
            'applicant_mobile_no.required' => 'Please enter applicant mobile no',
            'email_id.required' => 'Please enter email',
            'aadhar_no.required' => 'Please enter aadhar no',
            'property_owner_name.required' => 'Please enter property owner name',
            'property_no.required' => 'Please enter property no',
            'property_address.required' => 'Please enter property address',
            'assessment_for_year.required' => 'Please enter assessment year',
            'zone.required' => 'Please select zone',
            'ward_area.required' => 'Please select ward',
            'house_no.required' => 'Please select house no',
            'property_usage.required' => 'Please select property usage',
            'construction_type.required' => 'Please select contruction type',
            'is_construction_authorized.required' => 'Please select construction is authorize',
            'is_there_water_connection.required' => 'Please select is water connection',
            'property_area.required' => 'Please enter property area',
            'uploaded_applications.required' => 'Please upload application prescribed format',
            'uploaded_applications.mimes' => 'File should be png, jpg and pdf type',
            'uploaded_applications.max' => 'File should be less than 2mb',
            'certificate_of_no_duess.required' => 'Please upload no of dues certificate',
            'certificate_of_no_duess.mimes' => 'File should be png, jpg and pdf type',
            'certificate_of_no_duess.max' => 'File should be less than 2mb',
            'is_correct_info.required' => 'Please accept declaration'
        ];
    }
}
