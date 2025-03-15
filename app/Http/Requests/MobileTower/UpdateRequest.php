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
            // 'address_owner_premises'=>'required',
            // 'nature_business_id'=>'required',
            // 'trade'=>'required',
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
            'landlord_address'=>'required',
            'gender'=>'required',
            'application_type'=>'required',
            'alternet_email'=>'required',
            'director_photos'=> 'required|file|mimes:pdf,PDF,png,PNG,jpg,JPG,jpeg,JPEG|max:2048',
            'upload_prescribed_formats'=> 'required|file|mimes:pdf,PDF,png,PNG,jpg,JPG,jpeg,JPEG|max:2048',
            'place'=> 'required|file|mimes:pdf,PDF,png,PNG,jpg,JPG,jpeg,JPEG|max:2048',
            // 'ownership'=> 'required|file|mimes:pdf,PDF,png,PNG,jpg,JPG,jpeg,JPEG|max:2048',
            // 'water_bills'=> 'required|file|mimes:pdf,PDF,png,PNG,jpg,JPG,jpeg,JPEG|max:2048',
            'society'=> 'required|file|mimes:pdf,PDF,png,PNG,jpg,JPG,jpeg,JPEG|max:2048',
            'aadhar_pans'=> 'required|file|mimes:pdf,PDF,png,PNG,jpg,JPG,jpeg,JPEG|max:2048',
            'property'=> 'required|file|mimes:pdf,PDF,png,PNG,jpg,JPG,jpeg,JPEG|max:2048',
            'tenancy'=> 'required|file|mimes:pdf,PDF,png,PNG,jpg,JPG,jpeg,JPEG|max:2048',
            'occupancy'=> 'required|file|mimes:pdf,PDF,png,PNG,jpg,JPG,jpeg,JPEG|max:2048',
            'medical'=> 'required|file|mimes:pdf,PDF,png,PNG,jpg,JPG,jpeg,JPEG|max:2048',
            'is_correct_info'=>'required'
        ];


    }
    public function messages()
    {
        return [
            'is_correct_info.required' => 'Please Accept Declaration',
            'name' => 'Please Enter Name',
            'm_name' => 'Please Enter Name in Marathi',
            'pancard_number' => 'Please Enter Pancard Number',
            'mobile_no' => 'Please Enter Mobile Number',
            'email_id' => 'Please Enter Email',
            'full_address' => 'Please Enter Address',
            'zone'=>'Please Select Zone',
            'ward_area'=>'Please Select Ward _area',
            'aadhar_number' => 'Please Enter Aadharcard Number',
            'financial_year' => 'Please Enter Financial Year',
            'to_year' => 'Please Enter To Year',
            'amount' => 'Please Enter Amount',
            'manufactured' => 'Please Select Yes/No',
            'business_premises' => 'Please Select Yes/No',
            'owner_place'=>'Please Enter Name of Owner Place',
            // 'address_owner_premises'=>'required',
            // 'nature_business_id'=>'required',
            // 'trade'=>'required',
            'rental_agreement'=>'Please Enter Rental Aggrement',
            'area'=>'Please Enter Area',
            'noc_certificate'=>'Please Select Yes/No',
            'business_start'=>'Please Enter Rental Aggrement BUsiness Start',
            'registration_no'=>'Please Enter Registration No',
            'food_drug'=>'Please Enter Under the Food and Drug Administration',
            'director_name'=>'Please Enter Director Name',
            'contact_no'=>'Please Enter Mobile Number',
            'alternet_email'=>'Please Enter Email Id',
            'alternet_address'=>'Please Enter Address',
            'landlord_address'=>'Please Enter Landloard Address',
            'gender'=>'Please Select Gender',
            'application_type'=>'Please Enter Application Type',
            'alternet_email'=>'Please Enter Email Id',
            'director_photos'=> 'Please Attach Director Phto',
            'upload_prescribed_formats'=> 'Please Attach Other Document',
            'place'=>'Please Attach Fire Safety Certificate',
            // 'ownership'=>'required|file|mimes:pdf,PDF,png,PNG,jpg,JPG,jpeg,JPEG|max:2048',
            // 'water_bills'=>'required|file|mimes:pdf,PDF,png,PNG,jpg,JPG,jpeg,JPEG|max:2048',
            'society'=>'Please Attach Shop Act',
            'aadhar_pans'=>'Please Attach Director Pancard',
            'property'=>'Please Attach Director Aadharcard',
            'tenancy'=>'Please Attach Current year tax receipt',
            'occupancy'=>'Please Attach Shop interior photo',
            'medical'=>'Please Attach Exterior photo of the shop',

        ];
    }
}
