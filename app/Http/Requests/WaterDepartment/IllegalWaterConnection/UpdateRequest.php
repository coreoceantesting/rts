<?php

namespace App\Http\Requests\WaterDepartment\IllegalWaterConnection;

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
            'complainants_full_name' => 'required',
            'aadhar_no' => 'required|min:12|max:12',
            'mobile_no' => 'required|min:10|max:10',
            'address' => 'required',
            'email_id' => 'required',
            'unauthorized_tap_connection' => 'required',
            'zone' => 'required',
            'ward_area' => 'required',
            'plot_no' => 'required',
            'house_no' => 'required',
            'landmark' => 'required',
            'unauthorized_connection_address' => 'required',
            'current_connection_is_authorized' => 'required',
            'applicant_or_tenant' => 'required',
            'unauthorized_is_tenant' => 'required',
            'criminal_judicial_issue' => 'required',
            'existing_connection_detail' => 'required',
            'place_belongs_to_municipal' => 'required',
            'comment' => 'nullable',
            'application_document' => 'nullable',
            'is_correct_info' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'is_correct_info.required' => 'Please Accept Declaration'
        ];
    }
}
