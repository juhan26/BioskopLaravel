<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateShowtimeRequest extends FormRequest
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
            'start_time' => ['required',Rule::unique('showtimes', 'start_time')->ignore($this->showtime->id)],
            'end_time' => ['required',Rule::unique('showtimes', 'end_time')->ignore($this->showtime->id)]
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
