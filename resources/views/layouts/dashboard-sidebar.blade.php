@php
$currentRoute = request()->route()->getName();
@endphp

<div class="col-lg-3 mb-4">
    <div class="card border-0 shadow-sm">
        <div class="card-body p-0">
            <div class="list-group list-group-flush rounded-0">
                <a href="{{ route('dashboard.index') }}" 
                   class="list-group-item list-group-item-action {{ $currentRoute === 'dashboard.index' ? 'active' : '' }}"
                   @if($currentRoute === 'dashboard.index') style="background: var(--primary); border-color: var(--primary);" @endif>
                    <i class="bi bi-house-door me-2"></i>Обзор
                </a>
                <a href="{{ route('dashboard.orders') }}" 
                   class="list-group-item list-group-item-action {{ str_starts_with($currentRoute, 'dashboard.orders') ? 'active' : '' }}"
                   @if(str_starts_with($currentRoute, 'dashboard.orders')) style="background: var(--primary); border-color: var(--primary);" @endif>
                    <i class="bi bi-calendar-check me-2"></i>Мои заявки
                </a>
                <a href="{{ route('dashboard.profile') }}" 
                   class="list-group-item list-group-item-action {{ $currentRoute === 'dashboard.profile' ? 'active' : '' }}"
                   @if($currentRoute === 'dashboard.profile') style="background: var(--primary); border-color: var(--primary);" @endif>
                    <i class="bi bi-person me-2"></i>Профиль
                </a>

                @if(auth()->user()->isAdmin() || auth()->user()->role === 'manager')
                    <hr class="my-1">
                    <a href="{{ route('admin.dashboard') }}" class="list-group-item list-group-item-action text-warning fw-bold">
                        <i class="bi bi-shield-lock me-2"></i>Админ-панель
                    </a>
                @endif

                <hr class="my-1">
                
                <form action="{{ route('logout') }}" method="POST" class="m-0">
                    @csrf
                    <button type="submit" class="list-group-item list-group-item-action text-danger border-0" style="background: none;">
                        <i class="bi bi-box-arrow-right me-2"></i>Выйти
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>