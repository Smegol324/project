@extends('admin.layouts.main')
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Зміна данних користувача</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('admin.main')}}">Головна</a></li>
                            <li class="breadcrumb-item"><a href="{{route('admin.user.index')}}">Користувачі</a></li>
                            <li class="breadcrumb-item active">{{$user->name}} (edit)</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <form action="{{ route('admin.user.update', $user->id) }}" method="POST" class="col-4">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <label>Ім'я</label>
                            <input type="text" class="form-control" name="name" placeholder="Введіть ім'я користувача" value="{{ old('name', $user->name) }}">
                            @error('name')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Прізвище</label>
                            <input type="text" class="form-control" name="surname" placeholder="Введіть прізвище користувача" value="{{ old('surname', $user->surname) }}">
                            @error('surname')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <div class="d-flex align-items-center">
                                <div class="form-group w-50 mr-2">
                                    <input type="text" class="form-control" name="email_temp" placeholder="Введіть Email користувача" value="{{ old('email_temp', $email_temp) }}">
                                </div>
                                <div class="form-group w-35 mr-2">
                                    <select name="email_address" class="form-control">
                                        <option value="gmail.com" {{ old('email_address', $email_address) == 'gmail.com' ? 'selected' : '' }}>@gmail.com</option>
                                        <option value="outlook.com" {{ old('email_address', $email_address) == 'outlook.com' ? 'selected' : '' }}>@outlook.com</option>
                                        <option value="student.khai.edu" {{ old('email_address', $email_address) == 'student.khai.edu' ? 'selected' : '' }}>@student.khai.edu</option>
                                    </select>
                                </div>
                            </div>
                            @error('email')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                            @error('email_temp')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                            @error('email_address')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Пароль</label>
                            <input type="text" class="form-control" name="password_temp" placeholder="Введіть пароль користувача" value="{{ old('password_temp') }}">
                            @error('password_temp')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Підтвердження паролю</label>
                            <input type="text" class="form-control" name="confirm_password" placeholder="Підтвердіть пароль користувача" value="{{ old('confirm_password') }}">
                            @error('confirm_password')
                                <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Роль</label>
                            <select name="role" class="form-control">
                                <option value="user" {{ old('role', $user->role) == 'user' ? 'selected' : '' }}>Користувач</option>
                                <option value="admin" {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}>Адміністратор</option>
                            </select>
                            @error('role')
                                <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="Змінити дані">
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
@endsection
