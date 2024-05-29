<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cinema</title>
    <link rel="stylesheet" href="{{ asset('assets/vendors/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <style>
        body {
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .foi-header {
            background-color: rgb(98, 6, 168);
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
        }

        .foi-footer {
            flex: 0 0 auto;
            background-color: rgb(98, 6, 168);
            color: #fff;
            padding: 20px 0;
        }

        .container {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 15px;
        }

        .content-container {
            display: flex;
            flex: 1;
        }

        .sidebar {
            background-color: rgb(238, 220, 252);
            width: 15%;
            padding: 20px;
        }

        .content {
            flex: 1;
            padding: 20px;
            background-color: rgb(246, 235, 255);
        }

        .film-card {
            max-width: 300px;
            height: 600px;
            position: relative;
        }

        .film-image {
            max-width: 100%;
            max-height: 350px;
            object-fit: cover;
        }

        .btn-primary {
            position: absolute;
            height: 70px;
            bottom: 10px;
            left: 50%;
            transform: translateX(-50%);
        }

        .list-group-item {
            padding-top: 3px;
            padding-bottom: 3px;
            margin-bottom: 0;
            background-color: rgb(238, 220, 252);
        }

        .list-group-item a {
            color: inherit;
        }

        .list-group-item a:hover {
            color: rgb(98, 6, 168);
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

<div class="content-container">
    <div class="sidebar">
        <ul class="list-group list-group-flush">
            @foreach($cities as $city)
                <li class="list-group-item">
                    <span class="{{ $city_id == $city->id ? 'text-primary' : '' }}">
                        {{ $city->name }}
                    </span>
                    <ul class="list-group list-group-flush ml-3">
                        @foreach($city->cinemas as $cinema)
                            <li class="list-group-item">
                                <form action="{{ route('user.mainStore') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="city_id" value="{{ $city->id }}">
                                    <input type="hidden" name="cinema_id" value="{{ $cinema->id }}">
                                    <button type="submit" class="btn btn-link" style="{{ $cinema_id == $cinema->id ? 'color: rgb(98, 6, 168);' : '' }}">
                                        {{ $cinema->name }}
                                    </button>
                                </form>
                            </li>
                        @endforeach
                    </ul>
                </li>
            @endforeach
        </ul>
    </div>

    <div class="content">
        <div class="row">
            @if(count($films) > 0)
                @foreach($films as $film)
                    <div class="col-md-4 mb-4">
                        <div class="card film-card">
                            <img src="{{ asset('storage/' . $film->image) }}" class="card-img-top film-image" alt="Зображення фільму">
                            <div class="card-body">
                                <h5 class="card-title">{{ $film->name }}</h5>
                                <p class="card-text">Дата випуску фільму: {{ $film->dateAdd }}</p>
                                <p class="card-text">Тривалість: {{ $film->length }}</p>
                                <a href="{{route('user.film', [$city_id, $cinema_id, $film->id])}}" class="btn btn-primary">Перейти к фильму</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="col-md-12 text-center">
                    <p>На жаль, немає фільмів для показу в цьому кінотеатрі.</p>
                </div>
            @endif
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
