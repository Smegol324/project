<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Models\User;

class UniqueCombinedEmail implements Rule
{
    public function passes($attribute, $value)
    {
        [$email_temp, $email_address] = explode('@', $value);

        return !User::where('email', $value)->exists();
    }

    public function message()
    {
        return 'Комбинированный email уже существует.';
    }
}
