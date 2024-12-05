<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UploadBukuRequest extends FormRequest
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
            'title' => 'required',
            'category_id' => 'required',
            'body' => 'required',
            'author_id' => 'required',
            'cover' => 'nullable|image|mimes:jpg,png|max:2048', // Validasi untuk cover
            'type' => 'nullable|in:rangkuman,resensi', // Validasi tipe
            'is_audited' => 'nullable|boolean', // Validasi boolean
        ];
    }
}
