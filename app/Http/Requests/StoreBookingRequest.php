<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBookingRequest extends FormRequest
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
            'movie_id'=>['required','exists:movies,id'],
            'dateshowtime_id'=>['required','exists:dateshowtimes,id'],
            'seat_id'=>['required','exists:seats,id'],
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Field :attribute wajib diisi.',
            'exists' => 'Field :attribute tidak valid.',
        ];
    }
}
