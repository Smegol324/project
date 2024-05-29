@extends('admin.layouts.main')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6 d-flex align-items-center">
                        <h1 class="m-0 mr-2">{{$cinemaFilm->cinema_id.".".$cinemaFilm->film_id.".".$cinemaFilm->cinema->name.".".$cinemaFilm->film->name}}</h1>
                        <form action="{{route('admin.cinemaFilm.delete', [$cinemaFilm->cinema_id, $cinemaFilm->film_id])}}" method="POST">
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
                            <li class="breadcrumb-item"><a href="{{route('admin.cinemaFilm.index')}}">Фільми в кінотеатрах</a></li>
                            <li class="breadcrumb-item active">Перегляд</li>
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
                                        <td>{{$cinemaFilm->cinema_id.".".$cinemaFilm->film_id}}</td>
                                    </tr>
                                    <tr>
                                        <td>Кінотеатр</td>
                                        <td>{{$cinemaFilm->cinema->name}}</td>
                                    </tr>
                                    <tr>
                                        <td>Фільм</td>
                                        <td>{{$cinemaFilm->film->name}}</td>
                                    </tr>
                                    <tr>
                                        <td>Картинка</td>
                                        <td><img src="{{asset('storage/' . $cinemaFilm->film->image)}}" alt="Film Image"></td>
                                    </tr>
                                    <tr>
                                        <td>Тривалість</td>
                                        <td>{{$cinemaFilm->film->length}}</td>
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
