<?php
// resources/views/home.blade.php
?>
@extends('layouts.app')

@section('title', 'Профессиональная дезинфекция в Москве — Санитарный центр')
@section('description', 'Дезинфекция, дезинсекция, дератизация от лицензированной компании. Выезд за 2 часа. Гарантия 1 год. Звоните!')

@section('content')

<section class="hero">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-7">
                <span class="badge bg-white text-primary mb-3 px-3 py-2">Работаем с 2015 года</span>
                <h1>Профессиональная дезинфекция помещений и территорий</h1>
                <p>Уничтожение вирусов, бактерий, грибков, насекомых и грызунов. Лицензия Роспотребнадзора. Гарантия результата.</p>
                <div class="d-flex flex-wrap gap-3">
                    <a href="{{ route('order.create') }}" class="btn btn-light btn-lg fw-bold px-4">
                        Оставить заявку
                    </a>
                    <a href="{{ route('services.index') }}" class="btn btn-outline-light btn-lg px-4">
                        Наши услуги
                    </a>
                </div>
                <div class="row hero-stats mt-5">
                    <div class="col-4">
                        <div class="stat-number">8+</div>
                        <div class="stat-label">лет на рынке</div>
                    </div>
                    <div class="col-4">
                        <div class="stat-number">5000+</div>
                        <div class="stat-label">выполненных заказов</div>
                    </div>
                    <div class="col-4">
                        <div class="stat-number">2 часа</div>
                        <div class="stat-label">выезд на объект</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 d-none d-lg-block text-center">
                <!-- ЗАГЛУШКА: сюда вставить фото специалиста в защитном костюме с оборудованием -->
                <img src="{{ asset('img/Hero_CpesialCleanist.png') }}" 
                     alt="Специалист по дезинфекции" 
                     class="img-fluid rounded-3 shadow"
                     style="opacity: 0.9;">
            </div>
        </div>
    </div>
</section>

<!-- Услуги -->
<section class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-title">Наши услуги</h2>
            <p class="section-subtitle">Полный спектр санитарных работ для частных лиц и организаций</p>
        </div>
        <div class="row g-4">
            <!-- Карточка 1 -->
            <div class="col-md-6 col-lg-3">
                <div class="card card-service">
                    <!-- ЗАГЛУШКА: фото процесса дезинфекции (распыление раствора) -->
                    <img src="https://via.placeholder.com/400x200/e8f5f1/1a5f4a?text=Дезинфекция" 
                         class="card-img-top" alt="Дезинфекция">
                    <div class="card-body">
                        <h5 class="card-title fw-bold">Дезинфекция</h5>
                        <p class="card-text text-muted small">Уничтожение вирусов, бактерий, грибков и патогенных микроорганизмов на любых поверхностях.</p>
                        <div class="d-flex justify-content-between align-items-center mt-3">
                            <span class="price">от 1 500 ₽</span>
                            <a href="{{ route('services.show', 'dezinfekciya') }}" class="btn btn-outline-custom btn-sm">Подробнее</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Карточка 2 -->
            <div class="col-md-6 col-lg-3">
                <div class="card card-service">
                    <!-- ЗАГЛУШКА: фото обработки от насекомых -->
                    <img src="https://via.placeholder.com/400x200/e8f5f1/1a5f4a?text=Дезинсекция" 
                         class="card-img-top" alt="Дезинсекция">
                    <div class="card-body">
                        <h5 class="card-title fw-bold">Дезинсекция</h5>
                        <p class="card-text text-muted small">Уничтожение тараканов, клопов, блох, муравьев, ос и других насекомых-вредителей.</p>
                        <div class="d-flex justify-content-between align-items-center mt-3">
                            <span class="price">от 2 000 ₽</span>
                            <a href="{{ route('services.show', 'dezinsekciya') }}" class="btn btn-outline-custom btn-sm">Подробнее</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Карточка 3 -->
            <div class="col-md-6 col-lg-3">
                <div class="card card-service">
                    <!-- ЗАГЛУШКА: фото установки капканов/приманок -->
                    <img src="https://via.placeholder.com/400x200/e8f5f1/1a5f4a?text=Дератизация" 
                         class="card-img-top" alt="Дератизация">
                    <div class="card-body">
                        <h5 class="card-title fw-bold">Дератизация</h5>
                        <p class="card-text text-muted small">Борьба с крысами, мышами и другими грызунами. Закрытие входов, установка приманок.</p>
                        <div class="d-flex justify-content-between align-items-center mt-3">
                            <span class="price">от 2 500 ₽</span>
                            <a href="{{ route('services.show', 'deratizaciya') }}" class="btn btn-outline-custom btn-sm">Подробнее</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Карточка 4 -->
            <div class="col-md-6 col-lg-3">
                <div class="card card-service">
                    <!-- ЗАГЛУШКА: фото до/после устранения запаха -->
                    <img src="https://via.placeholder.com/400x200/e8f5f1/1a5f4a?text=Дезодорация" 
                         class="card-img-top" alt="Дезодорация">
                    <div class="card-body">
                        <h5 class="card-title fw-bold">Дезодорация</h5>
                        <p class="card-text text-muted small">Устранение неприятных запахов: после пожара, затопления, разложения, табака.</p>
                        <div class="d-flex justify-content-between align-items-center mt-3">
                            <span class="price">от 3 000 ₽</span>
                            <a href="{{ route('services.show', 'dezodoraciya') }}" class="btn btn-outline-custom btn-sm">Подробнее</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center mt-4">
            <a href="{{ route('services.index') }}" class="btn btn-primary-custom">
                Все услуги <i class="bi bi-arrow-right ms-1"></i>
            </a>
        </div>
    </div>
