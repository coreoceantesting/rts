<?php

namespace App\Http\Requests\Pwd\GrantingTelecom;

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
            'm_name' => 'required',
            'l_name' => 'required',
            'zone' => 'required',
            'mobile_num'=> 'required|min:10|max:10',
            'aadhar_num'=> 'required|min:12|max:12',
            'email' => 'required',
            'address' => 'required',
            'property_num'=> 'required',
            'road_type'=> 'required',
            'length_road'=> 'required',
            'width_road'=> 'required',
            'length_width'=> 'required',
            'digging_size'=> 'required',
            'start_point'=> 'required',
            'end_point'=> 'required',
            'latitude'=> 'required',
            'longitude'=> 'required',
            'is_correct_info'=>'required'
        ];
    }

    public function messages()
    {
        return [
            'is_correct_info.required' => 'Please Accept Declaration',
            'f_name' => 'Please Enter First Name',
            'm_name' => 'Please Enter Middle Name',
            'l_name' => 'Please Enter Last Name',
            'zone' => 'Please Select Zone',
            'mobile_num'=> 'Please Enter Mobile Number',
            'aadhar_num'=> 'Please Enter AadharCard Number',
            'email' => 'Please Enter Email',
            'address' => 'Please Enter Address',
            'property_num'=> 'Please Enter Propert Number',
            'road_type'=> 'Please Enter Road Type',
            'length_road'=> 'Please Enter Road length',
            'width_road'=> 'Please Enter Road Width',
            'length_width'=> 'Please Enter Road  length & Width',
            'digging_size'=> 'Please Enter Road Digging Size',
            'start_point'=> 'Please Enter Road Starting Point',
            'end_point'=> 'Please Enter Road Ending Point',
            'latitude'=> 'Please Enter Road Latitude',
            'longitude'=> 'Please Enter Road Longitude'
        ];
    }
}
