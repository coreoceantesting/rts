<?php

namespace App\Http\Requests\WaterDepartment\ChangeOwnership;

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
            'address' => 'required',
            'email_id' => 'required',
            'property_no' => 'required',
            'zone' => 'required',
            'ward_area' => 'required',
            'new_tap_connection' => 'required',
            'house_no' => 'required',
            'landmark' => 'required',
            'current_connection_is_authorized' => 'required',
            'no_of_user' => 'required',
            'applicant_or_tenant' => 'required',
            'applicant_or_tenant' => 'required',
            'criminal_judicial_issue' => 'required',
            'old_owner_name' => 'required',
            'tap_size' => 'required',
            'existing_connection_detail' => 'required',
            'place_belongs_to_municipal' => 'required',
            'comment' => 'nullable',
            'application_document' => 'required',
            'ownership_document' => 'required',
            'nodues_document' => 'required',
            'is_correct_info' => 'required'
        ];
    }
}
