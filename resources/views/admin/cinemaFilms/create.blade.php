@extends('admin.layouts.main')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Додавання фільмів до кінотеатрів</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('admin.main')}}">Головна</a></li>
                            <li class="breadcrumb-item"><a href="{{route('admin.cinemaFilm.index')}}">Фільми в кінотеатрах</a></li>
                            <li class="breadcrumb-item active">Додавання</li>
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
                    <!-- Проверяем наличие городов -->
                    <form action="{{ route('admin.cinemaFilm.store') }}" method="POST" class="col-4">
                        @csrf
                        <div class="form-group">
                            <label>Оберіть кінотеатр</label>
                            <select name="cinema_id" class="form-control">
                                @foreach($cinemas as $cinema)
                                    <option value="{{ $cinema->id }}" {{ $cinema->id == old('cinema_id') ? 'selected' : '' }}>
                                        {{$cinema->id.".".$cities->where('id', $cinema->city_id)->first()->name.":".$cinema->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Оберіть фільм</label>
                            <select name="film_id" class="form-control">
                                @foreach($films as $film)
                                    <option value="{{ $film->id }}" {{ $film->id == old('film_id') ? 'selected' : '' }}>
                                        {{ $film->id.".".$film->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            @error('film_id')
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
