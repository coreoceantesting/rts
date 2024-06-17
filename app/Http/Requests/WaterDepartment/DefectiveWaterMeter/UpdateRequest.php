<?php

namespace App\Http\Requests\WaterDepartment\DefectiveWaterMeter;

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
            'owner_name' => 'required',
            'aadhar_no' => 'required|min:12|max:12',
            'mobile_no' => 'required|min:10|max:10',
            'email_id' => 'required',
            'zone' => 'required',
            'ward_area' => 'required',
            'plot_no' => 'nullable',
            'house_no' => 'required',
            'landmark' => 'required',
            'address' => 'required',
            'place_belongs_to_municipal' => 'required',
            'current_connection_is_illegal' => 'required',
            'applicant_or_tenant' => 'required',
            'criminal_judicial_issue' => 'required',
            'current_tap_detail' => 'required',
            'property_no' => 'required',
            'meter_reading' => 'required',
            'size' => 'required',
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
