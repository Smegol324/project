@extends('admin.layouts.main')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Додавання сеансів до кінотеатрів</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('admin.main')}}">Головна</a></li>
                            <li class="breadcrumb-item"><a href="{{route('admin.session.index')}}">Сесії</a></li>
                            <li class="breadcrumb-item active">Додавання сесій</li>
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
                    <form action="{{ route('admin.session.store') }}" method="POST" class="col-4">
                        @csrf
                        <div class="form-group">
                            <label>Оберіть кінотеатр та фільм</label>
                            <select name="group_id" class="form-control">
                                @foreach($cinemaHasFilms as $cinemaHasFilm)
                                    <option value="{{ $cinemaHasFilm->cinema_id.".".$cinemaHasFilm->film_id }}">
                                        {{$cinemaHasFilm->cinema_id.".".$cinemas->where('id', $cinemaHasFilm->cinema_id)->first()->name." ".
                                        $cinemaHasFilm->film_id.".".$films->where('id', $cinemaHasFilm->film_id)->first()->name}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            @error('group_id')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group w-75">
                            <label>Оберіть дату проведення кіносеансу</label>
                            <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                <input type="text" name="date_session" class="form-control datetimepicker-input" data-target="#reservationdate" value="{{ old('date_session') }}">
                                <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>
                            </div>
                            @error('dateAdd')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group w-75">
                            <label>Оберіть час проведення кіносеансу</label>
                            <div class="d-flex align-items-center">
                                <div class="form-group w-25 mr-2">
                                    <input type="number" class="form-control" name="hours" placeholder="Години" value="{{ old('hours') }}">
                                </div>
                                <div class="form-group w-25 mr-2">
                                    <input type="number" class="form-control" name="minutes" placeholder="Хвилини" value="{{ old('minutes') }}">
                                </div>
                            </div>
                            @error('hours')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                            @error('minutes')
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
