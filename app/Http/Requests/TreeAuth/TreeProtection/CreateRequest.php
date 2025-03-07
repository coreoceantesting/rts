<?php

namespace App\Http\Requests\TreeAuth\TreeProtection;

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
            'l_name' => 'required',
            'zone' => 'required',
            'title_of_application' => 'required',
            'flat_no' => 'required',
            'building_no' => 'required',
            'area' => 'required',
            'city' => 'required',
            'pincode' => 'required',
            'landmark' => 'required',
            'gut_number' => 'required',
            'type_application' => 'required',
            'reason_trim' => 'required',
            'owner' => 'required',
            'type_of_tree' => 'required',
            'paid_receipts' => 'required|file|mimes:pdf,PDF,png,PNG,jpg,JPG,jpeg,JPEG|max:2048',
            'photo_trees' => 'required|file|mimes:pdf,PDF,png,PNG,jpg,JPG,jpeg,JPEG|max:2048',
            'noc_letters' => 'required|file|mimes:pdf,PDF,png,PNG,jpg,JPG,jpeg,JPEG|max:2048',
            'mobile_num' => 'required|max:10|min:10',
            'aadhars' => 'required|file|mimes:pdf,PDF,png,PNG,jpg,JPG,jpeg,JPEG|max:2048',
            // 'building_permissions' => 'required|file|mimes:pdf,PDF,png,PNG,jpg,JPG,jpeg,JPEG|max:2048',
            'plan_constructions' => 'required|file|mimes:pdf,PDF,png,PNG,jpg,JPG,jpeg,JPEG|max:2048',
            'email' => 'required',
            'select_all'=>'required',
            'item1'=>'required',
            'item2'=>'required',
            'item3'=>'required',
            'item4'=>'required',
            'item5'=>'required',
            'item6'=>'required',
            'item7'=>'required',
            'item8'=>'required',
            'item9'=>'required'
        ];
    }

    public function messages()
    {
        return [
            'f_name' => 'Please Enter First Name',
            'l_name' => 'Please Enter Last Name',
            'zone' => 'Please Select Zone',
            'title_of_application' => 'Please Select Title',
            'flat_no' => 'Please Enter Flat No',
            'building_no' => 'Please Enter Building No',
            'area' => 'Please Enter Area',
            'city' => 'Please Enter City',
            'pincode' => 'Please Enter Pincode',
            'landmark' => 'Please Enter landmark',
            'gut_number' => 'Please Enter Gut number',
            'type_application' => 'Please Select type pplication',
            'reason_trim' => 'Please Select reason trim',
            'owner' => 'Please Select Owner type',
            'type_of_tree' => 'Please Select type of tree',
            'paid_receipts' => 'Please Attach Paid receipt',
            'photo_trees' => 'Please Attach photo of tree',
            'noc_letters' => 'Please Attach Noc Letter',
            'mobile_num' => 'required|max:10|min:10',
            'aadhars' => 'Please Attach Aadharcard',
            // 'building_permissions' => 'Please Attach Paid receipt',
            'plan_constructions' => 'Please Attach Sanctioned Plan of Construction',
            'email' => 'Please Enter Email Id',
            'select_all'=>'required',
            'item1'=>'required',
            'item2'=>'required',
            'item3'=>'required',
            'item4'=>'required',
            'item5'=>'required',
            'item6'=>'required',
            'item7'=>'required',
            'item8'=>'required',
            'item9'=>'required'
        ];
    }
}
