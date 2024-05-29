@extends('admin.layouts.main')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Зміна данних про місто</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.main')}}">Головна</a></li>
                        <li class="breadcrumb-item"><a href="{{route('admin.city.index')}}">Міста</a></li>
                        <li class="breadcrumb-item active">{{$city->name}} (edit)</li>
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
                <form action="{{route('admin.city.update', $city->id)}}" method="POST" class="col-4">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <label>Назва міста</label>
                        <input type="text" class="form-control" name="name" placeholder="Введіть назву міста" value="{{$city->name}}">
                        @error('name')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <input type="submit" class="btn btn-primary" value="Змінити дані">
                </form>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