</section>

<!-- Преимущества -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-title">Почему выбирают нас</h2>
            <p class="section-subtitle">Работаем официально и даем гарантии</p>
        </div>
        <div class="row g-4">
            <div class="col-md-6 col-lg-3">
                <div class="feature-box">
                    <div class="feature-icon">
                        <i class="bi bi-shield-check"></i>
                    </div>
                    <h5 class="fw-bold mb-2">Лицензия</h5>
                    <p class="text-muted small mb-0">Все работы выполняются по лицензии Роспотребнадзора. Действуем в рамках закона.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="feature-box">
                    <div class="feature-icon">
                        <i class="bi bi-clock-history"></i>
                    </div>
                    <h5 class="fw-bold mb-2">Срочный выезд</h5>
                    <p class="text-muted small mb-0">Прибытие специалиста в течение 2 часов по Москве и области. Работаем без выходных.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="feature-box">
                    <div class="feature-icon">
                        <i class="bi bi-award"></i>
                    </div>
                    <h5 class="fw-bold mb-2">Гарантия 1 год</h5>
                    <p class="text-muted small mb-0">Повторная обработка бесплатно, если проблема вернется в течение гарантийного срока.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="feature-box">
                    <div class="feature-icon">
                        <i class="bi bi-droplet-half"></i>
                    </div>
                    <h5 class="fw-bold mb-2">Безопасные средства</h5>
                    <p class="text-muted small mb-0">Используем препараты 4 класса опасности. Безопасно для людей и домашних животных.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Как мы работаем -->
