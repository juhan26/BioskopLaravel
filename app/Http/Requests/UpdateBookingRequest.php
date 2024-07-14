<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBookingRequest extends FormRequest
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
            'movie_id'=>['require','exists:movies,id'],
            'dateshowtime_id'=>['require','exists:dateshowtimes,id'],
            'seat_id'=>['require','exists:seats,id'],
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
