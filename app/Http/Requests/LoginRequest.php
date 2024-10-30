<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'email' => 'required|email',
            'password' => 'required|min:8', // Ubah dari min:5 menjadi min:8
        ];
    }


    public function messages(): array
    {
        return [
            'email.required' => 'Email tidak boleh dikosongkan',
            'email.email' => 'Format email tidak valid',
            'password.min' => 'Minimal password 8 karakter', // Sesuaikan dengan aturan min:8
            'password.required' => 'Password tidak boleh kosong'
        ];
    }
}
