<?php

namespace App\Http\Requests\Trade\RenewMarriageLicense;

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
            'shop_name' => 'required',
            'marathi_shop_name' => 'required',
            'pencard_num' => 'required|min:10|max:10',
            'mobile_num' => 'required|min:10|max:10',
            'e_mail' => 'required',
            'address' => 'required',
            'zone'=>'required',
            'ward_area'=>'required',
            'aadhar_num' => 'required|min:12|max:12',
            'financial_year' => 'required',
            'to_year' => 'required',
            'amount' => 'required',
            'manufactured' => 'required',
            'business_premises' => 'required',
            'owner_place'=>'required',
            'address_owner_premises'=>'required',
            'rental_agreement'=>'required',
            'area_used'=>'required',
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
}
