@extends('layouts.app')

@section('title', $service->title . ' — Санитарный центр')
@section('description', Str::limit($service->description, 160))

@section('content')

<div class="breadcrumb-section">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Главная</a></li>
                <li class="breadcrumb-item"><a href="{{ route('services.index') }}">Услуги</a></li>
                <li class="breadcrumb-item active">{{ $service->title }}</li>
            </ol>
        </nav>
    </div>
</div>

<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 mb-4 mb-lg-0">
                <img src="{{ $service->image_url }}" 
                     alt="{{ $service->title }}" 
                     class="img-fluid rounded-3 shadow w-100"
                     style="max-height: 400px; object-fit: cover;">
            </div>

            <div class="col-lg-7">
                <h1 class="fw-bold mb-3">{{ $service->title }}</h1>
                
                <div class="d-flex align-items-center gap-3 mb-4">
                    <span class="price fs-2">{{ $service->formatted_price }}</span>
                    @if($service->is_active)
                        <span class="badge bg-success">Доступно</span>
                    @else
                        <span class="badge bg-secondary">Недоступно</span>
                    @endif
                </div>

                <div class="mb-4">
                    <h5 class="fw-bold mb-2">Описание</h5>
                    <p class="text-muted" style="line-height: 1.8;">{{ $service->description ?? 'Описание услуги скоро появится.' }}</p>
                </div>

                <div class="card border-0 bg-light mb-4">
                    <div class="card-body">
                        <h6 class="fw-bold mb-3"><i class="bi bi-check-circle-fill text-success me-2"></i>Что входит в услугу:</h6>
                        <div class="row">
                            <div class="col-md-6">
                                <ul class="list-unstyled small text-muted mb-0">
                                    <li class="mb-2"><i class="bi bi-check-lg text-primary me-2"></i>Выезд специалиста</li>
                                    <li class="mb-2"><i class="bi bi-check-lg text-primary me-2"></i>Осмотр объекта</li>
                                    <li class="mb-2"><i class="bi bi-check-lg text-primary me-2"></i>Подбор метода обработки</li>
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <ul class="list-unstyled small text-muted mb-0">
                                    <li class="mb-2"><i class="bi bi-check-lg text-primary me-2"></i>Проведение работ</li>
                                    <li class="mb-2"><i class="bi bi-check-lg text-primary me-2"></i>Акт выполненных работ</li>
                                    <li class="mb-2"><i class="bi bi-check-lg text-primary me-2"></i>Гарантия 12 месяцев</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="d-flex flex-wrap gap-3">
                    <a href="{{ route('order.create') }}?service={{ $service->id }}" class="btn btn-primary-custom btn-lg">
                        <i class="bi bi-calendar-check me-2"></i>Оформить заявку
                    </a>
                    <a href="tel:+78001234567" class="btn btn-outline-custom btn-lg">
                        <i class="bi bi-telephone me-2"></i>Позвонить
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-5 bg-light">
    <div class="container">
        <h3 class="fw-bold mb-4">Другие услуги</h3>
        <div class="row g-4">
            @foreach($otherServices as $other)
            <div class="col-md-6 col-lg-3">
                <div class="card card-service h-100">
                    <img src="{{ $other->image_url }}" class="card-img-top" alt="{{ $other->title }}" style="height: 160px;">
                    <div class="card-body">
                        <h6 class="fw-bold mb-2">{{ $other->title }}</h6>
                        <p class="price mb-2">{{ $other->formatted_price }}</p>
                        <a href="{{ route('services.show', $other->slug) }}" class="btn btn-outline-custom btn-sm w-100">Подробнее</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

@endsection