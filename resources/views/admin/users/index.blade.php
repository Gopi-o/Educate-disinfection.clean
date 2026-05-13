@extends('layouts.admin')

@section('title', 'Пользователи — Админка')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="fw-bold mb-0">Пользователи</h4>
</div>

<div class="card">
    <div class="table-responsive">
        <table class="table table-hover table-striped mb-0 align-middle">
            <thead class="table-dark">
                <tr>
                    <th style="width: 60px;">ID</th>
                    <th>Имя</th>
                    <th>Email</th>
                    <th>Телефон</th>
                    <th>Заявок</th>
                    <th>Подписка</th>
                    <th>Дата регистрации</th>
                    <th style="width: 100px;">Действия</th>
                </tr>
            </thead>
            <tbody>
                @forelse($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>
                        <span class="fw-bold">{{ $user->name }}</span>
                        @if($user->role === 'admin')
                            <span class="badge bg-danger ms-1">Админ</span>
                        @elseif($user->role === 'manager')
                            <span class="badge bg-warning text-dark ms-1">Менеджер</span>
                        @endif
                    </td>
                    <td>
                        <a href="mailto:{{ $user->email }}">{{ $user->email }}</a>
                    </td>
                    <td>{{ $user->phone ?? '—' }}</td>
                    <td>
                        <a href="{{ route('admin.orders.index') }}?user={{ $user->id }}">
                            {{ $user->orders_count ?? $user->orders()->count() }}
                        </a>
                    </td>
                    <td>
                        @if($user->is_subscribed)
                            <span class="badge bg-success">Да</span>
                        @else
                            <span class="badge bg-secondary">Нет</span>
                        @endif
                    </td>
                    <td>{{ $user->created_at->format('d.m.Y') }}</td>
                    <td>
                        <a href="{{ route('admin.users.show', $user) }}" class="btn btn-sm btn-outline-primary">
                            <i class="bi bi-eye"></i>
                        </a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="8" class="text-center text-muted py-4">Нет пользователей</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<div class="mt-3">
    {{ $users->links() }}
</div>

@endsection