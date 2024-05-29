<?php
namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'surname' => 'required|string',
            'email_temp' => 'required|string',
            'email_address' => 'required|string',
            'password_temp' => 'nullable|string',
            'confirm_password' => 'nullable|string|same:password_temp',
            'role' => 'required|string',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Це поле є обов\'язковим для заповнення',
            'name.string' => 'Дані повинні відповідати строковому типу',
            'surname.required' => 'Це поле є обов\'язковим для заповнення',
            'surname.string' => 'Дані повинні відповідати строковому типу',
            'email_temp.required' => 'Це поле є обов\'язковим для заповнення',
            'email_temp.string' => 'Дані повинні відповідати строковому типу',
            'email_address.required' => 'Це поле є обов\'язковим для заповнення',
            'email_address.string' => 'Дані повинні відповідати можливим email',
            'password_temp.required' => 'Це поле є обов\'язковим для заповнення',
            'password_temp.string' => 'Дані повинні відповідати строковому типу',
            'confirm_password.required' => 'Це поле є обов\'язковим для заповнення',
            'confirm_password.string' => 'Дані повинні відповідати строковому типу',
            'confirm_password.same' => 'Дані повинні співпадати з введеним паролем',
            'role.required' => 'Це поле є обов\'язковим для заповнення',
            'role.string' => 'Дані повинні відповідати строковому типу',
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'email' => $this->email_temp . '@' . $this->email_address,
        ]);
    }
}

