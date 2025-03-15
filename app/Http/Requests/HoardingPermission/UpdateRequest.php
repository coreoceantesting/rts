<?php

namespace App\Http\Requests\HoardingPermission;

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
            'f_name' => 'required',
            'title' => 'required',
            'm_name' => 'required',
            'l_name' => 'required',
            'email_id' => 'required',
            'mobile_no' => 'required|min:10|max:10',
            'zone' => 'required',
            'full_address' => 'required',
            // 'upload_prescribed_formats'=> 'required|file|mimes:pdf,PDF,png,PNG,jpg,JPG,jpeg,JPEG|max:2048',
            // 'aadhar_pans' => 'required|file|mimes:pdf,PDF,png,PNG,jpg,JPG,jpeg,JPEG|max:2048',
            // 'ownership' => 'required|file|mimes:pdf,PDF,png,PNG,jpg,JPG,jpeg,JPEG|max:2048',
            // 'water_bills' => 'required|file|mimes:pdf,PDF,png,PNG,jpg,JPG,jpeg,JPEG|max:2048',
            // 'society' => 'required|file|mimes:pdf,PDF,png,PNG,jpg,JPG,jpeg,JPEG|max:2048',
            // 'place' => 'required|file|mimes:pdf,PDF,png,PNG,jpg,JPG,jpeg,JPEG|max:2048',
            // 'property' => 'required|file|mimes:pdf,PDF,png,PNG,jpg,JPG,jpeg,JPEG|max:2048',
            // 'tenancy' => 'required|file|mimes:pdf,PDF,png,PNG,jpg,JPG,jpeg,JPEG|max:2048',
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
            // 'detail_property_images' => 'required|file|mimes:pdf,PDF,png,PNG,jpg,JPG,jpeg,JPEG|max:2048',
            'postal_address' => 'required',
            // 'consent_letters' => 'required|file|mimes:pdf,PDF,png,PNG,jpg,JPG,jpeg,JPEG|max:2048',
            'start_date' => 'required',
            'end_date' => 'required',
            'is_correct_info' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'is_correct_info.required' => 'Please Accept Declaration',
            'f_name' => 'Please Enter First Name',
            'title' => 'Please Enter Title',
            'm_name' => 'Please Enter Middle Name',
            'l_name' => 'Please Enter Last Name',
            'email_id' => 'Please Enter Email Id',
            'mobile_no' => 'Please Enter Mobile Number',
            'zone' => 'Please Select Zone',
            'full_address' => 'Please Select Full Address',
            // 'upload_prescribed_formats'=> 'Please Attach No Objection from Home/Building/Place owner ',
            // 'aadhar_pans' => 'Please Attach Building Permission/Completion Certificate/Standing Commitee',
            // 'ownership' => 'Please Attach Existing Property Tax Paid Receipt',
            // 'water_bills' => 'Please Attach Certificate from Structural Engineer',
            // 'society' => 'Please Attach Certificate of Structural Engineer',
            // 'place' => 'Please Attach Sightseeing Map',
            // 'property' => 'Please Attach Drawing Provided by Structural Engineer',
            // 'tenancy' => 'Please Attach 7/12 Or PR Card',
            'type_hoarding' => 'Please Select Type Hoarding',
            'advertisement_place' => 'Please Select Place of advertisement',
            'chowk' => 'Please Enter Chowk',
            'plot_no' => 'Please Enter Plot No',
            'size_hoarding' => 'Please Enter Size Hoarding',
            'bussiness_hoarding' => 'Please Enter Bussiness Hoarding',
            'format_advertisement' => 'Please Select Yes/No',
            'height' => 'Please Enter Height',
            'structure' => 'Please Select Structure',
            'open_populated' => 'Please Select Open Populated',
            'behalf' => 'Please Select application made individually or on behalf of the company',
            'detail_address'=>'Please Enter Address',
            'detail_property' => 'Please Enter Detail Property',
            // 'detail_property_images' => 'Please Attach Property Image',
            'postal_address' => 'Please Enter Postal Address',
            // 'consent_letters' => 'Please Attach Consent Letter',
            'start_date' => 'Please Enter Start Date',
            'end_date' => 'Please Enter End Date',
        ];
    }
}