<section class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-title">Как мы работаем</h2>
            <p class="section-subtitle">От заявки до результата — 4 простых шага</p>
        </div>
        <div class="row g-4">
            <div class="col-md-6 col-lg-3">
                <div class="text-center">
                    <div class="d-inline-flex align-items-center justify-content-center rounded-circle bg-white border shadow-sm mb-3" 
                         style="width: 80px; height: 80px;">
                        <span class="fs-2 fw-bold text-primary">1</span>
                    </div>
                    <h5 class="fw-bold">Заявка</h5>
                    <p class="text-muted small">Оставьте заявку на сайте или позвоните по телефону. Расскажите о проблеме.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="text-center">
                    <div class="d-inline-flex align-items-center justify-content-center rounded-circle bg-white border shadow-sm mb-3" 
                         style="width: 80px; height: 80px;">
                        <span class="fs-2 fw-bold text-primary">2</span>
                    </div>
                    <h5 class="fw-bold">Осмотр</h5>
                    <p class="text-muted small">Специалист приезжает, оценивает ситуацию и подбирает метод обработки.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="text-center">
                    <div class="d-inline-flex align-items-center justify-content-center rounded-circle bg-white border shadow-sm mb-3" 
                         style="width: 80px; height: 80px;">
                        <span class="fs-2 fw-bold text-primary">3</span>
                    </div>
                    <h5 class="fw-bold">Обработка</h5>
                    <p class="text-muted small">Проводим дезинфекцию профессиональным оборудованием с соблюдением норм.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="text-center">
                    <div class="d-inline-flex align-items-center justify-content-center rounded-circle bg-white border shadow-sm mb-3" 
                         style="width: 80px; height: 80px;">
                        <span class="fs-2 fw-bold text-primary">4</span>
                    </div>
                    <h5 class="fw-bold">Гарантия</h5>
                    <p class="text-muted small">Выдаем акт выполненных работ и гарантийный талон сроком на 12 месяцев.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Акция -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-4 mb-lg-0">
                <img src="{{ asset('img/home_promo.jpg') }}" 
                     alt="Акция скидка 20%" 
                     class="img-fluid rounded-3 shadow">
            </div>
            <div class="col-lg-6">
                <span class="badge-promo mb-3 d-inline-block">Акция до 31 мая</span>
                <h2 class="section-title">Скидка 20% на комплексную обработку</h2>
                <p class="text-muted mb-4">Закажите дезинфекцию + дезинсекцию + дератизацию одновременно и получите скидку 20% на весь комплекс. Экономия до 5 000 рублей!</p>
                <ul class="list-unstyled mb-4">
                    <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Три услуги по цене двух</li>
                    <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Гарантия на все виды работ</li>
                    <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Бесплатный повторный выезд</li>
                </ul>
                <a href="{{ route('order.create') }}" class="btn btn-primary-custom btn-lg">
                    Получить скидку
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Отзывы -->
<section class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-title">Отзывы клиентов</h2>
            <p class="section-subtitle">Что говорят о нас те, кто уже обратился</p>
        </div>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="review-card h-100">
                    <div class="d-flex align-items-center mb-3">
                        <!-- ЗАГЛУШКА: аватар клиента (можно использовать инициалы вместо фото) -->
                        <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center me-3" 
                             style="width: 50px; height: 50px; font-weight: 700;">
                            АК
                        </div>
                        <div>
                            <h6 class="mb-0 fw-bold">Анна К.</h6>
                            <small class="text-muted">Дезинсекция квартиры</small>
                        </div>
                    </div>
                    <div class="review-stars mb-2">
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                    </div>
                    <p class="text-muted small mb-0">"Тараканы исчезли после первой обработки! Специалист приехал через час, все объяснил, дал рекомендации. Прошло 3 месяца — ни одного насекомого."</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="review-card h-100">
                    <div class="d-flex align-items-center mb-3">
                        <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center me-3" 
                             style="width: 50px; height: 50px; font-weight: 700;">
                            СМ
                        </div>
                        <div>
                            <h6 class="mb-0 fw-bold">Сергей М.</h6>
                            <small class="text-muted">Дератизация склада</small>
                        </div>
                    </div>
                    <div class="review-stars mb-2">
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                    </div>
                    <p class="text-muted small mb-0">"Обрабатывали склад от крыс. Работали четко, по договору, выдали все документы для проверки. Рекомендую для бизнеса."</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="review-card h-100">
                    <div class="d-flex align-items-center mb-3">
                        <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center me-3" 
                             style="width: 50px; height: 50px; font-weight: 700;">
                            ЕВ
                        </div>
                        <div>
                            <h6 class="mb-0 fw-bold">Елена В.</h6>
                            <small class="text-muted">Дезинфекция офиса</small>
                        </div>
                    </div>
                    <div class="review-stars mb-2">
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-half"></i>
                    </div>
                    <p class="text-muted small mb-0">"Заказывали дезинфекцию офиса 300 м². Сделали вечером, к утру все было готово. Запах выветрился за ночь, сотрудники довольны."</p>
                </div>
            </div>
        </div>
        <div class="text-center mt-4">
            <a href="{{ route('reviews.index') }}" class="btn btn-outline-custom">Все отзывы</a>
        </div>
    </div>
</section>

<!-- CTA -->
<section class="py-5" style="background: var(--primary);">
    <div class="container text-center text-white">
        <h2 class="fw-bold mb-3">Остались вопросы?</h2>
        <p class="mb-4 opacity-75">Позвоните или оставьте заявку — перезвоним в течение 15 минут</p>
        <div class="d-flex justify-content-center gap-3 flex-wrap">
            <a href="tel:+78001234567" class="btn btn-light btn-lg fw-bold px-4">
                <i class="bi bi-telephone-fill me-2"></i>+7 (800) 123-45-67
            </a>
            <a href="{{ route('order.create') }}" class="btn btn-outline-light btn-lg px-4">
                Оставить заявку
            </a>
        </div>
    </div>
</section>

@endsection