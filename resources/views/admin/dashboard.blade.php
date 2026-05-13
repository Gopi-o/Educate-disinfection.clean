@extends('layouts.admin')

@section('title', 'Главная — Админка')

@section('content')

<h4>Главная</h4>

<div class="row mb-4">
    <div class="col-md-3">
        <div class="card p-3">
            <b>{{ $stats['services_count'] }}</b><br>
            <small class="text-muted">Услуг</small>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card p-3">
            <b>{{ $stats['orders_new'] }}</b><br>
            <small class="text-muted">Новых заявок</small>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card p-3">
            <b>{{ $stats['reviews_pending'] }}</b><br>
            <small class="text-muted">Отзывов на модерации</small>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card p-3">
            <b>{{ $stats['users_count'] }}</b><br>
            <small class="text-muted">Клиентов</small>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header bg-white">
        <b>Последние заявки</b>
        <a href="{{ route('admin.orders.index') }}" class="float-end">Все →</a>
    </div>
    <table class="table table-bordered mb-0">
        <tr class="table-secondary">
            <td>№</td>
            <td>Услуга</td>
            <td>Клиент</td>
            <td>Статус</td>
            <td>Дата</td>
        </tr>
        @forelse($latestOrders as $order)
        <tr>
            <td>#{{ $order->id }}</td>
            <td>{{ $order->service->title ?? '—' }}</td>
            <td>{{ $order->client_name }}</td>
            <td>
                @if($order->status == 'new') <span class="badge bg-secondary">Новая</span>
                @elseif($order->status == 'processing') <span class="badge bg-warning text-dark">В обработке</span>
                @elseif($order->status == 'completed') <span class="badge bg-success">Выполнена</span>
                @else <span class="badge bg-danger">Отменена</span>
                @endif
            </td>
            <td>{{ $order->created_at->format('d.m.Y H:i') }}</td>
        </tr>
        @empty
        <tr><td colspan="5" class="text-center text-muted">Нет заявок</td></tr>
        @endforelse
    </table>
</div>

@endsection