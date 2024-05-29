@extends('admin.layouts.main')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6 d-flex align-items-center">
                        <h1 class="m-0 mr-2">{{$film->name}}</h1>
                        <a href="{{route('admin.film.edit', $film->id)}}" class="text-success"><i class="fas fa-pencil-alt"></i></a>
                        <form action="{{route('admin.film.delete', $film->id)}}" method="POST">
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
                            <li class="breadcrumb-item"><a href="{{route('admin.film.index')}}">Фільми</a></li>
                            <li class="breadcrumb-item active">{{$film->name}} (show)</li>
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
                                        <td>{{$film->id}}</td>
                                    </tr>
                                    <tr>
                                        <td>Назва</td>
                                        <td>{{$film->name}}</td>
                                    </tr>
                                    <tr>
                                        <td>Ціна</td>
                                        <td>{{$film->cost}}</td>
                                    </tr>
                                    <tr>
                                        <td>Дата створення</td>
                                        <td>{{$film->dateAdd}}</td>
                                    </tr>
                                    <tr>
                                        <td>Опис</td>
                                        <td>{{$film->description}}</td>
                                    </tr>
                                    <tr>
                                        <td>Картинка</td>
                                        <td><img src="{{asset('storage/' . $film->image)}}" alt="Film Image"></td>
                                    </tr>
                                    <tr>
                                        <td>Довжина</td>
                                        <td>{{$film->length}}</td>
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
