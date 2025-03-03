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
            'full_address' => 'required',
            'upload_prescribed_formats'=> 'required|file|mimes:pdf,PDF,png,PNG,jpg,JPG,jpeg,JPEG|max:2048',
            'aadhar_pans' => 'required|file|mimes:pdf,PDF,png,PNG,jpg,JPG,jpeg,JPEG|max:2048',
            'ownership' => 'required|file|mimes:pdf,PDF,png,PNG,jpg,JPG,jpeg,JPEG|max:2048',
            'water_bills' => 'required|file|mimes:pdf,PDF,png,PNG,jpg,JPG,jpeg,JPEG|max:2048',
            'society' => 'required|file|mimes:pdf,PDF,png,PNG,jpg,JPG,jpeg,JPEG|max:2048',
            'place' => 'required|file|mimes:pdf,PDF,png,PNG,jpg,JPG,jpeg,JPEG|max:2048',
            'property' => 'required|file|mimes:pdf,PDF,png,PNG,jpg,JPG,jpeg,JPEG|max:2048',
            'tenancy' => 'required|file|mimes:pdf,PDF,png,PNG,jpg,JPG,jpeg,JPEG|max:2048',
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
            'detail_property_images' => 'required|file|mimes:pdf,PDF,png,PNG,jpg,JPG,jpeg,JPEG|max:2048',
            'postal_address' => 'required',
            'consent_letters' => 'required|file|mimes:pdf,PDF,png,PNG,jpg,JPG,jpeg,JPEG|max:2048',
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
