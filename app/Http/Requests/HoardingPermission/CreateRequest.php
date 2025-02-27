<?php

namespace App\Http\Requests\HoardingPermission;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
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
            'f_name' => 'required',
            'title' => 'required',
            'm_name' => 'required',
            'l_name' => 'required',
            'email_id' => 'required',
            'mobile_no' => 'required|min:10|max:10',
            'zone' => 'required',
            'ward_area' => 'required',
            'pancard_number' => 'required|min:10|max:10',
            'aadhar_number' => 'required|min:12|max:12',
            'full_address' => 'required',
            'business_name' => 'required',
            'business_type' => 'required',
            'business' => 'required',
            'gst' => 'required',
            'area' => 'required',
            'date_commencement' => 'required',
            'address_est' => 'required',
            'advance_device' => 'required',
            'first_aid' => 'required|file',
            'numb_of_worker' => 'required',
            'number_of_women' => 'required',
            'number_of_men' => 'required',
            'other' => 'required',
            'building_permission' => 'required|file|mimes:pdf,PDF,png,PNG,jpg,JPG,jpeg,JPEG|max:2048',
            'paid_receipt' => 'required|file|mimes:pdf,PDF,png,PNG,jpg,JPG,jpeg,JPEG|max:2048',
            'structural_engineer' => 'required|file|mimes:pdf,PDF,png,PNG,jpg,JPG,jpeg,JPEG|max:2048',
            'certificate_of_structural' => 'required|file|mimes:pdf,PDF,png,PNG,jpg,JPG,jpeg,JPEG|max:2048',
            'no_objection_certificate' => 'required|file|mimes:pdf,PDF,png,PNG,jpg,JPG,jpeg,JPEG|max:2048',
            'sightseeing' => 'required|file|mimes:pdf,PDF,png,PNG,jpg,JPG,jpeg,JPEG|max:2048',
            'drawing_provided' => 'required|file|mimes:pdf,PDF,png,PNG,jpg,JPG,jpeg,JPEG|max:2048',
            'pr_card' => 'required|file|mimes:pdf,PDF,png,PNG,jpg,JPG,jpeg,JPEG|max:2048',
            'site_occupancy' => 'required|file|mimes:pdf,PDF,png,PNG,jpg,JPG,jpeg,JPEG|max:2048',
            'medical_certificate' => 'required|file|mimes:pdf,PDF,png,PNG,jpg,JPG,jpeg,JPEG|max:2048',
            'pest_control' => 'required|file|mimes:pdf,PDF,png,PNG,jpg,JPG,jpeg,JPEG|max:2048',
            'gst_registration' => 'required|file|mimes:pdf,PDF,png,PNG,jpg,JPG,jpeg,JPEG|max:2048',
            'drug_administration' => 'required|file|mimes:pdf,PDF,png,PNG,jpg,JPG,jpeg,JPEG|max:2048',
            'fire_rigade' => 'required|file|mimes:pdf,PDF,png,PNG,jpg,JPG,jpeg,JPEG|max:2048',
            'liquor_license' => 'required|file|mimes:pdf,PDF,png,PNG,jpg,JPG,jpeg,JPEG|max:2048',
            'type_hoarding' => 'required',
            'advertisement_place' => 'required',
            'chowk' => 'required',
            'plot_no' => 'required',
            'size_hoarding' => 'required',
            'bussiness_hoarding' => 'required',
            'format_advertisement' => 'required',
            'height' => 'required',
            'structure' => 'required',
            'open_populated' => 'required',
            'behalf' => 'required',
            'detail_address'=>'required',
            'detail_property' => 'required',
            'detail_property_image' => 'required',
            'postal_address' => 'required',
            'consent_letter' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
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
