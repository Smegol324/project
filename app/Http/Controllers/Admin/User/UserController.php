<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\StoreRequest;
use App\Http\Requests\Admin\User\UpdateRequest;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }
    public function create()
    {
        return view('admin.users.create');
    }
    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $user = new User();
        $user->name = $data['name'];
        $user->surname = $data['surname'];
        $user->email = $data['email'];
        $user->password = $data['password_temp'];
        $user->role = $data['role'];
        $user->save();
        return redirect()->route('admin.user.index');
    }

    public function show(User $user)
    {
        return view('admin.users.show', compact('user'));
    }
    public function update(UpdateRequest $request,User $user)
    {
        $data = $request->validated();
        if (isset($data['email_temp']) && isset($data['email_address'])) {
            $user->email = $data['email_temp'] . '@' . $data['email_address'];
        }
        $user->name = $data['name'];
        $user->surname = $data['surname'];

        if ($request->filled('password_temp')) {
            $user->password = $data['password_temp'];
            $user->save();
        }
        $user->role = $data['role'];
        $user->save();
        return view('admin.users.show', compact('user'));
    }
    public function edit(User $user)
    {
        $emailParts = explode('@', $user->email);
        $email_temp = $emailParts[0];
        $email_address = $emailParts[1] ?? '';
        return view('admin.users.edit', compact('user','email_temp','email_address'));
    }
    public function delete(User $user)
    {
        $user->delete();
        return redirect()->route('admin.user.index');
    }
}
