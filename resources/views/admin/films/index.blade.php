@extends('admin.layouts.main')
@section('content')
    <style>
        .film-image {
            max-width: 200px;
            max-height: 300px;
            object-fit: cover;
        }
    </style>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Фільми</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('admin.main')}}">Головна</a></li>
                            <li class="breadcrumb-item active">Фільми</li>
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
                    <div class="col-1">
                        <a href="{{route('admin.film.create')}}" class="btn btn-block btn-primary">Додати</a>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-10">
                        <div class="card">
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Назва</th>
                                        <th>Вартість перегляду</th>
                                        <th>Дата створення</th>
                                        <th>Картинка</th>
                                        <th>Довжина фільму</th>
                                        <th colspan="3">Дія</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($films as $film)
                                        <tr>
                                            <td>{{$film->id}}</td>
                                            <td>{{$film->name}}</td>
                                            <td>{{$film->cost}}</td>
                                            <td>{{$film->dateAdd}}</td>
                                            <td><img src="{{asset('storage/' . $film->image)}}" alt="Film Image" class="film-image"></td>
                                            <td>{{$film->length}}</td>
                                            <td><a href="{{route('admin.film.show', $film->id)}}"><i class="far fa-eye"></i></a></td>
                                            <td><a href="{{route('admin.film.edit', $film->id)}}" class="text-success"><i class="fas fa-pencil-alt"></i></a></td>
                                            <td>
                                                <form action="{{route('admin.film.delete', $film->id)}}" method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="border-0 bg-transparent">
                                                        <i class="fas fa-trash text-danger" role="button"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
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
