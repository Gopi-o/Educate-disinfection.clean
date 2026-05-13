@extends('layouts.app')

@section('title', 'Мои заявки — Личный кабинет')

@section('content')

<div class="breadcrumb-section">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Главная</a></li>
                <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Кабинет</a></li>
                <li class="breadcrumb-item active">Мои заявки</li>
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
                    <h2 class="fw-bold mb-0">Мои заявки</h2>
                    <a href="{{ route('services.index') }}" class="btn btn-primary-custom btn-sm">
                        <i class="bi bi-plus-lg me-1"></i>Новая заявка
                    </a>
                </div>

                @if($orders->count())
                    <div class="card border-0 shadow-sm">
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th>№</th>
                                        <th>Услуга</th>
                                        <th>Телефон</th>
                                        <th>Дата</th>
                                        <th>Статус</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($orders as $order)
                                    <tr>
                                        <td class="fw-bold">#{{ $order->id }}</td>
                                        <td>{{ $order->service->title }}</td>
                                        <td>{{ $order->client_phone }}</td>
                                        <td>{{ $order->created_at->format('d.m.Y H:i') }}</td>
                                        <td>
                                            <span class="badge {{ $order->status_badge }}">{{ $order->status_label }}</span>
                                        </td>
                                        <td>
                                            <a href="{{ route('dashboard.orders.show', $order) }}" class="btn btn-sm btn-outline-custom">
                                                <i class="bi bi-eye me-1"></i>Смотреть
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="mt-4">
                        {{ $orders->links() }}
                    </div>
                @else
                    <div class="card border-0 shadow-sm text-center py-5">
                        <div class="card-body">
                            <i class="bi bi-inbox fs-1 text-muted mb-3"></i>
                            <h5 class="fw-bold">Заявок пока нет</h5>
                            <p class="text-muted small">Оформите заявку на нужную услугу — мы свяжемся с вами.</p>
                            <a href="{{ route('services.index') }}" class="btn btn-primary-custom mt-2">Выбрать услугу</a>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>

@endsection