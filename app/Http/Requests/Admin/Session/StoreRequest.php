<?php

namespace App\Http\Requests\Admin\Session;

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
            'group_id' => 'required|string',
            'date_session' => 'required|date',
            'hours' => 'required|integer|min:8|max:20',
            'minutes' => 'required|integer|min:0|max:60',
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
            'group_id.required' => 'Це поле є обов\'язковим для заповнення',
            'group_id.string' => 'Дані повинні відповідати строковому типу',
            'date_session.required' => 'Це поле є обов\'язковим для заповнення',
            'date_session.date' => 'Дані повинні відповідати типу дата',
            'hours.required' => 'Це поле є обов\'язковим для заповнення',
            'hours.integer' => 'Дані повинні відповідати цілочисельному типу',
            'hours.min' => 'Мінімальне значення цього поля 8',
            'hours.max' => 'Максимальне значення цього поля 20',
            'minutes.required' => 'Це поле є обов\'язковим для заповнення',
            'minutes.integer' => 'Дані повинні відповідати цілочисельному типу',
            'minutes.min' => 'Мінімальне значення цього поля 0',
            'minutes.max' => 'Максимальне значення цього поля 60',
        ];
    }
}
