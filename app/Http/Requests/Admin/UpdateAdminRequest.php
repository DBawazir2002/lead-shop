<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateAdminRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return (auth()->check() && auth()->user()->hasRole('super-admin') && auth()->user()->hasPermissionTo('edit admins'));
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
            'email' => ['sometimes', 'required','email', Rule::unique('admins')->ignore($this->admin)],
            'password' => 'sometimes|required|confirmed|min:8|max:35',
            'level' => ['sometimes', 'required','string'],
        ];
    }
}
