<?php

namespace App\Http\Requests\Trade\LicenseTransfer;

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
            'applicant_full_name' => 'required',
            'office_address' => 'required',
            'mobile_no' => 'required|min:10|max:10',
            'email_id' => 'required',
            'aadhar_no' => 'required|min:12|max:12',
            'current_permission_no' => 'required',
            'current_permission_date' => 'required',
            'business_start_date' => 'required',
            'business_or_trade_name' => 'required',
            'area_size' => 'required',
            'new_permission_details' => 'required',
            'zone' => 'required',
            'ward_area' => 'required',
            'plot_no' => 'required',
            'description_of_new_trade_place' => 'required',
            'is_preveious_permission_declined_by_council' => 'required',
            'previous_permission_decline_reason' => 'required',
            'is_place_owned_by_council' => 'required',
            'is_any_dues_pending_of_council' => 'required',
            'trade_or_business_type' => 'required',
            'partner_count' => 'required',
            'partner_names' => 'required',
            'property_no' => 'required',
            'new_applicant_name' => 'required',
            'new_applicant_email' => 'required',
            'new_applicant_mobile_no' => 'required|min:10|max:10',
            'new_applicant_aadhar_no' => 'required|min:12|max:12',
            'address_of_new_applicant' => 'required',
            'remark' => 'required',
            'no_dues_document' => 'nullable',
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
