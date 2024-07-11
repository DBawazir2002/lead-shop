<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return (auth()->check() && (auth()->user()->hasRole('admin') or auth()->user()->hasRole('super-admin')) && auth()->user()->hasPermissionTo('edit users'));
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'sometimes|required|alpha_num|min:3|max:25',
            // 'email' => 'sometimes|required|email|unique:users,email,except,'.$this->id,
            'email' => ['sometimes', 'required','email', Rule::unique('users')->ignore($this->user)],
            'password' => 'sometimes|required|confirmed|min:8|max:35',
            'phone' => ['sometimes', 'required','numeric', Rule::unique('users')->ignore($this->user)],

        ];
    }
}
