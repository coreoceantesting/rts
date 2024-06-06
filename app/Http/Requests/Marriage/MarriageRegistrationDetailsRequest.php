<?php

namespace App\Http\Requests\Marriage;

use Illuminate\Foundation\Http\FormRequest;

class MarriageRegistrationDetailsRequest extends FormRequest
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
            'registration_details_form_filled_date' => 'required',
            'registration_details_marriage_date_in_english' => 'required',
            'registration_details_marriage_date_in_marathi' => 'required',
            'registration_details_marriage_place_in_english' => 'required',
            'registration_details_marriage_place_in_marathi' => 'required',
            'registration_details_couple_photos' => 'required|file|mimes:pdf,PDF,png,PNG,jpg,JPG,jpeg,JPEG|max:2048',
            'registration_details_is_widow' => 'required',
            'registration_details_is_previously_divorced' => 'required',
            'registration_details_is_marriage_intercaste' => 'required',
            'registration_details_wedding_card_images' => 'required|file|mimes:pdf,PDF|max:2048',
        ];
    }

    public function messages()
    {
        return [
            'registration_details_form_filled_date.required' => 'Please select form filled date',
            'registration_details_marriage_date_in_english.required' => 'Please select marriage date',
            'registration_details_marriage_date_in_marathi.required' => 'Please enter marriage date in marathi',
            'registration_details_marriage_place_in_english.required' => 'Please enter marriage place in english',
            'registration_details_marriage_place_in_marathi.required' => 'Please enter marriage place in marathi',
            'registration_details_couple_photos.required' => 'Please upload couple photo',
            'registration_details_couple_photos.mimes' => 'Pdf and image file only supported',
            'registration_details_couple_photos.max' => 'File should be less than 2mb',
            'registration_details_is_widow.required' => 'Please select Is Husband/Wife Widower/Widow',
            'registration_details_is_previously_divorced.required' => 'Please select Is Husband/Wife previously divorced',
            'registration_details_is_marriage_intercaste.required' => 'Please select marriage intercast',
            'registration_details_wedding_card_images.required' => 'Please select wedding card image',
            'registration_details_wedding_card_images.mimes' => 'Only pdf file supported',
            'registration_details_wedding_card_images.max' => 'File must be less than 2 mb',
        ];
    }
}
