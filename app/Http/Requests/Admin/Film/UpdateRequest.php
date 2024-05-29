<?php

namespace App\Http\Requests\Admin\Film;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'name' => 'sometimes|required|string|max:45',
            'cost' => 'sometimes|required|integer',
            'dateAdd' => 'sometimes|required|date',
            'description' => 'sometimes|required|string',
            'image' => 'sometimes|required|file',
            'hours' => 'sometimes|required|integer',
            'minutes' => 'sometimes|required|integer',
            'seconds' => 'sometimes|required|integer',
        ];
    }
    public function messages(): array
    {
        return [
            'name.required' => 'Це поле є обов\'язковим для заповнення',
            'name.string' => 'Дані повинні відповідати строковому типу',
            'name.max' => 'Максимальна кількість символів цього поля 45',
            'cost.required' => 'Це поле є обов\'язковим для заповнення',
            'cost.integer' => 'Дані повинні відповідати цілочисельному типу',
            'cost.min' => 'Мінімальне значення цього поля 1',
            'cost.max' => 'Максимальне значення цього поля 500',
            'dateAdd.required' => 'Це поле є обов\'язковим для заповнення',
            'dateAdd.date' => 'Дані повинні відповідати типу дата',
            'description.required' => 'Це поле є обов\'язковим для заповнення',
            'description.string' => 'Дані повинні відповідати строковому типу',
            'image.required' => 'Це поле є обов\'язковим для заповнення',
            'image.file' => 'Дані повинні відповідати файловому типу',
            'hours.required' => 'Це поле є обов\'язковим для заповнення',
            'hours.integer' => 'Дані повинні відповідати цілочисельному типу',
            'hours.min' => 'Мінімальне значення цього поля 0',
            'hours.max' => 'Максимальне значення цього поля 5',
            'minutes.required' => 'Це поле є обов\'язковим для заповнення',
            'minutes.integer' => 'Дані повинні відповідати цілочисельному типу',
            'minutes.min' => 'Мінімальне значення цього поля 0',
            'minutes.max' => 'Максимальне значення цього поля 60',
            'seconds.required' => 'Це поле є обов\'язковим для заповнення',
            'seconds.integer' => 'Дані повинні відповідати цілочисельному типу',
            'seconds.min' => 'Мінімальне значення цього поля 0',
            'seconds.max' => 'Максимальне значення цього поля 60',
        ];
    }
}
