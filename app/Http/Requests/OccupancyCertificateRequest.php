<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OccupancyCertificateRequest extends FormRequest
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
            'applicant_full_address'=>'required',
            'applicant_mobile_no' => 'required|min:10|max:10',
            'applicant_name'=>'required',
            'zone' => 'required',
            'ward' => 'required',
            'survey_no' => 'required',
            'email_id' => 'required',
            'documents'=>'required',
            'commencement_certificate_no'=>'required',
            'plinth_number'=>'required',
        ];
    }
}
