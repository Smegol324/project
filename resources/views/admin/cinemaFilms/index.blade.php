@extends('admin.layouts.main')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Фільми в кінотеатрах</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('admin.main')}}">Головна</a></li>
                            <li class="breadcrumb-item active">Фільми в кінотеатрах</li>
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
                        <a href="{{route('admin.cinemaFilm.create')}}" class="btn btn-block btn-primary">Додати</a>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-6">
                        <div class="card">
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Назва кінотеатру</th>
                                        <th>Назва фільму</th>
                                        <th colspan="2">Дія</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($cinemaFilms as $cinemaFilm)
                                        <tr>
                                            <td>{{ $cinemaFilm->cinema_id.".".$cinemaFilm->film_id }}</td>
                                            <td>{{ $cinemaFilm->cinema->name }}</td>
                                            <td>{{ $cinemaFilm->film->name }}</td>
                                            <td><a href="{{ route('admin.cinemaFilm.show', [$cinemaFilm->cinema_id, $cinemaFilm->film_id]) }}"><i class="far fa-eye"></i></a></td>
                                            <td>
                                                <form action="{{ route('admin.cinemaFilm.delete', [$cinemaFilm->cinema_id, $cinemaFilm->film_id]) }}" method="POST">
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
