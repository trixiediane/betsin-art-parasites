<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePasswordRequest extends FormRequest
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
            'old_password' => ['required', 'old_password_match'],
            'new_password' => [
                'required',
                'min:8',
                'regex:/^(?=.*[a-zA-Z])(?=.*\d)(?=.*[A-Z])(?=.*[^a-zA-Z\d]).*$/'
            ],
            'confirm_password' => ['required', 'same:new_password'],
        ];
    }
    public function messages()
    {
        return [
            'old_password.required' => 'Please enter the current password.',
            'old_password.old_password_match' => 'The current password is incorrect.',
            'new_password.required' => 'Please enter a new password.',
            'new_password.min' => 'The new password must be at least 8 characters.',
            'new_password.regex' => 'The new password must contain at least one character, one number, and one uppercase letter.',
            'confirm_password.required' => 'Confirm your password.',
            'confirm_password.same' => 'The confirmation password must match the new password.',
        ];
    }
}
