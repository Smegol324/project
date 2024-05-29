@extends('admin.layouts.main')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Головна</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Головна</li>
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
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{$data['usersCount']}}</h3>

                            <p>Користувачі</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-regular fa-users"></i>
                        </div>
                        <a href="{{route('admin.user.index')}}" class="small-box-footer">Детальніше <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{$data['citiesCount']}}</h3>

                            <p>Міста</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-regular fa-city"></i>
                        </div>
                        <a href="{{route('admin.city.index')}}" class="small-box-footer">Детальніше <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>{{$data['cinemasCount']}}</h3>

                            <p>Кінотеатри</p>
                        </div>
                        <div class="icon">
                            <i class="far fa-regular fa-building"></i>
                        </div>
                        <a href="{{route('admin.cinema.index')}}" class="small-box-footer">Детальніше <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>{{$data['filmsCount']}}</h3>

                            <p>Фільми</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-regular fa-film"></i>
                        </div>
                        <a href="{{route('admin.film.index')}}" class="small-box-footer">Детальніше <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-gradient-indigo">
                        <div class="inner">
                            <h3>{{$data['cinemaHasFilmsCount']}}</h3>

                            <p>Фільми в кінотеатрах</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-regular fa-book"></i>
                        </div>
                        <a href="{{route('admin.cinemaFilm.index')}}" class="small-box-footer">Детальніше <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-secondary">
                        <div class="inner">
                            <h3>{{$data['sessionsCount']}}</h3>

                            <p>Сесії в кінотеатрах</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-regular fa-video"></i>
                        </div>
                        <a href="{{route('admin.session.index')}}" class="small-box-footer">Детальніше <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-light">
                        <div class="inner">
                            <h3>{{$data['orderHistoriesCount']}}</h3>

                            <p>Історія замовлень квитків</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-regular fa-money-check"></i>
                        </div>
                        <a href="{{route('admin.orderHistory.index')}}" class="small-box-footer">Детальніше <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->

                <!-- ./col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
