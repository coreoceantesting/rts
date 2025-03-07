<?php

namespace App\Http\Requests\Trade\LicenseLoadging;

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
            // 'director_photos'=>'required|file|mimes:pdf,PDF,png,PNG,jpg,JPG,jpeg,JPEG|max:2048',
            // 'upload_prescribed_formats'=>'required|file|mimes:pdf,PDF,png,PNG,jpg,JPG,jpeg,JPEG|max:2048',
            // 'place'=>'required|file|mimes:pdf,PDF,png,PNG,jpg,JPG,jpeg,JPEG|max:2048',
            // 'ownership'=>'required|file|mimes:pdf,PDF,png,PNG,jpg,JPG,jpeg,JPEG|max:2048',
            // 'water_bills'=>'required|file|mimes:pdf,PDF,png,PNG,jpg,JPG,jpeg,JPEG|max:2048',
            // 'society'=>'required|file|mimes:pdf,PDF,png,PNG,jpg,JPG,jpeg,JPEG|max:2048',
            // 'aadhar_pans'=>'required|file|mimes:pdf,PDF,png,PNG,jpg,JPG,jpeg,JPEG|max:2048',
            // 'property'=>'required|file|mimes:pdf,PDF,png,PNG,jpg,JPG,jpeg,JPEG|max:2048',
            // 'tenancy'=>'required|file|mimes:pdf,PDF,png,PNG,jpg,JPG,jpeg,JPEG|max:2048',
            // 'occupancy'=>'required|file|mimes:pdf,PDF,png,PNG,jpg,JPG,jpeg,JPEG|max:2048',
            // 'medical'=>'required|file|mimes:pdf,PDF,png,PNG,jpg,JPG,jpeg,JPEG|max:2048',
            'is_correct_info'=>'required'

        ];
    }

    public function messages()
    {
        return [
            'shop_name' => 'Please Entere Shop Name',
            'marathi_shop_name' => 'Please Enter Shop Name in Marathi',
            'pencard_num' => 'Please Enter pancard Number',
            'mobile_num' => 'Please Enter Mobile Number an must be 10 digit',
            'e_mail' => 'Please Enter Email',
            'address' => 'Please Enter Address',
            'zone'=>'Please Select Zone',
            'ward_area'=>'Please Select Ward Area',
            'aadhar_num' => 'Please Enter Aadharcard Number an must be 12 digit ',
            'financial_year' => 'Please Select License Financial From Year',
            'to_year' => 'Please Select To Year',
            'amount' => 'Please Enter amount',
            'manufactured' => 'Please Select Yes/No',
            'business_premises' => 'Please Select Yes/No',
            'owner_place'=>'Please Enter Name of the Owner Place',
            'address_owner_premises'=>'Please Enter Address of the Owner Place',
            'rental_agreement'=>'Please Enter Rental Agreement',
            'area_used'=>'Please Enter Area Used',
            'noc_certificate'=>'Please Select Yes/NO',
            'business_start'=>'Please Enter Business Start',
            'registration_no'=>'Please Enter Registration Number',
            'food_drug'=>'Please Enter Under the Food and Drug Administration',
            'director_name'=>'Please Enter Director Name',
            'contact_no'=>'Please Enter Mobile Number',
            'alternet_email'=>'Please Enter Email Id',
            'alternet_address'=>'Please Enter Address',
            'gender'=>'Please Select Gender',
            'application_type'=>'Please Select Application Type',
            // 'alternet_email'=>'required',
            // 'director_photos'=>'Please Attach Director Image',
            // 'upload_prescribed_formats'=>'Please Attach Other document',
            // 'place'=>'Please Attach Fire Safety Certificate',
            // 'ownership'=>'required|file|mimes:pdf,PDF,png,PNG,jpg,JPG,jpeg,JPEG|max:2048',
            // 'water_bills'=>'required|file|mimes:pdf,PDF,png,PNG,jpg,JPG,jpeg,JPEG|max:2048',
            // 'society'=>'Please Attach Shop Act',
            // 'aadhar_pans'=>'Please Attach Director Pancard',
            // 'property'=>'Please Attach Director Aadharcard',
            // 'tenancy'=>'Please Attach Current year tax receipt',
            // 'occupancy'=>'Please Attach Shop interior photo',
            // 'medical'=>'Please Attach Exterior photo of the shop',

        ];
    }
}
