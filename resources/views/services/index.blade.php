@extends('layouts.app')

@section('title', 'Услуги дезинфекции — Санитарный центр')
@section('description', 'Полный перечень услуг: дезинфекция, дезинсекция, дератизация, дезодорация. Цены и описание.')

@section('content')

<div class="breadcrumb-section">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Главная</a></li>
                <li class="breadcrumb-item active">Услуги</li>
            </ol>
        </nav>
    </div>
</div>

<section class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h1 class="section-title">Наши услуги</h1>
            <p class="section-subtitle">Профессиональная санитарная обработка для дома и бизнеса</p>
        </div>

        <div class="row g-4">
            @forelse($services as $service)
            <div class="col-md-6 col-lg-4">
                <div class="card card-service h-100">
                    <img src="{{ $service->image_url }}" class="card-img-top" alt="{{ $service->title }}">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title fw-bold">{{ $service->title }}</h5>
                        <p class="card-text text-muted small flex-grow-1">{{ Str::limit($service->description, 120) }}</p>
                        <div class="d-flex justify-content-between align-items-center mt-3 pt-3 border-top">
                            <span class="price">{{ $service->formatted_price }}</span>
                            <a href="{{ route('services.show', $service->slug) }}" class="btn btn-outline-custom btn-sm">Подробнее</a>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12 text-center py-5">
                <i class="bi bi-inbox fs-1 text-muted"></i>
                <p class="text-muted mt-3">Услуги пока не добавлены</p>
            </div>
            @endforelse
        </div>
    </div>
</section>

@endsection