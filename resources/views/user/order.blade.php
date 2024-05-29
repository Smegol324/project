<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $film->name }}</title>
    <link rel="stylesheet" href="{{ asset('assets/vendors/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <style>
        .foi-header {
            background-color: rgb(98, 6, 168);
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
        }

        .film-details {
            display: flex;
            align-items: center;
        }

        .film-details img {
            max-width: 200px;
            margin-right: 20px;
        }

        .seat-container {
            width: 80%;
            background-color: rgb(246, 235, 255);
            margin: auto;
            padding: 20px;
        }
        .visually-hidden {
            position: absolute;
            overflow: hidden;
            clip: rect(0 0 0 0);
            height: 1px;
            width: 1px;
            margin: -1px;
            padding: 0;
            border: 0;
        }
    </style>
</head>

<body>

<header class="foi-header">
    <a href="{{ route('user.main',compact('cinema_id','city_id')) }}" class="btn btn-secondary">На главную</a>
    <form action="{{ route('logout') }}" method="post">
        @csrf
        <button class="btn btn-secondary" type="submit">Выйти</button>
    </form>
</header>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="film-details">
                <img src="{{ asset('storage/' . $film->image) }}" alt="Изображение фильма">
                <div>
                    <h1>{{ $film->name }}</h1>
                    <p>Дата створення фільму: {{ $film->dateAdd }}</p>
                    <p>Вартість: {{ $film->cost }}</p>
                    <p>Тривалість: {{ $film->length }} минут</p>
                    <p>Опис: {!! $film->description !!}</p>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 mx-auto">
            <h2 class="text-center">Сеанс</h2>
            <table class="table table-success table-striped-columns" style="background-color: rgb(246, 235, 255);">
                <tbody>
                <tr style="background-color: rgb(246, 235, 255);">
                    <th scope="col">ID</th>
                    <th scope="row">{{ $session->cinema_id.".".$session->film_id }}</th>
                </tr>
                <tr style="background-color: rgb(246, 235, 255);">
                    <th scope="col">Кінотеатр</th>
                    <td>{{ $session->cinema->name }}</td>
                </tr>
                <tr style="background-color: rgb(246, 235, 255);">
                    <th scope="col">Дата сеансу</th>
                    <td>{{ $session->date_session }}</td>
                </tr>
                <tr style="background-color: rgb(246, 235, 255);">
                    <th scope="col">Час проведення сеансу</th>
                    <td>{{ $session->time_session }}</td>
                </tr>
                <tr style="background-color: rgb(246, 235, 255);">
                    <th scope="col">Всього міст</th>
                    <td>{{ $session->cinema->place_count }}</td>
                </tr>
                <tr style="background-color: rgb(246, 235, 255);">
                    <th scope="col">Вільні міста</th>
                    <td>{{\App\Models\Place::where('is_taken', 0)->where('id_session', $session->id)->count()}}</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 mx-auto">
            <h2 class="text-center">Місця</h2>
            <div class="seat-container">
                <form action="{{ route('user.orderStore') }}" method="post">
                    <div class="row justify-content-center">
                        @php
                            $seatNumber = 1;
                        @endphp
                        @foreach ($places as $place)
                            @if (($seatNumber - 1) % 10 == 0)
                    </div><div class="row justify-content-center">
                        @endif
                        <div class="col-md-1">
                            @if ($place->is_taken == 0)
                                <input type="checkbox" name="selected_seats[]" value="{{ $place->id }}" id="seat{{ $place->id }}" class="btn-check visually-hidden" autocomplete="off">
                                <label class="btn btn-success" for="seat{{ $place->id }}">{{ $seatNumber }}</label>
                            @elseif ($place->is_taken == 1)
                                <input type="checkbox" name="selected_seats[]" value="{{ $place->id }}" id="seat{{ $place->id }}" class="btn-check visually-hidden" autocomplete="off" checked disabled>
                                <label class="btn btn-warning" for="seat{{ $place->id }}">{{ $seatNumber }}</label>
                            @else
                                <input type="checkbox" name="selected_seats[]" value="{{ $place->id }}" id="seat{{ $place->id }}" class="btn-check visually-hidden" autocomplete="off" disabled>
                                <label class="btn btn-danger" for="seat{{ $place->id }}">{{ $seatNumber }}</label>
                            @endif
                            @php
                                $seatNumber++;
                            @endphp
                        </div>
                        @endforeach
                    </div>

                    <input type="hidden" name="film_id" value="{{ $film->id }}">
                    <input type="hidden" name="cinema_id" value="{{ $cinema_id }}">
                    <input type="hidden" name="city_id" value="{{ $city_id }}">
                    <input type="hidden" name="session_id" value="{{ $session->id }}">

                    <div class="text-center mt-4">
                        @csrf
                        <button type="submit" class="btn btn-danger">Забронировать</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<footer class="foi-footer">
    <div class="container">
        <div class="row footer-content">
            <div class="col-xl-6 col-lg-7 col-md-8">
                <h2 class="mb-0">Хочете дізнатися більше чи просто маєте запитання? напишіть нам.</h2>
            </div>
            <div class="col-md-4 col-lg-5 col-xl-6 py-3 py-md-0 d-md-flex align-items-center justify-content-end">
                <a href="contact.html" class="btn btn-danger btn-lg">Форма контакту</a>
            </div>
        </div>
        <div class="row footer-widget-area">
            <div class="col-md-3">
                <div class="py-3">
                    <img src="{{ asset('assets/images/logo-white.svg') }}" alt="FOI">
                </div>
                <p class="font-os font-weight-semibold mb3">Отримайте наш мобільний додаток</p>
                <div>
                    <button class="btn btn-app-download mr-2"><img src="{{ asset('assets/images/ios.svg') }}" alt="App store"></button>
                    <button class="btn btn-app-download"><img src="{{ asset('assets/images/android.svg') }}" alt="play store"></button>
                </div>
            </div>
            <div class="col-md-3 mt-3 mt-md-0">
                <nav>
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a href="#!" class="nav-link">Обліковий запис</a>
                        </li>
                        <li class="nav-item">
                            <a href="#!" class="nav-link">Мої завдання</a>
                        </li>
                        <li class="nav-item">
                            <a href="#!" class="nav-link">Проекти</a>
                        </li>
                        <li class="nav-item">
                            <a href="#!" class="nav-link">Редагувати профіль</a>
                        </li>
                        <li class="nav-item">
                            <a href="#!" class="nav-link">Діяльність</a>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="col-md-3 mt-3 mt-md-0">
                <nav>
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a href="#!" class="nav-link">Про нас</a>
                        </li>
                        <li class="nav-item">
                            <a href="#!" class="nav-link">Послуги</a>
                        </li>
                        <li class="nav-item">
                            <a href="#!" class="nav-link">Кар'єра</a>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="col-md-3 mt-3 mt-md-0">
                <p>
                    &copy;<a href="https://www.bootstrapdash.com" target="_blank" rel="noopener noreferrer" class="text-reset">BootstrapDash</a>.
                </p>
                <p>Всі права захищені</p>
                <nav class="social-menu">
                    <a href="#!"><img src="{{ asset('assets/images/facebook.svg') }}" alt="facebook"></a>
                    <a href="#!"><img src="{{ asset('assets/images/instagram.svg') }}" alt="instagram"></a>
                    <a href="#!"><img src="{{ asset('assets/images/twitter.svg') }}" alt="twitter"></a>
                    <a href="#!"><img src="{{ asset('assets/images/youtube.svg') }}" alt="youtube"></a>
                </nav>
            </div>
        </div>
    </div>
</footer>

<script src="{{asset('assets/vendors/jquery/jquery.min.js')}}"></script>
<script src="{{asset('assets/vendors/popper.js/popper.min.js')}}"></script>
<script src="{{asset('assets/vendors/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<script>
    var checkboxes = document.querySelectorAll('.btn-check');
    checkboxes.forEach(function(checkbox) {
        checkbox.addEventListener('change', function() {
            var label = document.querySelector('label[for="' + this.id + '"]');
            label.classList.toggle('btn-warning', this.checked);
            label.classList.toggle('btn-success', !this.checked);
        });
    });
</script>
</body>
</html>
