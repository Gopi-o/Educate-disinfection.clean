@extends('layouts.app')

@section('title', 'Личный кабинет')

@section('content')

<div class="breadcrumb-section">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Главная</a></li>
                <li class="breadcrumb-item active">Кабинет</li>
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
                <h2 class="fw-bold mb-4">Здравствуйте, {{ $user->name }}</h2>

                <div class="row g-4 mb-4">
                    <div class="col-md-4">
                        <div class="card border-0 shadow-sm text-center p-3">
                            <div class="card-body">
                                <i class="bi bi-calendar-check fs-1 mb-2" style="color: var(--primary);"></i>
                                <h5 class="fw-bold mb-1">{{ $orders->count() }}</h5>
                                <p class="text-muted small mb-0">Всего заявок</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card border-0 shadow-sm text-center p-3">
                            <div class="card-body">
                                <i class="bi bi-clock-history fs-1 mb-2" style="color: var(--primary);"></i>
                                <h5 class="fw-bold mb-1">{{ $orders->where('status', 'processing')->count() }}</h5>
                                <p class="text-muted small mb-0">В обработке</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card border-0 shadow-sm text-center p-3">
                            <div class="card-body">
                                <i class="bi bi-check-circle fs-1 mb-2" style="color: var(--primary);"></i>
                                <h5 class="fw-bold mb-1">{{ $orders->where('status', 'completed')->count() }}</h5>
                                <p class="text-muted small mb-0">Выполнено</p>
                            </div>
                        </div>
                    </div>
                </div>

                <h5 class="fw-bold mb-3">Последние заявки</h5>
                @if($orders->count())
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="table-light">
                                <tr>
                                    <th>№</th>
                                    <th>Услуга</th>
                                    <th>Дата</th>
                                    <th>Статус</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($orders as $order)
                                <tr>
                                    <td>#{{ $order->id }}</td>
                                    <td>{{ $order->service->title }}</td>
                                    <td>{{ $order->created_at->format('d.m.Y') }}</td>
                                    <td><span class="badge {{ $order->status_badge }}">{{ $order->status_label }}</span></td>
                                    <td>
                                        <a href="{{ route('dashboard.orders.show', $order) }}" class="btn btn-sm btn-outline-custom">Подробнее</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="text-end">
                        <a href="{{ route('dashboard.orders') }}" class="btn btn-outline-custom btn-sm">Все заявки</a>
                    </div>
                @else
                    <div class="text-center py-5 text-muted">
                        <i class="bi bi-inbox fs-1"></i>
                        <p class="mt-3">У вас пока нет заявок</p>
                        <a href="{{ route('services.index') }}" class="btn btn-primary-custom btn-sm">Выбрать услугу</a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>

@endsection