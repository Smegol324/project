@extends('admin.layouts.main')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Додавання кінотеатра</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('admin.main')}}">Головна</a></li>
                            <li class="breadcrumb-item"><a href="{{route('admin.cinema.index')}}">Кінотеатри</a></li>
                            <li class="breadcrumb-item active">Додавання кінотеатру</li>
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
                    @if($cities->isEmpty())
                        <div class="alert alert-warning">
                            <strong>Увага!</strong> Для додавання кінотеатра необхідно спочатку додати місто. <a href="{{ route('admin.city.create') }}">Додати місто</a>
                        </div>
                    @else
                        <form action="{{ route('admin.cinema.store') }}" method="POST" class="col-4">
                            @csrf
                            <div class="form-group">
                                <label>Назва кінотеатра</label>
                                <input type="text" class="form-control" name="name" placeholder="Введіть назву кінотеатру">
                                @error('name')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Оберіть місто</label>
                                <select name="city_id" class="form-control">
                                    @foreach($cities as $city)
                                        <option value="{{ $city->id }}" {{ $city->id == old('city_id') ? 'selected' : '' }}>
                                            {{ $city->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Кількість місць</label>
                                <input type="number" class="form-control" name="place_count" placeholder="Введіть кількість місць" value="{{ old('place_count', 1) }}">
                                @error('place_count')
                                    <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <input type="submit" class="btn btn-primary" value="Додати">
                        </form>
                    @endif
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
