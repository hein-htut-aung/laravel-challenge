<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
          'email' => 'required|email',
          'password' => 'required|min:8'
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'email is required',
            'email.email' => 'email is invalid',
            'password.required' => 'password is required',
            'password.min' => 'password is invalid',
        ];
    }

    public function response(array $errors): \Illuminate\Http\JsonResponse
    {
        // Always return JSON.
        return response()->json($errors, 422);
    }
}
