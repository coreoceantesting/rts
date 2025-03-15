<?php

namespace App\Http\Requests\MedicalHealth\ChangelNursingLicense;

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
            'm_name' => 'required',
            'l_name' => 'required',
            'zone' => 'required',
            'marathi_f_name' => 'required',
            'marathi_m_name' => 'required',
            'marathi_l_name' => 'required',
            'email' => 'required',
            'address' => 'required',
            'marathi_address' => 'required',
            'purpose' => 'required',
            'marathi_purpose' => 'required',
            'mobile_num' => 'required|min:10|max:10',
            // 'aadhar_num' => 'required|min:12|max:12',
            'is_correct_info' => 'required'
        ];

    }

    public function messages()
    {
        return [
            'is_correct_info.required' => 'Please Accept Declaration',
            'f_name'=> 'First Name is required',
            'm_name' => 'Middle Name is required',
            'l_name' => 'Last Name is required',
            'zone' => 'Please Select Zone',
            'marathi_f_name' => 'प्रथम नाव आवश्यक',
            'marathi_m_name' => 'मधले नाव आवश्यक',
            'marathi_l_name' => 'आडनाव नाव आवश्यक',
            'email' => 'Email is required',
            'address' => 'Addrress is required',
            'marathi_address' => 'पत्ता आवश्यक',
            'purpose' => 'purpose is required',
            'marathi_purpose' => 'उद्देश आवश्यक',
            'mobile_num' => 'mobile number is required an must be 10 digit',
            // 'aadhar_num' => 'aadharcard number is required an must be 12 digit',
        ];
    }
}
