<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChangePasswordRequest extends FormRequest
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
            //
            'current' => ['required', 'min:6'],
            // 'password' => ['required','min:4'],
            // 'passwords' => ['required','min:4'],
            'password' => 'min:6|required_with:passwords|same:passwords|confirmed',
            'passwords' => 'min:6'
        ];
    }
}
