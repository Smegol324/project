@extends('admin.layouts.main')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Сесії в кінотеатрах</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('admin.main')}}">Головна</a></li>
                            <li class="breadcrumb-item active">Сесії</li>
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
                        <a href="{{route('admin.session.create')}}" class="btn btn-block btn-primary">Додати</a>
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
                                        <th>Назва кінотеатру</th>
                                        <th>Назва фільму</th>
                                        <th>Дата сеансу</th>
                                        <th>Час початку сеансу</th>
                                        <th>Кількість місць</th>
                                        <th>Кількість вільних місць</th>
                                        <th colspan="2">Дія</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($sessions as $session)
                                        <tr>
                                            <td>{{ $session->cinema_id.".".$session->film_id }}</td>
                                            <td>{{ $session->cinema->name }}</td>
                                            <td>{{ $session->film->name }}</td>
                                            <td>{{ $session->date_session }}</td>
                                            <td>{{ $session->time_session }}</td>
                                            <td>{{ $session->cinema->place_count }}</td>
                                            <td>{{\App\Models\Place::where('is_taken', 0)->where('id_session', $session->id)->count()}}</td>
                                            <td><a href="{{ route('admin.session.show', $session->id) }}"><i class="far fa-eye"></i></a></td>
                                            <td>
                                                <form action="{{ route('admin.session.delete', $session->id) }}" method="POST">
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
