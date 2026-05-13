@extends('layouts.admin')

@section('title', $user->name . ' — Пользователь')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="fw-bold mb-0">Пользователь #{{ $user->id }}</h4>
    <a href="{{ route('admin.users.index') }}" class="btn btn-outline-secondary btn-sm">
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
                        <td style="width: 30%;" class="text-muted">Имя:</td>
                        <td class="fw-bold">{{ $user->name }}</td>
                    </tr>
                    <tr>
                        <td class="text-muted">Email:</td>
                        <td>
                            <a href="mailto:{{ $user->email }}">{{ $user->email }}</a>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-muted">Телефон:</td>
                        <td>{{ $user->phone ?? '—' }}</td>
                    </tr>
                    <tr>
                        <td class="text-muted">Роль:</td>
                        <td>
                            @if($user->role === 'admin')
                                <span class="badge bg-danger">Администратор</span>
                            @else
                                <span class="badge bg-secondary">Клиент</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td class="text-muted">Подписка на новости:</td>
                        <td>
                            @if($user->is_subscribed)
                                <span class="badge bg-success">Подписан</span>
                            @else
                                <span class="badge bg-secondary">Не подписан</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td class="text-muted">Дата регистрации:</td>
                        <td>{{ $user->created_at->format('d.m.Y H:i') }}</td>
                    </tr>
                </table>
            </div>
        </div>

        <div class="card">
            <div class="card-header bg-white d-flex justify-content-between align-items-center py-3">
                <h6 class="fw-bold mb-0">Заявки</h6>
                <a href="{{ route('admin.orders.index') }}?user={{ $user->id }}" class="btn btn-sm btn-outline-primary">Все заявки</a>
            </div>
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>№</th>
                            <th>Услуга</th>
                            <th>Статус</th>
                            <th>Дата</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($user->orders()->with('service')->latest()->take(5)->get() as $order)
                        <tr>
                            <td>#{{ $order->id }}</td>
                            <td>{{ $order->service->title ?? '—' }}</td>
                            <td>
                                <span class="badge {{ $order->status_badge }}">{{ $order->status_label }}</span>
                            </td>
                            <td>{{ $order->created_at->format('d.m.Y') }}</td>
                            <td>
                                <a href="{{ route('admin.orders.show', $order) }}" class="btn btn-sm btn-outline-secondary">
                                    <i class="bi bi-eye"></i>
                                </a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted py-3">Нет заявок</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card mb-3">
            <div class="card-header bg-white py-3">
                <h6 class="fw-bold mb-0">Статистика</h6>
            </div>
            <div class="list-group list-group-flush">
                <div class="list-group-item d-flex justify-content-between">
                    <span>Всего заявок</span>
                    <span class="fw-bold">{{ $user->orders()->count() }}</span>
                </div>
                <div class="list-group-item d-flex justify-content-between">
                    <span>Новых</span>
                    <span class="fw-bold">{{ $user->orders()->where('status', 'new')->count() }}</span>
                </div>
                <div class="list-group-item d-flex justify-content-between">
                    <span>Выполненных</span>
                    <span class="fw-bold">{{ $user->orders()->where('status', 'completed')->count() }}</span>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header bg-white py-3">
                <h6 class="fw-bold mb-0">Действия</h6>
            </div>
            <div class="list-group list-group-flush">
                @if($user->phone)
                <a href="tel:{{ $user->phone }}" class="list-group-item list-group-item-action">
                    <i class="bi bi-telephone me-2 text-success"></i>Позвонить
                </a>
                @endif
                <a href="mailto:{{ $user->email }}" class="list-group-item list-group-item-action">
                    <i class="bi bi-envelope me-2 text-primary"></i>Написать email
                </a>
            </div>
        </div>

        @if(auth()->user()->isAdmin() && $user->id !== auth()->id())
        <div class="card mb-3">
            <div class="card-header bg-white py-3">
                <h6 class="fw-bold mb-0">Роль пользователя</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.users.role', $user) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    
                    <select name="role" class="form-select mb-3" onchange="this.form.submit()">
                        @foreach(App\Models\User::$roles as $key => $label)
                            <option value="{{ $key }}" {{ $user->role === $key ? 'selected' : '' }}>
                                {{ $label }}
                            </option>
                        @endforeach
                    </select>
                    
                    <button type="submit" class="btn btn-sm btn-success w-100">
                        <i class="bi bi-check-lg me-1"></i>Сохранить роль
                    </button>
                </form>
            </div>
        </div>
        @endif
    </div>
</div>

@endsection