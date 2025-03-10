<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return (auth()->check() && (auth()->user()->hasRole('admin') or auth()->user()->hasRole('super-admin')) && auth()->user()->hasPermissionTo('create users'));
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|alpha_num|min:3|max:25',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:8|max:35',
            'phone' => 'required|numeric|unique:users,phone',
        ];
    }
}
