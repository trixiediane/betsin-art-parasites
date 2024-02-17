<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'name' => ['required', 'max:191', 'string'],
            'username' => ['required', 'max:191', 'string'],
            'email' => ['required', 'max:191', 'string', 'email']
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Name is required. Please enter your name.',
            'username.required' => 'Username is required.',
            'email' => 'Email is required'
        ];
    }
}
