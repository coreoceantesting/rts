<?php

namespace App\Http\Requests\Marriage;

use Illuminate\Foundation\Http\FormRequest;

class WitnessInformationRequest extends FormRequest
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
            'first_witness_info_fname_in_english' => 'required',
            'first_witness_info_fname_in_marathi' => 'required',
            'first_witness_info_mobile_no' => 'required|string|min:10|max:10|regex:/^[0-9]{10}$/',
            'first_witness_info_dob' => 'required',
            'first_witness_info_age' => 'required',
            'first_witness_info_gender' => 'required',
            'first_witness_info_relation' => 'required',
            'first_witness_info_address_in_english' => 'required',
            'first_witness_info_address_in_marathi' => 'required',
            'first_witness_info_id_proof' => 'required',
            'second_witness_info_fname_in_english' => 'required',
            'second_witness_info_fname_in_marathi' => 'required',
            'second_witness_info_mobile_no' => 'required|string|min:10|max:10|regex:/^[0-9]{10}$/',
            'second_witness_info_dob' => 'required',
            'second_witness_info_age' => 'required',
            'second_witness_info_gender' => 'required',
            'second_witness_info_relation' => 'required',
            'second_witness_info_address_in_english' => 'required',
            'second_witness_info_address_in_marathi' => 'required',
            'second_witness_info_id_proof' => 'required',
            'third_witness_info_fname_in_english' => 'required',
            'third_witness_info_fname_in_marathi' => 'required',
            'third_witness_info_mobile_no' => 'required|string|min:10|max:10|regex:/^[0-9]{10}$/',
            'third_witness_info_dob' => 'required',
            'third_witness_info_age' => 'required',
            'third_witness_info_gender' => 'required',
            'third_witness_info_relation' => 'required',
            'third_witness_info_address_in_english' => 'required',
            'third_witness_info_address_in_marathi' => 'required',
            'third_witness_info_id_proof' => 'required',
        ];
        if (!$this->editForm) {
            $data1 = array_merge($data, [
                'first_witness_info_witness_photos' => 'required|file|mimes:png,PNG,jpg,JPEG,jpeg,JPG|max:400',
                'first_witness_info_upload_signatures' => 'required|file|mimes:png,PNG,jpg,JPEG,jpeg,JPG|max:400',
                'first_witness_info_upload_documents' => 'required|file|mimes:pdf,PDF,png,PNG,jpg,JPEG,jpeg,JPG|max:2048',
                'second_witness_info_witness_photos' => 'required|file|mimes:png,PNG,jpg,JPEG,jpeg,JPG|max:400',
                'second_witness_info_upload_signatures' => 'required|file|mimes:png,PNG,jpg,JPEG,jpeg,JPG|max:400',
                'second_witness_info_upload_documents' => 'required|file|mimes:pdf,PDF,png,PNG,jpg,JPEG,jpeg,JPG|max:2048',
                'third_witness_info_witness_photos' => 'required|file|mimes:png,PNG,jpg,JPEG,jpeg,JPG|max:400',
                'third_witness_info_upload_signatures' => 'required|file|mimes:png,PNG,jpg,JPEG,jpeg,JPG|max:400',
                'third_witness_info_upload_documents' => 'required|file|mimes:pdf,PDF,png,PNG,jpg,JPEG,jpeg,JPG|max:2048',
            ]);
            return $data1;
        }
        return $data;
    }

    public function messages()
    {
        return [
            'first_witness_info_fname_in_english.required' => 'Please enter full name',
            'first_witness_info_fname_in_marathi.required' => 'Please enter full name',
            'first_witness_info_mobile_no.required' => 'Please enter mobile no',
            'first_witness_info_mobile_no.min' => 'Please enter 10 digit mobile no',
            'first_witness_info_mobile_no.max' => 'Please enter 10 digit mobile no',
            'first_witness_info_mobile_no.regex' => 'Please enter valid mobile no',
            'first_witness_info_dob.required' => 'Please select date of birth',
            'first_witness_info_age.required' => 'Please enter age',
            'first_witness_info_gender.required' => 'Please select gender',
            'first_witness_info_relation.required' => 'Please select relation',
            'first_witness_info_address_in_english.required' => 'Please enter address',
            'first_witness_info_address_in_marathi.required' => 'Please enter address',
            'first_witness_info_id_proof.required' => 'Please select id proof',
            'first_witness_info_witness_photos.required' => 'Please upload witness photo',
            'first_witness_info_witness_photos.mimes' => 'Only png, jpg and jpeg type file supported',
            'first_witness_info_witness_photos.max' => "Max 400kb file suppoted",
            'first_witness_info_upload_signatures.required' => 'Please upload witness photo',
            'first_witness_info_upload_signatures.mimes' => 'Only png, jpg and jpeg type file supported',
            'first_witness_info_upload_signatures.max' => "Max 400kb file suppoted",
            'first_witness_info_upload_documents.required' => 'Please upload witness file',
            'first_witness_info_upload_documents.mimes' => 'Only png, jpg, jpeg and pdf type file supported',
            'first_witness_info_upload_documents.max' => "Max 2mb file suppoted",
            'second_witness_info_fname_in_english.required' => 'Please enter full name',
            'second_witness_info_fname_in_marathi.required' => 'Please enter full name',
            'second_witness_info_mobile_no.required' => 'Please enter mobile no',
            'second_witness_info_mobile_no.min' => 'Please enter 10 digit mobile no',
            'second_witness_info_mobile_no.max' => 'Please enter 10 digit mobile no',
            'second_witness_info_mobile_no.regex' => 'Please enter valid mobile no',
            'second_witness_info_dob.required' => 'Please select date of birth',
            'second_witness_info_age.required' => 'Please enter age',
            'second_witness_info_gender.required' => 'Please select gender',
            'second_witness_info_relation.required' => 'Please select relation',
            'second_witness_info_address_in_english.required' => 'Please enter address',
            'second_witness_info_address_in_marathi.required' => 'Please enter address',
            'second_witness_info_id_proof.required' => 'Please select id proof',
            'second_witness_info_witness_photos.required' => 'Please upload witness photo',
            'second_witness_info_witness_photos.mimes' => 'Only png, jpg and jpeg type file supported',
            'second_witness_info_witness_photos.max' => "Max 400kb file suppoted",
            'second_witness_info_upload_signatures.required' => 'Please upload witness photo',
            'second_witness_info_upload_signatures.mimes' => 'Only png, jpg and jpeg type file supported',
            'second_witness_info_upload_signatures.max' => "Max 400kb file suppoted",
            'second_witness_info_upload_documents.required' => 'Please upload witness file',
            'second_witness_info_upload_documents.mimes' => 'Only png, jpg, jpeg and pdf type file supported',
            'second_witness_info_upload_documents.max' => "Max 2mb file suppoted",
            'third_witness_info_fname_in_english.required' => 'Please enter full name',
            'third_witness_info_fname_in_marathi.required' => 'Please enter full name',
            'third_witness_info_mobile_no.required' => 'Please enter mobile no',
            'third_witness_info_mobile_no.min' => 'Please enter 10 digit mobile no',
            'third_witness_info_mobile_no.max' => 'Please enter 10 digit mobile no',
            'third_witness_info_mobile_no.regex' => 'Please enter valid mobile no',
            'third_witness_info_dob.required' => 'Please select date of birth',
            'third_witness_info_age.required' => 'Please enter age',
            'third_witness_info_gender.required' => 'Please select gender',
            'third_witness_info_relation.required' => 'Please select relation',
            'third_witness_info_address_in_english.required' => 'Please enter address',
            'third_witness_info_address_in_marathi.required' => 'Please enter address',
            'third_witness_info_id_proof.required' => 'Please select id proof',
            'third_witness_info_witness_photos.required' => 'Please upload witness photo',
            'third_witness_info_witness_photos.mimes' => 'Only png, jpg and jpeg type file supported',
            'third_witness_info_witness_photos.max' => "Max 400kb file suppoted",
            'third_witness_info_upload_signatures.required' => 'Please upload witness photo',
            'third_witness_info_upload_signatures.mimes' => 'Only png, jpg and jpeg type file supported',
            'third_witness_info_upload_signatures.max' => "Max 400kb file suppoted",
            'third_witness_info_upload_documents.required' => 'Please upload witness file',
            'third_witness_info_upload_documents.mimes' => 'Only png, jpg, jpeg and pdf type file supported',
            'third_witness_info_upload_documents.max' => "Max 2mb file suppoted",
        ];
    }
}
