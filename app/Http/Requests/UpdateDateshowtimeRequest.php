<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateDateshowtimeRequest extends FormRequest
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
    public function rules()
    {
        return [
            'movie_id' => 'required|exists:movies,id',
            'date_id' => 'required|exists:dates,id',
            'showtime_id' => [
                'required',
                Rule::unique('dateshowtimes')->ignore($this->route('dateshowtime'))->where(function ($query) {
                    return $query->where('movie_id', $this->movie_id)
                                 ->where('showtime_id', $this->showtime_id);
                }),
            ],
        ];
    }

    public function messages()
    {
        return [
            'showtime_id.unique' => 'Date showtime sudah di gunakan dengan movie yang sama',
        ];
    }
}
