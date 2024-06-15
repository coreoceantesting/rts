<?php

namespace App\Http\Requests\WaterDepartment\ChangeConnectionSize;

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
            'new_owner_name' => 'required',
            'aadhar_no' => 'required|min:12|max:12',
            'mobile_no' => 'required|min:10|max:10',
            'email_id' => 'required',
            'zone' => 'required',
            'ward_area' => 'required',
            'plot_no' => 'required',
            'house_no' => 'required',
            'landmark' => 'required',
            'address' => 'required',
            'current_connection_is_authorized' => 'required',
            'applicant_or_tenant' => 'required',
            'no_of_user' => 'required',
            'criminal_judicial_issue' => 'required',
            'existing_connection_detail' => 'required',
            'old_tap_size' => 'required',
            'new_tap_size' => 'required',
            'new_tap_connection' => 'required',
            'place_belongs_to_municipal' => 'required',
            'comment' => 'nullable',
            'application_document' => 'required',
            'nodues_document' => 'required',
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
