<?php

namespace App\Http\Requests\TownPlanning\BuildingPermission;

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
            'aadhar_num' => 'required|min:12|max:12',
            'is_correct_info'=>'required'
        ];
    }
}
