<?php

namespace App\Http\Requests\Admin\Cinema;

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
            'name' => 'required|string|max:255',
            'city_id' => 'required|exists:cities,id',
            'place_count' => 'required|integer|min:1|max:100',
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
            'name.required' => 'Це поле є обов\'язковим для заповнення',
            'name.string' => 'Дані повинні відповідати строковому типу',
            'place_count.required' => 'Це поле є обов\'язковим для заповнення',
            'place_count.integer' => 'Дані повинні відповідати цілочисельному типу',
            'place_count.min' => 'Мінімальне значення цього поля 1',
            'place_count.max' => 'Максимальне значення цього поля 100',
        ];
    }
}
