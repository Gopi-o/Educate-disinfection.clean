@extends('layouts.admin')

@section('title', 'Заявки — Админка')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="fw-bold mb-0">Заявки</h4>
    <div class="d-flex gap-2">
        <a href="{{ route('admin.orders.index') }}?status=new" class="btn btn-sm {{ request('status') === 'new' ? 'btn-secondary' : 'btn-outline-secondary' }}">Новые</a>
        <a href="{{ route('admin.orders.index') }}?status=processing" class="btn btn-sm {{ request('status') === 'processing' ? 'btn-warning' : 'btn-outline-warning' }}">В обработке</a>
        <a href="{{ route('admin.orders.index') }}?status=completed" class="btn btn-sm {{ request('status') === 'completed' ? 'btn-success' : 'btn-outline-success' }}">Выполненные</a>
        <a href="{{ route('admin.orders.index') }}" class="btn btn-sm {{ !request('status') ? 'btn-dark' : 'btn-outline-dark' }}">Все</a>
    </div>
</div>

<div class="card">
    <div class="table-responsive">
        <table class="table table-hover table-striped mb-0 align-middle">
            <thead class="table-dark">
                <tr>
                    <th style="width: 60px;">№</th>
                    <th>Услуга</th>
                    <th>Клиент</th>
                    <th>Телефон</th>
                    <th>Статус</th>
                    <th>Дата</th>
                    <th style="width: 120px;">Действия</th>
                </tr>
            </thead>
            <tbody>
                @forelse($orders as $order)
                <tr>
                    <td class="fw-bold">#{{ $order->id }}</td>
                    <td>{{ $order->service->title ?? '—' }}</td>
                    <td>
                        {{ $order->client_name }}
                        @if($order->user_id)
                            <br><small class="text-muted"><i class="bi bi-person-check me-1"></i>Зарегистрирован</small>
                        @endif
                    </td>
                    <td>
                        <a href="tel:{{ $order->client_phone }}" class="text-decoration-none">
                            {{ $order->client_phone }}
                        </a>
                    </td>
                    <td>
                        <form action="{{ route('admin.orders.status', $order) }}" method="POST" class="d-inline">
                            @csrf
                            @method('PATCH')
                            <select name="status" onchange="this.form.submit()" class="form-select form-select-sm {{ $order->status === 'new' ? 'border-secondary' : ($order->status === 'processing' ? 'border-warning' : ($order->status === 'completed' ? 'border-success' : 'border-danger')) }}" style="min-width: 130px;">
                                <option value="new" {{ $order->status === 'new' ? 'selected' : '' }}>Новая</option>
                                <option value="processing" {{ $order->status === 'processing' ? 'selected' : '' }}>В обработке</option>
                                <option value="completed" {{ $order->status === 'completed' ? 'selected' : '' }}>Выполнена</option>
                                <option value="cancelled" {{ $order->status === 'cancelled' ? 'selected' : '' }}>Отменена</option>
                            </select>
                        </form>
                    </td>
                    <td>{{ $order->created_at->format('d.m.Y H:i') }}</td>
                    <td>
                        <a href="{{ route('admin.orders.show', $order) }}" class="btn btn-sm btn-outline-primary">
                            <i class="bi bi-eye"></i>
                        </a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center text-muted py-4">Нет заявок</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<div class="mt-3">
    {{ $orders->links() }}
</div>

@endsection