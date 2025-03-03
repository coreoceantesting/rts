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
            'building_permissions' => 'required|file|mimes:pdf,PDF,png,PNG,jpg,JPG,jpeg,JPEG|max:2048',
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
            'is_correct_info.required' => 'Please Accept Declaration'
        ];
    }
}
