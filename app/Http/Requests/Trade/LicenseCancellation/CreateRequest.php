<?php

namespace App\Http\Requests\Trade\LicenseCancellation;

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
            'applicant_full_name' => 'required',
            'address' => 'required',
            'mobile_no' => 'required|min:10|max:10',
            'email_id' => 'required',
            'aadhar_no' => 'required|min:12|max:12',
            'current_permission_no' => 'required',
            'current_permission_date' => 'required',
            'business_start_date' => 'required',
            'business_or_trade_name' => 'required',
            'new_permission_detail' => 'required',
            'reason_for_trade_license_cancellation' => 'required',
            'zone' => 'required',
            'ward_area' => 'required',
            'plot_no' => 'required',
            'permission_details' => 'required',
            'is_preveious_permission_declined_by_council' => 'required',
            'previous_permission_decline_reason' => 'required',
            'is_place_owned_by_council' => 'required',
            'is_any_dues_pending_of_council' => 'required',
            'trade_or_business_type' => 'required',
            'property_no' => 'required',
            'remark' => 'required',
            'application_document' => 'required',
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
