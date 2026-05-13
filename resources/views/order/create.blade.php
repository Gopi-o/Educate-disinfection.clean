@extends('layouts.app')

@section('title', 'Оформить заявку — Санитарный центр')

@section('content')

<div class="breadcrumb-section">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Главная</a></li>
                <li class="breadcrumb-item active">Заявка</li>
            </ol>
        </nav>
    </div>
</div>

<section class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <h1 class="section-title mb-4">Оформление заявки</h1>
                <p class="text-muted mb-4">Заполните форму — мы перезвоним в течение 15 минут для уточнения деталей.</p>

                <form action="{{ route('order.store') }}" method="POST" class="card border-0 shadow-sm">
                    @csrf

                    <div class="card-body p-4 p-md-5">
                        <!-- Услуга -->
                        <div class="mb-4">
                            <label for="service_id" class="form-label fw-bold">Тип услуги <span class="text-danger">*</span></label>
                            <select name="service_id" id="service_id" class="form-select form-select-lg @error('service_id') is-invalid @enderror" required>
                                <option value="">Выберите услугу</option>
                                @foreach($services as $service)
                                    <option value="{{ $service->id }}" 
                                        {{ old('service_id', $selectedService?->id) == $service->id ? 'selected' : '' }}>
                                        {{ $service->title }} — {{ $service->formatted_price }}
                                    </option>
                                @endforeach
                            </select>
                            @error('service_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="client_name" class="form-label fw-bold">Ваше имя <span class="text-danger">*</span></label>
                            <input type="text" name="client_name" id="client_name" 
                                   class="form-control form-control-lg @error('client_name') is-invalid @enderror"
                                   value="{{ old('client_name', auth()->user()?->name) }}" 
                                   placeholder="Иван Иванов" required>
                            @error('client_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="client_phone" class="form-label fw-bold">Телефон <span class="text-danger">*</span></label>
                            <input type="tel" name="client_phone" id="client_phone" 
                                   class="form-control form-control-lg @error('client_phone') is-invalid @enderror"
                                   value="{{ old('client_phone', auth()->user()?->phone) }}" 
                                   placeholder="+7 (900) 123-45-67" required>
                            @error('client_phone')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="client_email" class="form-label fw-bold">Email</label>
                            <input type="email" name="client_email" id="client_email" 
                                   class="form-control @error('client_email') is-invalid @enderror"
                                   value="{{ old('client_email', auth()->user()?->email) }}" 
                                   placeholder="mail@example.com">
                            @error('client_email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="address" class="form-label fw-bold">Адрес объекта</label>
                            <textarea name="address" id="address" rows="2" 
                                      class="form-control @error('address') is-invalid @enderror"
                                      placeholder="г. Ижевск, ул. Удмертская, д. 10, кв. 5">{{ old('address') }}</textarea>
                            @error('address')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="comment" class="form-label fw-bold">Комментарий</label>
                            <textarea name="comment" id="comment" rows="3" 
                                      class="form-control @error('comment') is-invalid @enderror"
                                      placeholder="Опишите проблему: насекомые, запах, площадь помещения...">{{ old('comment') }}</textarea>
                            @error('comment')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary-custom btn-lg">
                                <i class="bi bi-send me-2"></i>Отправить заявку
                            </button>
                        </div>

                        <p class="text-muted small mt-3 mb-0 text-center">
                            Нажимая кнопку, вы соглашаетесь с обработкой персональных данных
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection