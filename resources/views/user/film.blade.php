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
                    <p>Тривалість: {{ $film->length }}</p>
                    <p>Опис: {!! $film->description !!}</p>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 mx-auto">
            <h2 class="text-center">Активні сеанси</h2>
            <table class="table table-success table-striped-columns" style="background-color: rgb(246, 235, 255);">
                <thead>
                <tr style="background-color: rgb(246, 235, 255);">
                    <th scope="col">#</th>
                    <th scope="col">Кінотеатр</th>
                    <th scope="col">Дата сеансу</th>
                    <th scope="col">Час проведення сеансу</th>
                    <th scope="col">Всього міст</th>
                    <th scope="col">Вільні міста</th>
                    <th scope="col">Перегляд</th>
                </tr>
                </thead>
                <tbody>
                @foreach($sessions as $session)
                    <tr style="background-color: rgb(246, 235, 255);">
                        <th scope="row">{{ $session->cinema_id.".".$session->film_id }}</th>
                        <td>{{ $session->cinema->name }}</td>
                        <td>{{ $session->date_session }}</td>
                        <td>{{ $session->time_session }}</td>
                        <td>{{ $session->cinema->place_count }}</td>
                        <td>{{\App\Models\Place::where('is_taken', 0)->where('id_session', $session->id)->count()}}</td>
                        <td><a href="{{ route('user.order',[$city_id,$cinema_id,$film->id,$session->id]) }}"><i class="far fa-eye"></i></a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
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
</body>

</html>
