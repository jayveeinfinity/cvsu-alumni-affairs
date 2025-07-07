<?php

namespace App\Http\Requests\AlumniProfile;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'student_number' => 'required|digits:9|unique:alumni_profiles,student_number',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'sex' => 'required|in:male,female',
            'course' => 'required|string|max:255',
            'year_graduated' => 'required|digits:4|integer|min:1900'
        ];
    }
    
    /**
     * Get the custom messages for validator errors.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'student_number.required' => 'The student number field is required.',
            'student_number.digits' => 'The student number must be exactly 9 characters.',
            'student_number.exists' => 'Alumni already exists on the masterlist.',
            'first_name.required' => 'The first name field is required.',
            'last_name.required' => 'The last name field is required.',
            'sex.required' => 'The sex field is required.',
            'sex.in' => 'The sex field must be either male or female.',
            'course.required' => 'The course field is required.',
            'year_graduated.required' => 'The year graduated field is required.',
            'year_graduated.digits' => 'The year graduated must be exactly 4 digits.'
        ];
    }
}