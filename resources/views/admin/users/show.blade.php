@extends('admin.layouts.main')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6 d-flex align-items-center">
                        <h1 class="m-0 mr-2">{{$user->name}}</h1>
                        <a href="{{route('admin.user.edit', $user->id)}}" class="text-success"><i class="fas fa-pencil-alt"></i></a>
                        <form action="{{route('admin.user.delete', $user->id)}}" method="POST">
                            @csrf
                            @method('delete')
                            <button type="submit" class="border-0 bg-transparent">
                                <i class="fas fa-trash text-danger" role="button"></i>
                            </button>
                        </form>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('admin.main')}}">Головна</a></li>
                            <li class="breadcrumb-item"><a href="{{route('admin.user.index')}}">Користувачі</a></li>
                            <li class="breadcrumb-item active">{{$user->name}} (show)</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row mt-3">
                    <div class="col-6">
                        <div class="card">
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <tbody>
                                    <tr>
                                        <td>ID</td>
                                        <td>{{$user->id}}</td>
                                    </tr>
                                    <tr>
                                        <td>Ім'я</td>
                                        <td>{{$user->name}}</td>
                                    </tr>
                                    <tr>
                                        <td>Прізвище</td>
                                        <td>{{$user->surname}}</td>
                                    </tr>
                                    <tr>
                                        <td>Email</td>
                                        <td>{{$user->email}}</td>
                                    </tr>
                                    <tr>
                                        <td>Пароль</td>
                                        <td>{{$user->password}}</td>
                                    </tr>
                                    <tr>
                                        <td>Роль</td>
                                        <td>{{$user->role}}</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
