<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PlinthCertificateRequest extends FormRequest
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
        'zone' => 'required',
         'ward' => 'required',
            'survey_no' => 'required',
            'applicant_name'=>'required',
            'applicant_mobile_no' => 'required|min:10|max:10',
            'applicant_full_address'=>'required',
            'plot_no'=>'required',
            'road'=>'required',
            'building_no'=>'required',
            'documents'=>'required',
            'email_id' => 'required',
            'building_permission_no'=>'required',
        ];
    }
}
