<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cinema</title>
    <link rel="stylesheet" href="{{asset('assets/vendors/fontawesome-free/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <style>
        .centered-form {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
        }
        .form-group select {
            width: 200px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
<header class="foi-header" style="width: 100%;">
    <div>
        <nav class="navbar navbar-expand-lg navbar-light foi-navbar bg-purple" style="background-color: rgb(98, 6, 168);">
            <div class="collapse navbar-collapse" id="collapsibleNavId">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <form action="{{route('user.chooseCity')}}">
                            <input class="btn btn-secondary" type="submit" value="Повернутися">
                        </form>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <form action="{{route('logout')}}" method="post">
                            @csrf
                            <input class="btn btn-secondary" type="submit" value="Вийти">
                        </form>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="header-content">

        </div>
    </div>
</header>

<div class="row ">
    <div class="container centered-form" style="margin-bottom: 50px;">
        <form action="{{ route('user.cinemaStore', ['city_id' => $city_id]) }}" method="POST" class="col-4">
            @csrf
            <div class="form-group">
                <label>Місто: {{$city_name}}</label><br>
                <label>Оберіть кінотеатр</label>
                <select name="cinema_id" class="form-control">
                    @foreach($cinemas as $cinema)
                        <option value="{{ $cinema->id }}" {{ $cinema->id == old('cinema_id') ? 'selected' : '' }}>
                            {{$cinema->name}}
                        </option>
                    @endforeach
                </select>
            </div>
            <input type="submit" class="btn btn-primary" value="Продовжити">
        </form>
    </div>
</div>


<footer class="foi-footer text-white">
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
                    <img src="{{asset('assets/images/logo-white.svg')}}" alt="FOI">
                </div>
                <p class="font-os font-weight-semibold mb3">Отримайте наш мобільний додаток</p>
                <div>
                    <button class="btn btn-app-download mr-2"><img src="{{asset('assets/images/ios.svg')}}" alt="App store"></button>
                    <button class="btn btn-app-download"><img src="{{asset('assets/images/android.svg')}}" alt="play store"></button>
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
                    <a href="#!"><img src="{{asset('assets/images/facebook.svg')}}" alt="facebook"></a>
                    <a href="#!"><img src="{{asset('assets/images/instagram.svg')}}" alt="instagram"></a>
                    <a href="#!"><img src="{{asset('assets/images/twitter.svg')}}" alt="twitter"></a>
                    <a href="#!"><img src="{{asset('assets/images/youtube.svg')}}" alt="youtube"></a>
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
