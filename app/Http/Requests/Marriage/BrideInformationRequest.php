<?php

namespace App\Http\Requests\Marriage;

use Illuminate\Foundation\Http\FormRequest;

class BrideInformationRequest extends FormRequest
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
        $data = [
            'marriage_reg_form_id' => 'required',
            'bride_info_fname_in_english' => 'required',
            'bride_info_mname_in_english' => 'required',
            'bride_info_lname_in_english' => 'required',
            'bride_info_fname_in_marathi' => 'required',
            'bride_info_mname_in_marathi' => 'required',
            'bride_info_lname_in_marathi' => 'required',
            'bride_info_address_in_english' => 'required',
            'bride_info_address_in_marathi' => 'required',
            'bride_info_pincode' => 'required|string|min:6|max:6|regex:/^[0-9]{6}$/',
            'bride_info_pincode_in_marathi' => 'required|string|min:6|max:6',
            'bride_info_mobile_no' => 'required|string|min:10|max:10|regex:/^[0-9]{10}$/',
            'bride_info_email' => 'required',
            'bride_info_aadhar_card_no' => 'required|string|min:12|max:12|regex:/^[0-9]{12}$/',
            'bride_info_dob' => 'required',
            'bride_info_age' => 'required',
            'bride_info_gender' => 'required',
            'bride_info_religion_by_birth' => 'required',
            'bride_info_religion_by_adoption' => 'required',
            'bride_info_id_proof' => 'required',
            'bride_info_residential_proof' => 'required',
            'bride_info_age_proof' => 'required',
            'bride_info_previous_status' => 'required',
            'bride_info_previous_status_proof' => 'nullable'
        ];
        if (!$this->editForm) {
            $data1 = array_merge($data, [
                'bride_info_photos' => 'nullable|file|mimes:png,PNG,jpg,JPEG,jpeg,JPG|max:400',
                'bride_info_id_proof_files' => 'nullable|file|mimes:pdf,PDF,png,PNG,jpg,JPEG,jpeg,JPG|max:2048',
                'bride_info_residential_proof_files' => 'nullable|file|mimes:pdf,PDF,png,PNG,jpg,JPEG,jpeg,JPG|max:2048',
                'bride_info_age_proof_files' => 'nullable|file|mimes:pdf,PDF,png,PNG,jpg,JPEG,jpeg,JPG|max:2048',
                'bride_info_upload_signatures' => 'nullable|file|mimes:png,PNG,jpg,JPEG,jpeg,JPG|max:400',
                'bride_info_upload_previous_status_proofs' => 'nullable|file|mimes:pdf,PDF,png,PNG,jpg,JPEG,jpeg,JPG|max:2048'
            ]);
            return $data1;
        } else {
            $data1 = array_merge($data, [
                'bride_info_photos' => 'required|file|mimes:png,PNG,jpg,JPEG,jpeg,JPG|max:400',
                'bride_info_id_proof_files' => 'required|file|mimes:pdf,PDF,png,PNG,jpg,JPEG,jpeg,JPG|max:2048',
                'bride_info_residential_proof_files' => 'required|file|mimes:pdf,PDF,png,PNG,jpg,JPEG,jpeg,JPG|max:2048',
                'bride_info_age_proof_files' => 'required|file|mimes:pdf,PDF,png,PNG,jpg,JPEG,jpeg,JPG|max:2048',
                'bride_info_upload_signatures' => 'required|file|mimes:png,PNG,jpg,JPEG,jpeg,JPG|max:400',
                'bride_info_upload_previous_status_proofs' => 'nullable|file|mimes:pdf,PDF,png,PNG,jpg,JPEG,jpeg,JPG|max:2048'
            ]);
            return $data1;
        }
        return $data;
    }

    public function messages()
    {
        return [
            'bride_info_fname_in_english.required' => 'Please enter first name',
            'bride_info_mname_in_english.required' => 'Please enter middle name',
            'bride_info_lname_in_english.required' => 'Please enter last name',
            'bride_info_fname_in_marathi.required' => 'Please enter first name',
            'bride_info_mname_in_marathi.required' => 'Please enter middle name',
            'bride_info_lname_in_marathi.required' => 'Please enter last name',
            'bride_info_address_in_english.required' => 'Please enter address',
            'bride_info_address_in_marathi.required' => 'Please enter address',
            'bride_info_pincode.required' => 'Please enter pincode',
            'bride_info_pincode.min' => 'Please enter 6 digit pincode',
            'bride_info_pincode.max' => 'Please enter 6 digit pincode',
            'bride_info_pincode.regex' => 'Please enter proper pincode',
            'bride_info_pincode_in_marathi.required' => 'Please enter pincode',
            'bride_info_pincode_in_marathi.min' => 'Please enter 6 digit pincode',
            'bride_info_pincode_in_marathi.max' => 'Please enter 6 digit pincode',
            'bride_info_mobile_no.required' => 'Please enter mobile no',
            'bride_info_mobile_no.min' => 'Please enter 10 digit mobile no',
            'bride_info_mobile_no.max' => 'Please enter 10 digit mobile no',
            'bride_info_mobile_no.regex' => 'Please enter proper mobile no',
            'bride_info_email.required' => 'Please enter email',
            'bride_info_aadhar_card_no.required' => 'Please enter aadhar card no',
            'bride_info_aadhar_card_no.min' => 'Please enter 10 digit aadhar card no',
            'bride_info_aadhar_card_no.max' => 'Please enter 10 digit aadhar card no',
            'bride_info_aadhar_card_no.regex' => 'Please enter proper aadhar card no',
            'bride_info_dob.required' => 'Please select date of birth',
            'bride_info_age.required' => 'Please enter age',
            'bride_info_gender.required' => 'Please select gender',
            'bride_info_religion_by_birth.required' => 'Please select religion by birth',
            'bride_info_religion_by_adoption.required' => 'Please select religion by adoption',
            'bride_info_photos.required' => 'Please select photo',
            'bride_info_photos.mimes' => 'Only jpg, png, and jpeg file supported',
            'bride_info_photos.max' => 'Max 400kb file is supported',
            'bride_info_id_proof.required' => 'Please select id proof',
            'bride_info_residential_proof.required' => 'Please select residential proof',
            'bride_info_age_proof.required' => 'Please select age',
            'bride_info_id_proof_files.required' => 'Please select id proof file',
            'bride_info_id_proof_files.mimes' => 'Only jpg, png, jpeg and pdf file supported',
            'bride_info_id_proof_files.max' => 'Max 2mb file is supported',
            'bride_info_residential_proof_files.required' => 'Please select residential proof file',
            'bride_info_residential_proof_files.mimes' => 'Only jpg, png, jpeg and pdf file supported',
            'bride_info_residential_proof_files.max' => 'Max 2mb file is supported',
            'bride_info_age_proof_files.required' => 'Please select age proof file',
            'bride_info_age_proof_files.mimes' => 'Only jpg, png, jpeg and pdf file supported',
            'bride_info_age_proof_files.max' => 'Max 2mb file is supported',
            'bride_info_upload_signatures.required' => 'Please select signature',
            'bride_info_upload_signatures.mimes' => 'Only jpg, png, jpeg and pdf file supported',
            'bride_info_upload_signatures.max' => 'Max 400kb file is supported',
            'bride_info_previous_status.required' => 'Please select previous status',
            'bride_info_previous_status_proof.required_if' => 'Please select previous status proof',
            'bride_info_upload_previous_status_proofs.required_if' => 'Please upload previous status proof',
            'bride_info_upload_previous_status_proofs.mimes' => 'Only jpg, png, jpeg and pdf file supported',
            'bride_info_upload_previous_status_proofs.max' => 'Max 400kb file is supported',
        ];
    }
}
