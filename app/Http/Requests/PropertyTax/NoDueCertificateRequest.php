<?php

namespace App\Http\Requests\PropertyTax;

use Illuminate\Foundation\Http\FormRequest;

class NoDueCertificateRequest extends FormRequest
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
                'upic_id' => 'required',
                'applicant_name_eng' => 'required',
                'applicant_name_mar' => 'required',
                'applicant_full_address_eng' => 'required',
                'applicant_full_address_mar' => 'required',
                'applicant_mobile_no' => 'required',
                'email_id' => 'required',
                'aadhar_no' => 'required',
                'zone' => 'required',
                'ward_area' => 'required',
                'property_address' => 'required',
                'house_no' => 'required',
                'property_no' => 'required',
                'annual_period' => 'required',
                'uploaded_applications' => 'nullable|file|mimes:pdf,PDF,png,PNG,jpg,JPG,jpeg,JPEG|max:2048',
                'is_correct_info' => 'required'
            ];
        } else {
            return [
                'upic_id' => 'required',
                'applicant_name_eng' => 'required',
                'applicant_name_mar' => 'required',
                'applicant_full_address_eng' => 'required',
                'applicant_full_address_mar' => 'required',
                'applicant_mobile_no' => 'required',
                'email_id' => 'required',
                'aadhar_no' => 'required',
                'zone' => 'required',
                'ward_area' => 'required',
                'property_address' => 'required',
                'house_no' => 'required',
                'property_no' => 'required',
                'annual_period' => 'required',
                'uploaded_applications' => 'required|file|mimes:pdf,PDF,png,PNG,jpg,JPG,jpeg,JPEG|max:2048',
                'is_correct_info' => 'required'
            ];
        }
    }

    public function messages()
    {
        return [
            'applicant_name_eng.required' => 'Please enter applicant name',
            'applicant_name_mar.required' => 'Please enter applicant name in marathi',
            'applicant_full_address_eng.required' => 'Please enter address in english',
            'applicant_full_address_mar.required' => 'Please enter address in marathi',
            'applicant_mobile_no.required' => 'Please enter mobile no',
            'email_id.required' => 'Please enter email',
            'aadhar_no.required' => 'Please enter aadhar no',
            'zone.required' => 'Please select zone',
            'ward_area.required' => 'Please select ward',
            'property_address.required' => 'Please enter property address',
            'house_no.required' => 'Please enter house no',
            'property_no.required' => 'Please enter property number',
            'annual_period.required' => 'Please enter annual period',
            'uploaded_applications.required' => 'Please select file',
            'uploaded_applications.mimes' => 'File should be png, jpg and pdf type',
            'uploaded_applications.max' => 'File should be less than 2mb',
            'is_correct_info.required' => 'Please accept declaration'
        ];
    }
}
