@extends('admin.layouts.main')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Міста</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.main')}}">Головна</a></li>
                        <li class="breadcrumb-item active">Міста</li>
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
                    <a href="{{route('admin.city.create')}}" class="btn btn-block btn-primary">Додати</a>
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
                                    <th>Назва</th>
                                    <th colspan="3">Дія</th>
                                </tr>
                                </thead>
                                @foreach($cities as $city)
                                    <tbody>
                                    <tr>
                                        <td>{{$city->id}}</td>
                                        <td>{{$city->name}}</td>
                                        <td><a href="{{route('admin.city.show', $city->id)}}"><i class="far fa-eye"></i></a></td>
                                        <td><a href="{{route('admin.city.edit', $city->id)}}" class="text-success"><i class="fas fa-pencil-alt"></i></a></td>
                                        <td>
                                            <form action="{{route('admin.city.delete', $city->id)}}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="border-0 bg-transparent">
                                                    <i class="fas fa-trash text-danger" role="button"></i>
                                                </button>
                                            </form>
                                        </td>

                                        <i class=""></i>
                                    </tr>
                                    </tbody>
                                @endforeach
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
