<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    protected $redirectTo;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->redirectTo = route('user.chooseCity');
    }
    protected function redirectTo()
    {
        if (auth()->user()->role == User::ROLE_ADMIN) {
            $this->redirectTo = route('admin.main');
        } else if (auth()->user()->role == User::ROLE_USER) {
            $this->redirectTo = route('user.chooseCity');
        }
        return $this->redirectTo;
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
}
