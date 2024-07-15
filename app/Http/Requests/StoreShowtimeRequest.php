<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreShowtimeRequest extends FormRequest
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
            'start_time' => ['required','unique:showtimes,start_time'],
            'end_time' => ['required','unique:showtimes,end_time']
        ];
    }
    public function messages()
    {
        return [
            'required' => 'Attribute wajib diisi.',
            'unique' => 'Attribute sudah ada.',
        ];
    }
}
