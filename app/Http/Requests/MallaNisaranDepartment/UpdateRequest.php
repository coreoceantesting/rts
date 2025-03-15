<?php

namespace App\Http\Requests\MallaNisaranDepartment;

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
            'connection_type'=>'required',
            'conn_property_type'=>'required',
            'application_category'=>'required',
            'title'=>'required',
            'f_name'=>'required',
            // 'm_name'=>'required',
            'l_name'=>'required',
            'mobile_no'=>'required|max:10|min:10',
            'email'=>'required',
            'aadhar_no'=>'required|max:12|min:12',
            'gender'=>'required',
            'age'=>'required',
            'address'=>'required',
            'landmark'=>'required',
            'permanent_address'=>'required',
            'city_name'=>'required',
            'pincode'=>'required',
            'state'=>'required',
            'csmc_prop_no'=>'required',
            'cts_no'=>'required',
            'Zone'=>'required',
            'ward_no'=>'required',
            'detail_address'=>'required',
            'lacality'=>'required',
            'longitude'=>'required',
            'lattitude'=>'required',
            'near_landmark'=>'required',
            'property_city'=>'required',
            'property_state'=>'required',
            'property_pincode'=>'required',
            'place_business'=>'required',
            'sewer_diameter'=>'required',
            'branch_line'=>'required',
            'diameter_connection'=>'required',
            'sewer_line'=>'required',
            'csmc_connection'=>'required',
            'name_plumber'=>'required',
            // 'property_taxs'=>'required|file|mimes:pdf,PDF,png,PNG,jpg,JPG,jpeg,JPEG|max:2048',
            // 'property_photos'=>'required|file|mimes:pdf,PDF,png,PNG,jpg,JPG,jpeg,JPEG|max:2048',
            // 'water_taxs'=>'required|file|mimes:pdf,PDF,png,PNG,jpg,JPG,jpeg,JPEG|max:2048',
            // 'passport_size_photos'=>'required|file|mimes:pdf,PDF,png,PNG,jpg,JPG,jpeg,JPEG|max:2048',
            // 'aadharcard_photos'=>'required|file|mimes:pdf,PDF,png,PNG,jpg,JPG,jpeg,JPEG|max:2048'
            'is_correct_info'=>'required'
        ];
    }

    public function messages()
    {
        return [
            'is_correct_info.required' => 'Please Accept Declaration',
            'connection_type'=>'Please Select Connenction type',
            'conn_property_type'=>'Please Select Connenction property type',
            'application_category'=>'Please Select Connenction application category',
            'title'=>'Please Select Title',
            'f_name'=>'Please Enter First Name',
            // 'm_name'=>'required',
            'l_name'=>'Please Enter Last Name',
            'mobile_no'=>'Please Enter Mobile Number',
            'email'=>'Please Enter Email Id',
            'aadhar_no'=>'Please Enter Aadharcard Number',
            'gender'=>'Please Select Gender',
            'age'=>'Please Enter Age(in Year)',
            'address'=>'Please Enter Address',
            'landmark'=>'Please Enter Nearest Landmark',
            'permanent_address'=>'Please Enter Permanent Address',
            'city_name'=>'Please Enter City Name',
            'pincode'=>'Please Enter Pincode',
            'state'=>'Please Enter State',
            'csmc_prop_no'=>'Please Enter CSMC Property No',
            'cts_no'=>'Please Enter CTS NO/Gut No',
            'Zone'=>'Plase Select Zone',
            'ward_no'=>'Plase Select Ward',
            'detail_address'=>'Please Enter Address',
            'lacality'=>'Please Enter Lacality',
            'longitude'=>'Please Enter Longitude',
            'lattitude'=>'Please Enter Lattitude',
            'near_landmark'=>'Please Enter Nearest Landmark',
            'property_city'=>'Please Enter City',
            'property_state'=>'Please Enter State',
            'property_pincode'=>'Please Enter Pincode',
            'place_business'=>'Please Enter Business',
            'sewer_diameter'=>'Please Enter Sewer Diameter',
            'branch_line'=>'Please Enter Branch Line',
            'diameter_connection'=>'Please Enter Diameter Connection',
            'sewer_line'=>'Please Enter Sewer Line',
            'csmc_connection'=>'Please Enter Csm Connection',
            'name_plumber'=>'Please Select Plumber',
            // 'property_taxs'=>'Attach File Propert tax',
            // 'property_photos'=>'Attach File Propert Photo',
            // 'water_taxs'=>'Attach File Water tax',
            // 'passport_size_photos'=>'Attach File Passport Size Photo',
            // 'aadharcard_photos'=>'Attach File Passport Aadharcard Photo'
        ];
    }
}
