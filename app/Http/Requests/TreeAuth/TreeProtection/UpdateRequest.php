<?php

namespace App\Http\Requests\TreeAuth\TreeProtection;

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
            'f_name' => 'required',
            // 'm_name' => 'required',
            'l_name' => 'required|min:10|max:10',
            'zone' => 'required',
            'title_of_application'=> 'required',
            'flat_no'=> 'required',
            'building_no'=> 'required',
            'area'=> 'required',
            'city'=> 'required',
            'pincode'=> 'required',
            'landmark'=> 'required',
            'gut_number'=> 'required',
            'type_application'=> 'required',
            'reason_trim'=> 'required',
            'owner'=> 'required',
            'type_of_tree'=> 'required',
            'paid_receipt'=> 'required|file|mimes:pdf,PDF,png,PNG,jpg,JPG,jpeg,JPEG|max:2048',
            'photo_tree'=> 'required|file|mimes:pdf,PDF,png,PNG,jpg,JPG,jpeg,JPEG|max:2048',
            'aadhar'=> 'required|file|mimes:pdf,PDF,png,PNG,jpg,JPG,jpeg,JPEG|max:2048',
            'plan_construction'=> 'required|file|mimes:pdf,PDF,png,PNG,jpg,JPG,jpeg,JPEG|max:2048',
            'noc_letter'=> 'required|file|mimes:pdf,PDF,png,PNG,jpg,JPG,jpeg,JPEG|max:2048'


            // 'marathi_f_name' => 'required',
            // 'marathi_m_name' => 'required|min:10|max:10',
            // 'marathi_l_name' => 'required|min:12|max:12',
            // 'email' => 'required',

            // 'address' => 'required',
            // 'marathi_address' => 'required',
            // 'purpose' => 'required',
            // 'marathi_purpose' => 'required'

        ];
    }
}
