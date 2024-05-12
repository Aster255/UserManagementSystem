<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class EditUserRequest extends FormRequest
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
            'first_name' => 'nullable|string|max:255',
            'last_name' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:255',
            'postal_code' => [
                'nullable',
                'string',
                'max:255',
                'regex:/\d{5}$|\d{4}$/',
            ],
            'phone_number' => [
                'nullable',
                'string',
                'max:255',
                'regex:/^09\d{9}$|^9\d{9}$/',
            ],
            'username' => 'nullable|string|max:255|unique:' . User::class,
            'email' => 'nullable|string|email|max:255|unique:' . User::class,
        ];
    }
}
