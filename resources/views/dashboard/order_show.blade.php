@extends('layouts.app')

@section('title', 'Заявка #' . $order->id . ' — Личный кабинет')

@section('content')

<div class="breadcrumb-section">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Главная</a></li>
                <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Кабинет</a></li>
                <li class="breadcrumb-item"><a href="{{ route('dashboard.orders') }}">Мои заявки</a></li>
                <li class="breadcrumb-item active">#{{ $order->id }}</li>
            </ol>
        </nav>
    </div>
</div>

<section class="py-5">
    <div class="container">
        <div class="row">
            @include('layouts.dashboard-sidebar')

            <!-- Контент -->
            <div class="col-lg-9">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2 class="fw-bold mb-0">Заявка #{{ $order->id }}</h2>
                    <a href="{{ route('dashboard.orders') }}" class="btn btn-outline-custom btn-sm">
                        <i class="bi bi-arrow-left me-1"></i>Назад
                    </a>
                </div>

                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center gap-3">
                            <span class="badge {{ $order->status_badge }} fs-6 px-3 py-2">{{ $order->status_label }}</span>
                            <span class="text-muted small">Создана: {{ $order->created_at->format('d.m.Y H:i') }}</span>
                        </div>
                    </div>
                </div>

                <div class="row g-4">
                    <div class="col-md-6">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-body p-4">
                                <h5 class="fw-bold mb-3"><i class="bi bi-clipboard-check me-2" style="color: var(--primary);"></i>Детали заявки</h5>
                                <table class="table table-borderless small mb-0">
                                    <tr>
                                        <td class="text-muted" style="width: 40%;">Услуга:</td>
                                        <td class="fw-bold">{{ $order->service->title }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-muted">Имя:</td>
                                        <td>{{ $order->client_name }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-muted">Телефон:</td>
                                        <td>{{ $order->client_phone }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-muted">Email:</td>
                                        <td>{{ $order->client_email ?? '—' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-muted">Адрес:</td>
                                        <td>{{ $order->address ?? '—' }}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-body p-4">
                                <h5 class="fw-bold mb-3"><i class="bi bi-chat-left-text me-2" style="color: var(--primary);"></i>Комментарии</h5>
                                
                                @if($order->comment)
                                    <div class="mb-3">
                                        <p class="small text-muted mb-1">Ваш комментарий:</p>
                                        <p class="mb-0">{{ $order->comment }}</p>
                                    </div>
                                @endif

                                @if($order->admin_comment)
                                    <div class="alert alert-light border mb-0">
                                        <p class="small text-muted mb-1"><i class="bi bi-person-gear me-1"></i>Ответ менеджера:</p>
                                        <p class="mb-0">{{ $order->admin_comment }}</p>
                                    </div>
                                @else
                                    <p class="text-muted small mb-0">Менеджер пока не оставил комментарий.</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card border-0 shadow-sm mt-4">
                    <div class="card-body p-4">
                        <h5 class="fw-bold mb-3"><i class="bi bi-question-circle me-2" style="color: var(--primary);"></i>Нужна помощь?</h5>
                        <p class="text-muted small mb-3">Если у вас есть вопросы по заявке — позвоните или напишите нам.</p>
                        <div class="d-flex gap-3">
                            <a href="tel:+78001234567" class="btn btn-outline-custom btn-sm">
                                <i class="bi bi-telephone me-1"></i>Позвонить
                            </a>
                            <a href="{{ route('contacts') }}" class="btn btn-outline-custom btn-sm">
                                <i class="bi bi-envelope me-1"></i>Написать
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection