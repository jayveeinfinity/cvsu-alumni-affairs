<?php

namespace App\Http\Requests\Skill;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'label' => 'required|' .
                Rule::unique('skills')->where(function ($query) {
                    return $query->where('user_profile_id', auth()->user()->profile->id);
                }),
            'user_profile_id' => 'required|exists:user_profiles,id'
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'user_profile_id' => auth()->user()->profile->id,
        ]);
    }
    
    public function messages(): array
    { 
        return [
            'label.required' => 'The label field is required.',          
            'label.unique' => 'The label must be unique within your profile.',
        ];
    }
}
