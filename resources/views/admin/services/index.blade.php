@extends('layouts.admin')

@section('title', 'Услуги — Админка')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="fw-bold mb-0">Услуги</h4>
    <a href="{{ route('admin.services.create') }}" class="btn btn-success btn-sm">
        <i class="bi bi-plus-lg me-1"></i>Добавить
    </a>
</div>

<div class="card">
    <div class="table-responsive">
        <table class="table table-hover table-striped mb-0 align-middle">
            <thead class="table-dark">
                <tr>
                    <th style="width: 60px;">ID</th>
                    <th style="width: 80px;">Фото</th>
                    <th>Название</th>
                    <th>Цена</th>
                    <th>Статус</th>
                    <th style="width: 150px;">Действия</th>
                </tr>
            </thead>
            <tbody>
                @forelse($services as $service)
                <tr>
                    <td>{{ $service->id }}</td>
                    <td>
                        <img src="{{ $service->image_url }}" alt="" class="rounded" style="width: 60px; height: 40px; object-fit: cover;">
                    </td>
                    <td>
                        <a href="{{ route('services.show', $service->slug) }}" target="_blank" class="text-decoration-none fw-bold">
                            {{ $service->title }}
                        </a>
                        <br><small class="text-muted">{{ $service->slug }}</small>
                    </td>
                    <td>{{ $service->formatted_price }}</td>
                    <td>
                        @if($service->is_active)
                            <span class="badge bg-success">Активна</span>
                        @else
                            <span class="badge bg-secondary">Скрыта</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('admin.services.edit', $service) }}" class="btn btn-sm btn-outline-primary">
                            <i class="bi bi-pencil"></i>
                        </a>
                        <form action="{{ route('admin.services.destroy', $service) }}" method="POST" class="d-inline" onsubmit="return confirm('Удалить услугу?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-outline-danger">
                                <i class="bi bi-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center text-muted py-4">Нет услуг</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<div class="mt-3">
    {{ $services->links() }}
</div>

@endsection