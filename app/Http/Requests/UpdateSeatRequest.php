<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateSeatRequest extends FormRequest
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
            'seat_number' => ['required', 'max-length:3', Rule::unique('seats','seat_number')->ignore($this->seat->id)]
        ];
    }
    public function messages(): array
    {
        return [
            'required' => 'Field :attribute wajib diisi.',
            'unique' => 'Field :attribute sudah ada di database dan harus unik.',
        ];
    }
}
