<?php

namespace App\Http\Requests\Pwd\GrantingTelecom;

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
            'f_name' => 'required',
            'm_name' => 'required',
            'l_name' => 'required',
            'zone' => 'required',
            'mobile_num'=> 'required|min:10|max:10',
            'aadhar_num'=> 'required|min:12|max:12',
            'email' => 'required',
            'address' => 'required',
            'property_num'=> 'required',
            'road_type'=> 'required',
            'length_road'=> 'required',
            'width_road'=> 'required',
            'length_width'=> 'required',
            'digging_size'=> 'required',
            'start_point'=> 'required',
            'end_point'=> 'required',
            'latitude'=> 'required',
            'longitude'=> 'required',
            'is_correct_info'=>'required'
        ];
    }
}
