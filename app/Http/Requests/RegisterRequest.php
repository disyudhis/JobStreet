<?php

namespace App\Http\Requests;


class RegisterRequest extends ApiRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'usertype' => 'required|max:1',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8'

        ];
    }
}
