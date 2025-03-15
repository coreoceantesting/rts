<?php

namespace App\Http\Requests\Nulm\HawkerRegister;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function rules(): array
    {
        return [
            'service_type' => 'required',
            'f_name' => 'required',
            'm_name' => 'required',
            'l_name' => 'required',
            'zone' => 'required',
            'mobile_num' => 'required|min:10|max:10',
            'email' => 'required',
            'aadhar_num' => 'required|min:12|max:12',
            'address' => 'required',
            'service_type' => 'required',
            'property_num' => 'required',
            'bussiness_type' => 'required',
            'bussiness_name' => 'required',
            'from_date' => 'required|date',
            'to_date' => 'required|date',
            'reason' => 'required',
            // 'images' => 'required',
            'is_correct_info' => 'required'

        ];
    }

    public function messages()
    {
        return [
            'is_correct_info.required' => 'Please Accept Declaration',
            'service_type' => 'Please Select Service Id',
            'f_name' => 'Please Enter First Name',
            'm_name' => 'Please Enter Middle Name',
            'l_name' => 'Please Enter Last Name',
            'zone' => 'Please Select Zone',
            'mobile_num' => 'Please Enter Mobile Number an Number should be 10',
            'email' => 'Please Enter Email Id',
            'aadhar_num' => 'Please Enter Aadharcard Number an number should be 12 ',
            'address' => 'Please Enter Adress',
            // 'service_type' => 'Please Enter ',
            'property_num' => 'Please Enter Property Number',
            'bussiness_type' => 'Please Enter Business Type',
            'bussiness_name' => 'Please Enter Business Name',
            'from_date' => 'Please Enter Start Date',
            'to_date' => 'Please Enter End Date',
            'reason' => 'Please Enter reason',
            // 'images' => 'Please Attach Document ',
        ];
    }
}
