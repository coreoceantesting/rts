<?php

namespace App\Http\Requests\Marriage;

use Illuminate\Foundation\Http\FormRequest;

class GroomInformationRequest extends FormRequest
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
            'marriage_reg_form_id' => 'required',
            'groom_info_fname_in_english' => 'required',
            'groom_info_mname_in_english' => 'required',
            'groom_info_lname_in_english' => 'required',
            'groom_info_fname_in_marathi' => 'required',
            'groom_info_mname_in_marathi' => 'required',
            'groom_info_lname_in_marathi' => 'required',
            'groom_info_address_in_english' => 'required',
            'groom_info_address_in_marathi' => 'required',
            'groom_info_pincode' => 'required|string|min:6|max:6|regex:/^[0-9]{6}$/',
            'groom_info_pincode_in_marathi' => 'required|string|min:6|max:6',
            'groom_info_mobile_no' => 'required|string|min:10|max:10|regex:/^[0-9]{10}$/',
            'groom_info_email' => 'required',
            'groom_info_aadhar_card_no' => 'required|string|min:12|max:12|regex:/^[0-9]{12}$/',
            'groom_info_dob' => 'required',
            'groom_info_age' => 'required',
            'groom_info_gender' => 'required',
            'groom_info_religion_by_birth' => 'required',
            'groom_info_religion_by_adoption' => 'required',
            'groom_info_photos' => 'required|file|mimes:png,PNG,jpg,JPEG,jpeg,JPG|max:400',
            'groom_info_id_proof' => 'required',
            'groom_info_residential_proof' => 'required',
            'groom_info_age_proof' => 'required',
            'groom_info_id_proof_files' => 'required|file|mimes:pdf,PDF,png,PNG,jpg,JPEG,jpeg,JPG|max:2048',
            'groom_info_residential_proof_files' => 'required|file|mimes:pdf,PDF,png,PNG,jpg,JPEG,jpeg,JPG|max:2048',
            'groom_info_age_proof_files' => 'required|file|mimes:pdf,PDF,png,PNG,jpg,JPEG,jpeg,JPG|max:2048',
            'groom_info_upload_signatures' => 'required|file|mimes:png,PNG,jpg,JPEG,jpeg,JPG|max:400',
            'groom_info_previous_status' => 'required',
            'groom_info_previous_status_proof' => 'nullable',
            'groom_info_upload_previous_status_proofs' => 'required|file|mimes:pdf,PDF,png,PNG,jpg,JPEG,jpeg,JPG|max:2048',
        ];
    }

    public function messages()
    {
        return [
            'groom_info_fname_in_english.required' => 'Please enter first name',
            'groom_info_mname_in_english.required' => 'Please enter middle name',
            'groom_info_lname_in_english.required' => 'Please enter last name',
            'groom_info_fname_in_marathi.required' => 'Please enter first name',
            'groom_info_mname_in_marathi.required' => 'Please enter middle name',
            'groom_info_lname_in_marathi.required' => 'Please enter last name',
            'groom_info_address_in_english.required' => 'Please enter address',
            'groom_info_address_in_marathi.required' => 'Please enter address',
            'groom_info_pincode.required' => 'Please enter pincode',
            'groom_info_pincode.min' => 'Please enter 6 digit pincode',
            'groom_info_pincode.max' => 'Please enter 6 digit pincode',
            'groom_info_pincode.regex' => 'Please enter proper pincode',
            'groom_info_pincode_in_marathi.required' => 'Please enter pincode',
            'groom_info_pincode_in_marathi.min' => 'Please enter 6 digit pincode',
            'groom_info_pincode_in_marathi.max' => 'Please enter 6 digit pincode',
            'groom_info_mobile_no.required' => 'Please enter mobile no',
            'groom_info_mobile_no.min' => 'Please enter 10 digit mobile no',
            'groom_info_mobile_no.max' => 'Please enter 10 digit mobile no',
            'groom_info_mobile_no.regex' => 'Please enter proper mobile no',
            'groom_info_email.required' => 'Please enter email',
            'groom_info_aadhar_card_no.required' => 'Please enter aadhar card no',
            'groom_info_aadhar_card_no.min' => 'Please enter 10 digit aadhar card no',
            'groom_info_aadhar_card_no.max' => 'Please enter 10 digit aadhar card no',
            'groom_info_aadhar_card_no.regex' => 'Please enter proper aadhar card no',
            'groom_info_dob.required' => 'Please select date of birth',
            'groom_info_age.required' => 'Please enter age',
            'groom_info_gender.required' => 'Please select gender',
            'groom_info_religion_by_birth.required' => 'Please select religion by birth',
            'groom_info_religion_by_adoption.required' => 'Please select religion by adoption',
            'groom_info_photo.required' => 'Please select photo',
            'groom_info_photo.mimes' => 'Only jpg, png, and jpeg file supported',
            'groom_info_photo.max' => 'Max 400kb file is supported',
            'groom_info_id_proof.required' => 'Please select id proof',
            'groom_info_residential_proof.required' => 'Please select residential proof',
            'groom_info_age_proof.required' => 'Please select age',
            'groom_info_id_proof_files.required' => 'Please select id proof file',
            'groom_info_id_proof_files.mimes' => 'Only jpg, png, jpeg and pdf file supported',
            'groom_info_id_proof_files.max' => 'Max 2mb file is supported',
            'groom_info_residential_proof_files.required' => 'Please select residential proof file',
            'groom_info_residential_proof_files.mimes' => 'Only jpg, png, jpeg and pdf file supported',
            'groom_info_residential_proof_files.max' => 'Max 2mb file is supported',
            'groom_info_age_proof_files.required' => 'Please select age proof file',
            'groom_info_age_proof_files.mimes' => 'Only jpg, png, jpeg and pdf file supported',
            'groom_info_age_proof_files.max' => 'Max 2mb file is supported',
            'groom_info_upload_signatures.required' => 'Please select signature',
            'groom_info_upload_signatures.mimes' => 'Only jpg, png, jpeg and pdf file supported',
            'groom_info_upload_signatures.max' => 'Max 400kb file is supported',
            'groom_info_previous_status.required' => 'Please select previous status',
            'groom_info_previous_status_proof.required' => 'Please select previous status proof',
            'groom_info_upload_previous_status_proofs.required' => 'Please upload previous status proof',
            'groom_info_upload_previous_status_proofs.mimes' => 'Only jpg, png, jpeg and pdf file supported',
            'groom_info_upload_previous_status_proofs.max' => 'Max 400kb file is supported',
        ];
    }
}
