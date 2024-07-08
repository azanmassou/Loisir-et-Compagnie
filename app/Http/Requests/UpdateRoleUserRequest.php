<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRoleUserRequest extends FormRequest
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
            'role_id' => 'required|integer|exists:roles,id|unique:users,role_id|bail',
        ];
    }

    // public function messages()
    // {
    //     return [
    //         'role_id.unique' => 'Ce rôle vous est déjà attribué a cet utilisateur. Veuillez en choisir un autre.',
    //     ];
    // }

    
}
