@extends('layouts.app')

@section('title', 'Профиль — Личный кабинет')

@section('content')

<div class="breadcrumb-section">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Главная</a></li>
                <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Кабинет</a></li>
                <li class="breadcrumb-item active">Профиль</li>
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
                <h2 class="fw-bold mb-4">Профиль</h2>

                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <div class="card border-0 shadow-sm">
                    <div class="card-body p-4">
                        <form action="{{ route('dashboard.profile.update') }}" method="POST">
                            @csrf
                            @method('PATCH')

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="name" class="form-label fw-bold">Имя <span class="text-danger">*</span></label>
                                    <input type="text" name="name" id="name" 
                                           class="form-control @error('name') is-invalid @enderror"
                                           value="{{ old('name', auth()->user()->name) }}" required>
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="email" class="form-label fw-bold">Email <span class="text-danger">*</span></label>
                                    <input type="email" name="email" id="email" 
                                           class="form-control @error('email') is-invalid @enderror"
                                           value="{{ old('email', auth()->user()->email) }}" required>
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="phone" class="form-label fw-bold">Телефон</label>
                                    <input type="tel" name="phone" id="phone" 
                                           class="form-control @error('phone') is-invalid @enderror"
                                           value="{{ old('phone', auth()->user()->phone) }}">
                                    @error('phone')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold">Роль</label>
                                    <input type="text" class="form-control" value="{{ auth()->user()->role === 'admin' ? 'Администратор' : 'Клиент' }}" disabled>
                                </div>
                            </div>

                            <div class="d-flex gap-3 mt-2">
                                <button type="submit" class="btn btn-primary-custom">
                                    <i class="bi bi-check-lg me-2"></i>Сохранить
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="card border-0 shadow-sm mt-4">
                    <div class="card-body p-4">
                        <h5 class="fw-bold mb-3">Рассылка новостей</h5>
                        <p class="text-muted small mb-3">Получайте актуальные акции и полезные статьи на email.</p>
                        
                        <form action="{{ route('dashboard.subscribe') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn {{ auth()->user()->is_subscribed ? 'btn-outline-danger' : 'btn-outline-custom' }}">
                                @if(auth()->user()->is_subscribed)
                                    <i class="bi bi-bell-slash me-2"></i>Отписаться
                                @else
                                    <i class="bi bi-bell me-2"></i>Подписаться
                                @endif
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection