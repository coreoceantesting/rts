<?php

namespace App\Http\Requests\Nulm\HawkerRegister;

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
}
