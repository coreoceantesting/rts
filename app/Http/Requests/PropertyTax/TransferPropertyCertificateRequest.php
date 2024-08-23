<?php

namespace App\Http\Requests\PropertyTax;

use Illuminate\Foundation\Http\FormRequest;

class TransferPropertyCertificateRequest extends FormRequest
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
        if ($this->id && $this->id != "") {
            return [
                'applicant_full_name' => 'required',
                'applicant_full_address' => 'required',
                'applicant_mobile_no' => 'required|min:10|max:10',
                'email_id' => 'required',
                'aadhar_no' => 'required|min:12|max:12',
                'property_owner_name' => 'required',
                'property_address' => 'required',
                'zone' => 'required',
                'ward_area' => 'required',
                'property_no' => 'required',
                'house_no' => 'required',
                'date_of_notice' => 'required',
                'date_of_documentation' => 'required',
                'name_of_seller' => 'required',
                'name_of_buyer' => 'required',
                'what_are_they' => 'required',
                'date_of_registration_document' => 'required',
                'place' => 'required',
                'length_width_of_land' => 'required',
                'border' => 'required',
                'uploaded_applications' => 'nullable|file|mimes:pdf,PDF,png,PNG,jpg,JPG,jpeg,JPEG|max:2048',
                'certificate_of_no_duess' => 'nullable|file|mimes:pdf,PDF,png,PNG,jpg,JPG,jpeg,JPEG|max:2048',
                'copy_of_documents' => 'nullable|file|mimes:pdf,PDF,png,PNG,jpg,JPG,jpeg,JPEG|max:2048',
                'remark' => 'required',
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
                'zone' => 'required',
                'ward_area' => 'required',
                'property_no' => 'required',
                'house_no' => 'required',
                'date_of_notice' => 'required',
                'date_of_documentation' => 'required',
                'name_of_seller' => 'required',
                'name_of_buyer' => 'required',
                'what_are_they' => 'required',
                'date_of_registration_document' => 'required',
                'place' => 'required',
                'length_width_of_land' => 'required',
                'border' => 'required',
                'uploaded_applications' => 'required|file|mimes:pdf,PDF,png,PNG,jpg,JPG,jpeg,JPEG|max:2048',
                'certificate_of_no_duess' => 'required|file|mimes:pdf,PDF,png,PNG,jpg,JPG,jpeg,JPEG|max:2048',
                'copy_of_documents' => 'required|file|mimes:pdf,PDF,png,PNG,jpg,JPG,jpeg,JPEG|max:2048',
                'remark' => 'required',
                'is_correct_info' => 'required'
            ];
        }
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
            'survey_number.required' => 'Please enter survey name',
            'zone.required' => 'Please select zone',
            'ward_area.required' => 'Please select ward',
            'property_no.required' => 'Please enter property no',
            'house_no.required' => 'Please enter house no',
            'date_of_notice.required' => 'Please select notice date',
            'date_of_documentation.required' => 'Please select documentation date',
            'name_of_seller.required' => 'Please enter seller name',
            'name_of_buyer.required' => 'Please enter buyer name',
            'compensation_amount.required' => 'Please enter compensation amount',
            'what_are_they.required' => 'Please enter what are they',
            'date_of_registration_document.required' => 'Please select registration documentation date',
            'place.required' => 'Please enter place',
            'no_from_determined_book.required' => 'Please select determine date from',
            'no_of_officer.required' => 'Please enter officer no',
            'length_width_of_land.required' => 'Please enter land with length',
            'border.required' => 'Please enter border',
            'uploaded_applications.required' => 'Please upload application file',
            'certificate_of_no_duess.required' => 'Please select dues no certificate',
            'copy_of_documents.required' => 'Please select document copy',
            'remark.required' => 'Please enter remark',
            'is_correct_info.required' => 'Please accept declaration'
        ];
    }
}
