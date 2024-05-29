<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <div class="sidebar">
        <ul class="pt-3 nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

            <li class="nav-item">
                <a href="{{route('admin.main')}}" class="nav-link">
                    <i class="nav-icon fas fa-regular fa-house"></i>
                    <p>
                        Головна
                    </p>
                </a>
                <a href="{{route('admin.city.index')}}" class="nav-link">
                    <i class="nav-icon fas fa-regular fa-city"></i>
                    <p>
                        Міста
                    </p>
                </a>
                <a href="{{route('admin.cinema.index')}}" class="nav-link">
                    <i class="nav-icon far fa-regular fa-building"></i>
                    <p>
                        Кінотеатри
                    </p>
                </a>
                <a href="{{route('admin.film.index')}}" class="nav-link">
                    <i class="nav-icon fas fa-regular fa-film"></i>
                    <p>
                        Фільми
                    </p>
                </a>
                <a href="{{route('admin.user.index')}}" class="nav-link">
                    <i class="nav-icon fas fa-regular fa-users"></i>
                    <p>
                        Користувачі
                    </p>
                </a>
                <a href="{{route('admin.cinemaFilm.index')}}" class="nav-link">
                    <i class="nav-icon fas fa-regular fa-book"></i>
                    <p>
                        Фільми в кінотеатрах
                    </p>
                </a>
                <a href="{{route('admin.session.index')}}" class="nav-link">
                    <i class="nav-icon fas fa-regular fa-video"></i>
                    <p>
                        Сесії в кінотеатрах
                    </p>
                </a>
                <a href="{{route('admin.orderHistory.index')}}" class="nav-link">
                    <i class="nav-icon fas fa-regular fa-money-check"></i>
                    <p>
                        Історія замовлення квитків
                    </p>
                </a>
            </li>
        </ul>
    </div>
    <!-- /.sidebar -->
</aside>
