<?php

namespace App\Http\Requests\MobileTower;

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
            'name' => 'required',
            'm_name' => 'required',
            'pancard_number' => 'required|min:10|max:10',
            'mobile_no' => 'required|min:10|max:10',
            'email_id' => 'required',
            'full_address' => 'required',
            'zone'=>'required',
            'ward_area'=>'required',
            'aadhar_number' => 'required|min:12|max:12',
            'financial_year' => 'required',
            'to_year' => 'required',
            'amount' => 'required',
            'manufactured' => 'required',
            'business_premises' => 'required',
            'owner_place'=>'required',
            // 'nature_business_id'=>'required',
            // 'trade'=>'required',
            // 'address_owner_premises'=>'required',
            'rental_agreement'=>'required',
            'area'=>'required',
            'noc_certificate'=>'required',
            'business_start'=>'required',
            'registration_no'=>'required',
            'food_drug'=>'required',
            'director_name'=>'required',
            'contact_no'=>'required|min:10|max:10',
            'alternet_email'=>'required',
            'alternet_address'=>'required',
            'gender'=>'required',
            'application_type'=>'required',
            'alternet_email'=>'required',
            'landlord_address'=>'required',
            // 'director_photos'=> 'required|file|mimes:pdf,PDF,png,PNG,jpg,JPG,jpeg,JPEG|max:2048',
            // 'upload_prescribed_formats'=> 'required|file|mimes:pdf,PDF,png,PNG,jpg,JPG,jpeg,JPEG|max:2048',
            // 'place'=> 'required|file|mimes:pdf,PDF,png,PNG,jpg,JPG,jpeg,JPEG|max:2048',
            // 'ownership'=> 'required|file|mimes:pdf,PDF,png,PNG,jpg,JPG,jpeg,JPEG|max:2048',
            // 'water_bills'=> 'required|file|mimes:pdf,PDF,png,PNG,jpg,JPG,jpeg,JPEG|max:2048',
            // 'society'=> 'required|file|mimes:pdf,PDF,png,PNG,jpg,JPG,jpeg,JPEG|max:2048',
            // 'aadhar_pans'=> 'required|file|mimes:pdf,PDF,png,PNG,jpg,JPG,jpeg,JPEG|max:2048',
            // 'property'=> 'required|file|mimes:pdf,PDF,png,PNG,jpg,JPG,jpeg,JPEG|max:2048',
            // 'tenancy'=> 'required|file|mimes:pdf,PDF,png,PNG,jpg,JPG,jpeg,JPEG|max:2048',
            // 'occupancy'=> 'required|file|mimes:pdf,PDF,png,PNG,jpg,JPG,jpeg,JPEG|max:2048',
            // 'medical'=> 'required|file|mimes:pdf,PDF,png,PNG,jpg,JPG,jpeg,JPEG|max:2048',
            'is_correct_info'=>'required'

        ];
    }
    public function messages()
    {
        return [
            'is_correct_info.required' => 'Please Accept Declaration'
        ];
    }
}
