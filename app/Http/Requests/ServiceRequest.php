<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServiceRequest extends FormRequest
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
        if ($this->edit_model_id) {
            return [
                'name' => 'required',
                'is_parent' => 'required',
                'images' => 'nullable|file|mimes:png,PNG,jpg,JPEG,jpeg,JPG|max:2048',
            ];
        } else {
            return [
                'name' => 'required',
                'is_parent' => 'required',
                'images' => 'nullable|file|mimes:png,PNG,jpg,JPEG,jpeg,JPG|max:2048',
            ];
        }
    }

    public function messages()
    {
        return [
            'name.required' => 'Please enter name',
            'is_parent.required' => 'Please select is parent',
            'images.required' => 'Please select image',
            'images.file' => 'Please select validated file',
            'images.mimes' => 'File should me png and jpg',
            'images.max' => 'File should be less than 2mb',
        ];
    }
}
