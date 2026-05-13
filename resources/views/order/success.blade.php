@extends('layouts.app')

@section('title', 'Заявка принята — Санитарный центр')

@section('content')

<section class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 text-center">
                <div class="mb-4">
                    <i class="bi bi-check-circle-fill text-success" style="font-size: 5rem;"></i>
                </div>
                <h1 class="fw-bold mb-3">Заявка принята!</h1>
                <p class="text-muted mb-4">Номер вашей заявки: <strong class="text-dark">#{{ $order->id }}</strong></p>
                
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body p-4 text-start">
                        <h6 class="fw-bold mb-3">Детали заявки:</h6>
                        <ul class="list-unstyled small text-muted mb-0">
                            <li class="mb-2"><strong>Услуга:</strong> {{ $order->service->title }}</li>
                            <li class="mb-2"><strong>Имя:</strong> {{ $order->client_name }}</li>
                            <li class="mb-2"><strong>Телефон:</strong> {{ $order->client_phone }}</li>
                            <li class="mb-2"><strong>Статус:</strong> 
                                <span class="badge {{ $order->status_badge }}">{{ $order->status_label }}</span>
                            </li>
                        </ul>
                    </div>
                </div>

                <p class="text-muted mb-4">Мы перезвоним вам в течение 15 минут для уточнения деталей.</p>

                <div class="d-flex justify-content-center gap-3">
                    <a href="{{ route('home') }}" class="btn btn-primary-custom">На главную</a>
                    <a href="{{ route('services.index') }}" class="btn btn-outline-custom">Все услуги</a>
                </div>

                @auth
                <div class="mt-4">
                    <a href="{{ route('dashboard.orders') }}" class="text-muted small">
                        <i class="bi bi-box-arrow-in-right me-1"></i>Смотреть в личном кабинете
                    </a>
                </div>
                @endauth
            </div>
        </div>
    </div>
</section>

@endsection