@extends('admin.layouts.main')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Додавання фільму</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('admin.main')}}">Головна</a></li>
                            <li class="breadcrumb-item"><a href="{{route('admin.film.index')}}">Фільми</a></li>
                            <li class="breadcrumb-item active">Додавання фільму</li>
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
                    <form action="{{ route('admin.film.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group w-75">
                            <label>Назва фільму</label>
                            <input type="text" class="form-control" name="name" placeholder="Введіть назву фільму" value="{{ old('name') }}">
                            @error('name')
                                <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group w-75">
                            <label>Вартість перегляду</label>
                            <input type="number" class="form-control" name="cost" placeholder="Введіть вартість перегляду" value="{{ old('cost') }}">
                            @error('cost')
                                <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group w-75">
                            <label>Дата створення фільму</label>
                            <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                <input type="text" name="dateAdd" class="form-control datetimepicker-input" data-target="#reservationdate" value="{{ old('dateAdd') }}">
                                <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>
                            </div>
                            @error('dateAdd')
                                <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Опис фільму</label>
                            <textarea id="summernote" name="description">{{ old('description') }}</textarea>
                            @error('description')
                                <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group w-75">
                            <label for="exampleInputFile">Картинка фільму</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="exampleInputFile" name="image">
                                    <label class="custom-file-label" for="exampleInputFile">Оберіть файл</label>
                                </div>
                                <div class="input-group-append">
                                    <span class="input-group-text">Завантажити</span>
                                </div>
                            </div>
                            @error('image')
                                <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group w-75">
                            <label>Довжина фільму</label>
                            <div class="d-flex align-items-center">
                                <div class="form-group w-25 mr-2">
                                    <input type="number" class="form-control" name="hours" placeholder="Години" value="{{ old('hours') }}">
                                </div>
                                <div class="form-group w-25 mr-2">
                                    <input type="number" class="form-control" name="minutes" placeholder="Хвилини" value="{{ old('minutes') }}">
                                </div>
                                <div class="form-group w-25 mr-2">
                                    <input type="number" class="form-control" name="seconds" placeholder="Секунди" value="{{ old('seconds') }}">
                                </div>
                            </div>
                            @error('hours')
                                <div class="text-danger">{{$message}}</div>
                            @enderror
                            @error('minutes')
                                <div class="text-danger">{{$message}}</div>
                            @enderror
                            @error('seconds')
                                <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group ">
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
