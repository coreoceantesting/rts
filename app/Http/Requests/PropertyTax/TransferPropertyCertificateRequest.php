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
        return [
            'applicant_full_name' => 'required',
            'applicant_full_address' => 'required',
            'applicant_mobile_no' => 'required',
            'email_id' => 'required',
            'aadhar_no' => 'required',
            'property_owner_name' => 'required',
            'property_address' => 'required',
            'survey_number' => 'required',
            'zone' => 'required',
            'ward_area' => 'required',
            'property_no' => 'required',
            'house_no' => 'required',
            'date_of_notice' => 'required',
            'date_of_documentation' => 'required',
            'name_of_seller' => 'required',
            'name_of_buyer' => 'required',
            'compensation_amount' => 'required',
            'what_are_they' => 'required',
            'date_of_registration_document' => 'required',
            'place' => 'required',
            'no_from_determined_book' => 'required',
            'no_of_officer' => 'required',
            'length_width_of_land' => 'required',
            'border' => 'required',
            'uploaded_application' => 'required',
            'certificate_of_no_dues' => 'required',
            'copy_of_document' => 'required',
            'remark' => 'required',
            'is_correct_info' => 'required'
        ];
    }

    public function messages()
    {
        return [

            'applicant_full_name.required' => '',
            'applicant_full_address.required' => '',
            'applicant_mobile_no.required' => '',
            'email_id.required' => '',
            'aadhar_no.required' => '',
            'property_owner_name.required' => '',
            'property_address.required' => '',
            'survey_number.required' => '',
            'zone.required' => '',
            'ward_area.required' => '',
            'property_no.required' => '',
            'house_no.required' => '',
            'date_of_notice.required' => '',
            'date_of_documentation.required' => '',
            'name_of_seller.required' => '',
            'name_of_buyer.required' => '',
            'compensation_amount.required' => '',
            'what_are_they.required' => '',
            'date_of_registration_document.required' => '',
            'place.required' => '',
            'no_from_determined_book.required' => '',
            'no_of_officer.required' => '',
            'length_width_of_land.required' => '',
            'border.required' => '',
            'uploaded_application.required' => '',
            'certificate_of_no_dues.required' => '',
            'copy_of_document.required' => '',
            'remark.required' => '',
            'is_correct_info.required' => 'Please accept declaration'
        ];
    }
}
