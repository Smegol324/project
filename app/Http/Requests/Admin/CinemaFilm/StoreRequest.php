<?php

namespace App\Http\Requests\Admin\CinemaFilm;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'cinema_id' => 'required|exists:cinemas,id',
            'film_id' => 'required|exists:films,id|unique:cinema_has_films,film_id,NULL,id,cinema_id,' . $this->cinema_id,
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'cinema_id.required' => 'Це поле є обов\'язковим для заповнення',
            'cinema_id.exists' => 'В таблиці кінотеатри немає такого запису',
            'film_id.required' => 'Це поле є обов\'язковим для заповнення',
            'film_id.exists' => 'В таблиці фільми немає такого запису',
            'film_id.unique' => 'В цьому кінотеатрі вже йде показ цього фільму',
        ];
    }
}
