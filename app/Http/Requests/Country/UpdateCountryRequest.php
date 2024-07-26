<?php

namespace App\Http\Requests\Country;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCountryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return (auth()->check() && (auth()->user()->hasRole('admin') or auth()->user()->hasRole('super-admin')) && auth()->user()->hasPermissionTo('edit countries'));
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['sometimes', 'required','string', Rule::unique('countries')->ignore($this->country)],
            'code' => ['sometimes', 'required','string', Rule::unique('countries')->ignore($this->country)],
        ];
    }
}
