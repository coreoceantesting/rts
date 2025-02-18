<?php

namespace App\Http\Requests\MedicalHealth\GrantNursingLicense;

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
            'l_name' => 'required|min:10|max:10',
            'zone' => 'required',
            'marathi_f_name' => 'required',
            'marathi_m_name' => 'required|min:10|max:10',
            'marathi_l_name' => 'required|min:12|max:12',
            'email' => 'required',
            'address' => 'required',
            'marathi_address' => 'required',
            'purpose' => 'required',
            'marathi_purpose' => 'required'

        ];
    }

    public function messages()
    {
        return [
            'is_correct_info.required' => 'Please Accept Declaration'
        ];
    }
}
