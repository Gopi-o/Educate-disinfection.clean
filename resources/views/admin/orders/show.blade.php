@extends('layouts.admin')

@section('title', 'Заявка #' . $order->id . ' — Админка')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="fw-bold mb-0">Заявка #{{ $order->id }}</h4>
    <a href="{{ route('admin.orders.index') }}" class="btn btn-outline-secondary btn-sm">
        <i class="bi bi-arrow-left me-1"></i>Назад
    </a>
</div>

<div class="row">
    <div class="col-lg-8">
        <div class="card mb-3">
            <div class="card-header bg-white py-3">
                <h6 class="fw-bold mb-0">Информация</h6>
            </div>
            <div class="card-body">
                <table class="table table-borderless mb-0">
                    <tr>
                        <td style="width: 30%;" class="text-muted">Услуга:</td>
                        <td class="fw-bold">{{ $order->service->title ?? '—' }}</td>
                    </tr>
                    <tr>
                        <td class="text-muted">Имя клиента:</td>
                        <td>{{ $order->client_name }}</td>
                    </tr>
                    <tr>
                        <td class="text-muted">Телефон:</td>
                        <td>
                            <a href="tel:{{ $order->client_phone }}">{{ $order->client_phone }}</a>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-muted">Email:</td>
                        <td>{{ $order->client_email ?? '—' }}</td>
                    </tr>
                    <tr>
                        <td class="text-muted">Адрес:</td>
                        <td>{{ $order->address ?? '—' }}</td>
                    </tr>
                    <tr>
                        <td class="text-muted">Комментарий клиента:</td>
                        <td>{{ $order->comment ?? '—' }}</td>
                    </tr>
                    <tr>
                        <td class="text-muted">Создана:</td>
                        <td>{{ $order->created_at->format('d.m.Y H:i') }}</td>
                    </tr>
                    @if($order->user_id)
                    <tr>
                        <td class="text-muted">Пользователь:</td>
                        <td>
                            <a href="{{ route('admin.users.show', $order->user_id) }}">
                                {{ $order->user->name ?? 'ID: ' . $order->user_id }}
                            </a>
                        </td>
                    </tr>
                    @endif
                </table>
            </div>
        </div>

        <div class="card">
            <div class="card-header bg-white py-3">
                <h6 class="fw-bold mb-0">Ответ менеджера</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.orders.status', $order) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    
                    <div class="mb-3">
                        <label class="form-label fw-bold">Статус</label>
                        <select name="status" class="form-select">
                            <option value="new" {{ $order->status === 'new' ? 'selected' : '' }}>Новая</option>
                            <option value="processing" {{ $order->status === 'processing' ? 'selected' : '' }}>В обработке</option>
                            <option value="completed" {{ $order->status === 'completed' ? 'selected' : '' }}>Выполнена</option>
                            <option value="cancelled" {{ $order->status === 'cancelled' ? 'selected' : '' }}>Отменена</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Комментарий для клиента</label>
                        <textarea name="admin_comment" rows="3" class="form-control" placeholder="Введите ответ...">{{ old('admin_comment', $order->admin_comment) }}</textarea>
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-success">
                            <i class="bi bi-check-lg me-1"></i>Сохранить
                        </button>
                        
                        @if($order->client_email)
                        <button type="submit" formaction="{{ route('admin.orders.notify', $order) }}" class="btn btn-outline-primary">
                            <i class="bi bi-envelope me-1"></i>Сохранить и уведомить
                        </button>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card mb-3">
            <div class="card-body text-center">
                <span class="badge {{ $order->status_badge }} fs-5 px-3 py-2">{{ $order->status_label }}</span>
                <p class="text-muted small mt-2 mb-0">Последнее обновление:<br>{{ $order->updated_at->format('d.m.Y H:i') }}</p>
            </div>
        </div>

        <div class="card">
            <div class="card-header bg-white py-3">
                <h6 class="fw-bold mb-0">Действия</h6>
            </div>
            <div class="list-group list-group-flush">
                <a href="tel:{{ $order->client_phone }}" class="list-group-item list-group-item-action">
                    <i class="bi bi-telephone me-2 text-success"></i>Позвонить клиенту
                </a>
                @if($order->client_email)
                <a href="mailto:{{ $order->client_email }}" class="list-group-item list-group-item-action">
                    <i class="bi bi-envelope me-2 text-primary"></i>Написать на email
                </a>
                @endif
            </div>
        </div>
    </div>
</div>

@endsection