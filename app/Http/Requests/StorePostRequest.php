<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
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
            'user_id' => ['required', 'integer'],
            'title' => ['required', 'max:191', 'string'],
            'content' => ['required', 'max:191', 'string'],
            'image' => ['required'],
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Title is required.',
            'content.required' => 'Please create a content.',
            'image.required' => 'Image is required.'
        ];
    }
}
