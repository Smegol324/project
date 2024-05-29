@extends('admin.layouts.main')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Додавання користувачів</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('admin.main')}}">Головна</a></li>
                            <li class="breadcrumb-item"><a href="{{route('admin.user.index')}}">Користувачі</a></li>
                            <li class="breadcrumb-item active">Додавання користувачів</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <form action="{{ route('admin.user.store') }}" method="POST" class="col-4">
                        @csrf
                        <div class="form-group">
                            <label>Ім'я</label>
                            <input type="text" class="form-control" name="name" placeholder="Введіть ім'я користувача" value="{{ old('name') }}">
                            @error('name')
                                <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Прізвище</label>
                            <input type="text" class="form-control" name="surname" placeholder="Введіть прізвище користувача" value="{{ old('surname') }}">
                            @error('surname')
                                <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <div class="d-flex align-items-center">
                                <div class="form-group w-50 mr-2">
                                    <input type="text" class="form-control" name="email_temp" placeholder="Введіть Email користувача" value="{{ old('email_temp') }}">
                                </div>
                                <div class="form-group w-35 mr-2">
                                    <select name="email_address" class="form-control">
                                        <option value="gmail.com">@gmail.com</option>
                                        <option value="outlook.com">@outlook.com</option>
                                        <option value="student.khai.edu">@student.khai.edu</option>
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
                            <input type="text" class="form-control" name="password_temp" placeholder="Введіть пароль користувача" value="{{old('password_temp')}}">
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
                            <select name="role" class="form-control" value="{{old('role')}}">
                                <option value="user">Користувач</option>
                                <option value="admin">Адміністратор</option>
                            </select>
                            @error('role')
                                <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="Додати">
                        </div>
                    </form>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
