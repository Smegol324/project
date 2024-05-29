@extends('admin.layouts.main')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6 d-flex align-items-center">
                        <h1 class="m-0 mr-2">{{$session->cinema_id.".".$cinemas->where('id', $session->cinema_id)->first()->name." ".$session->film_id.".".$films->where('id', $session->film_id)->first()->name}}</h1>
                        <form action="{{ route('admin.session.delete', $session->id) }}" method="POST">
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
                            <li class="breadcrumb-item"><a href="{{route('admin.session.index')}}">Сесії</a></li>
                            <li class="breadcrumb-item active">Перегляд сесії</li>
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
                                        <td>{{$session->id}}</td>
                                    </tr>
                                    <tr>
                                        <td>Дата сеансу</td>
                                        <td>{{$session->date_session}}</td>
                                    </tr>
                                    <tr>
                                        <td>Час початку сеансу</td>
                                        <td>{{$session->time_session}}</td>
                                    </tr>
                                    <tr>
                                        <td>Кількість місць</td>
                                        <td>{{$session->cinema->place_count}}</td>
                                    </tr>
                                    <tr>
                                        <td>Кількість вільних місць</td>
                                        <td>{{\App\Models\Place::where('is_taken', 0)->where('id_session', $session->id)->count()}}</td>
                                    </tr>
                                    <tr>
                                        <td>Місця</td> <!-- Заголовок "Місця" -->
                                        <td>
                                            <div class="seat-container">
                                                @php
                                                    $placesCount = count($places);
                                                    $seatsPerRow = 10; // Количество мест в строке
                                                    $rowsCount = ceil($placesCount / $seatsPerRow); // Количество строк
                                                    $placesIndex = 0; // Индекс текущего места
                                                    $seatSize = 25; // Размер квадратика места (в пикселях)
                                                @endphp

                                                @for ($row = 0; $row < $rowsCount; $row++)
                                                    <div class="row justify-content-center">
                                                        @php
                                                            // Определяем количество мест в текущей строке
                                                            $seatsInThisRow = min($seatsPerRow, $placesCount - $row * $seatsPerRow);
                                                            // Определяем отступ слева для центрирования
                                                            $leftMargin = ($seatsPerRow - $seatsInThisRow) * $seatSize / 2;
                                                        @endphp

                                                        <div class="col">
                                                            <div class="row" style="margin-left: {{$leftMargin}}px;">
                                                                @for ($col = 0; $col < $seatsInThisRow; $col++)
                                                                    @php
                                                                        // Получаем текущее место из массива
                                                                        $place = $places[$placesIndex] ?? null;

                                                                        // Определяем класс цвета в зависимости от статуса места
                                                                        $colorClass = '';
                                                                        $status = '';
                                                                        if ($place) {
                                                                            switch ($place->is_taken) {
                                                                                case 0:
                                                                                    $colorClass = 'bg-success'; // Зеленый для свободного места
                                                                                    $status = 'F'; // Free
                                                                                    break;
                                                                                case 1:
                                                                                    $colorClass = 'bg-warning'; // Желтый для забронированного места
                                                                                    $status = 'R'; // Reserved
                                                                                    break;
                                                                                case 2:
                                                                                    $colorClass = 'bg-danger'; // Красный для занятого места
                                                                                    $status = 'O'; // Occupied
                                                                                    break;
                                                                                default:
                                                                                    $colorClass = ''; // Пустой цвет, если статус не определен
                                                                                    $status = 'U'; // Undefined
                                                                            }
                                                                        }
                                                                    @endphp

                                                                    <div class="col">
                                                                        <div class="seat {{$colorClass}} text-center" style="border-radius: 5px; width: {{$seatSize}}px; height: {{$seatSize}}px; margin: 2px;"><span>{{$status}}</span></div>
                                                                    </div>

                                                                    @php
                                                                        // Увеличиваем индекс текущего места
                                                                        $placesIndex++;
                                                                    @endphp
                                                                @endfor
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endfor
                                            </div>
                                        </td>

                                    </tr>
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
