<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Услуги дезинфекции — Санитарный центр')</title>
    <meta name="description" content="@yield('description', 'Профессиональная дезинфекция, дезинсекция и дератизация. Лицензированные услуги с гарантией.')">
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">

    

    
    @stack('styles')
</head>
<body>

    <!-- Навигация -->
    <nav class="navbar navbar-expand-lg sticky-top">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">
                <i class="bi bi-shield-check"></i>Disinfection.clean
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="mainNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Главная</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}" href="{{ route('about') }}">О компании</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('services.*') ? 'active' : '' }}" href="{{ route('services.index') }}">Услуги</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('articles.*') ? 'active' : '' }}" href="{{ route('articles.index') }}">Статьи</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('reviews.*') ? 'active' : '' }}" href="{{ route('reviews.index') }}">Отзывы</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('contacts') ? 'active' : '' }}" href="{{ route('contacts') }}">Контакты</a>
                    </li>
                </ul>
                <div class="d-flex align-items-center gap-2">
                    <a href="tel:+78001234567" class="btn btn-call">
                        <i class="bi bi-telephone-fill me-1"></i>
                        <span class="d-none d-lg-inline">Позвонить</span>
                    </a>
                    @auth
                        <a href="{{ route('dashboard.index') }}" class="btn btn-outline-custom btn-sm">
                            <i class="bi bi-person-circle me-1"></i>Кабинет
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-outline-custom btn-sm">Войти</a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <main>
        @yield('content')
    </main>

    <!-- Футер -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
                    <h5><i class="bi bi-shield-check me-2"></i>Санитарный центр</h5>
                    <p class="small">Профессиональные услуги дезинфекции, дезинсекции и дератизации. Работаем с 2015 года. Лицензия Роспотребнадзора.</p>
                    <div class="d-flex gap-3 mt-3">
                        <a href="#" class="fs-5"><i class="bi bi-telegram"></i></a>
                        <a href="#" class="fs-5"><i class="bi bi-whatsapp"></i></a>
                        <a href="#" class="fs-5"><i class="bi bi-vk"></i></a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 mb-4 mb-lg-0">
                    <h5>Услуги</h5>
                    <a href="#">Дезинфекция</a>
                    <a href="#">Дезинсекция</a>
                    <a href="#">Дератизация</a>
                    <a href="#">Дезодорация</a>
                    <a href="#">СЭС-заключение</a>
                </div>
                <div class="col-lg-2 col-md-6 mb-4 mb-lg-0">
                    <h5>Компания</h5>
                    <a href="{{ route('about') }}">О нас</a>
                    <a href="{{ route('articles.index') }}">Статьи</a>
                    <a href="{{ route('reviews.index') }}">Отзывы</a>
                    <a href="{{ route('contacts') }}">Контакты</a>
                </div>
                <div class="col-lg-4 col-md-6">
                    <h5>Контакты</h5>
                    <p class="small mb-2"><i class="bi bi-geo-alt me-2"></i>г. Ижевск, ул. Удмуртская, д. 10</p>
                    <p class="small mb-2"><i class="bi bi-telephone me-2"></i>+7 (800) 123-45-67</p>
                    <p class="small mb-2"><i class="bi bi-envelope me-2"></i>info@san-centr.ru</p>
                    <p class="small mb-0"><i class="bi bi-clock me-2"></i>Пн–Пт: 08:00–20:00, Сб–Вс: 09:00–18:00</p>
                </div>
            </div>
            <div class="footer-bottom">
                <p class="mb-0">Санитарный центр. Все права защищены.</p>
            </div>
        </div>
    </footer>

    <!-- Плавающая кнопка звонка (мобильная) -->
    <a href="tel:+78001234567" class="btn btn-danger rounded-circle float-call p-3 shadow">
        <i class="bi bi-telephone-fill fs-4"></i>
    </a>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    
    @stack('scripts')
</body>
</html>