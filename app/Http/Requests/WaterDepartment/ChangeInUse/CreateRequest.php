<?php

namespace App\Http\Requests\WaterDepartment\ChangeInUse;

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
            'property_owner_name' => 'required',
            'aadhar_no' => 'required|min:12|max:12',
            'mobile_no' => 'required|min:10|max:10',
            'email_id' => 'required',
            'zone' => 'required',
            'ward_area' => 'required',
            'plot_no' => 'required',
            'house_no' => 'required',
            'landmark' => 'required',
            'address' => 'required',
            'property_type' => 'required',
            'water_connection_no' => 'required',
            'applicant_is_on_rent' => 'required',
            'water_connection_size' => 'required',
            'water_usage' => 'required',
            'new_water_con_usage' => 'required',
            'usage_residence_type' => 'required',
            'current_connection_is_illegal' => 'required',
            'no_of_user' => 'required',
            'place_belongs_to_municipal' => 'required',
            'any_police_complaint' => 'required',
            'application_documents' => 'required|file|mimes:pdf,PDF,png,PNG,jpg,JPG,jpeg,JPEG|max:2048',
            'nodues_documents' => 'required|file|mimes:pdf,PDF,png,PNG,jpg,JPG,jpeg,JPEG|max:2048',
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
