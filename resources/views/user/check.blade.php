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

        .film-details img {
            max-width: 200px;
            margin-right: 20px;
        }

        .check-details {
            text-align: center;
            margin: 20px auto;
            padding: 20px;
            background-color: #f8f9fa;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .check-details h3 {
            margin-bottom: 20px;
        }

        .check-details p {
            margin: 5px 0;
        }
    </style>
</head>

<body>

<header class="foi-header">
    <a href="{{ route('user.main', compact('cinema_id', 'city_id')) }}" class="btn btn-secondary">На главную</a>
    <form action="{{ route('logout') }}" method="post">
        @csrf
        <button class="btn btn-secondary" type="submit">Выйти</button>
    </form>
</header>

<main>
    <div class="check-details">
        <h3>Чек</h3>
        <p><strong>Фільм:</strong> {{ $film->name }}</p>
        <p><strong>Кінотеатр:</strong> {{ $cinema->name }}</p>
        <p><strong>Город:</strong> {{ $city->name }}</p>
        <p><strong>Дата початку сеансу:</strong> {{ $session->date_session }}</p>
        <p><strong>Час початку сеансу:</strong> {{ $session->time_session }}</p>
        <p><strong>Кількість квитків:</strong> {{ $seatCount }}</p>
        <p><strong>Вартість квитка:</strong> {{ $film->cost }} грн.</p>
        <p><strong>Загальна вартість:</strong> {{ $resultCost }} грн.</p>
        <p><strong>Покупець:</strong> {{ $user->name }}</p>
    </div>
</main>

<footer class="foi-footer">
    <div class="container">
        <div class="row footer-content">
            <div class="col-xl-6 col-lg-7 col-md-8">
                <h2 class="mb-0">Хочете дізнатися більше чи просто маєте запитання? Напишіть нам.</h2>
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
                <p>&copy;<a href="https://www.bootstrapdash.com" target="_blank" rel="noopener noreferrer" class="text-reset">BootstrapDash</a>.</p>
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

<script src="{{ asset('assets/vendors/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('assets/vendors/popper.js/popper.min.js') }}"></script>
<script src="{{ asset('assets/vendors/bootstrap/dist/js/bootstrap.min.js') }}"></script>
</body>
</html>
