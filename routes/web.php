<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/contacts', [PageController::class, 'contacts'])->name('contacts');
Route::post('/newsletter/subscribe', [PageController::class, 'newsletterSubscribe'])->name('newsletter.subscribe');
Route::get('/api/call-manager', [PageController::class, 'getManagerPhone'])->name('api.call-manager');

Route::prefix('services')->name('services.')->group(function () {
    Route::get('/', [ServiceController::class, 'index'])->name('index');
    Route::get('/{slug}', [ServiceController::class, 'show'])->name('show');
});


Route::prefix('order')->name('order.')->group(function () {
    Route::get('/', [OrderController::class, 'create'])->name('create');
    Route::post('/', [OrderController::class, 'store'])->name('store');
    Route::get('/success/{order}', [OrderController::class, 'success'])->name('success');
});


Route::prefix('articles')->name('articles.')->group(function () {
    Route::get('/', [ArticleController::class, 'index'])->name('index');
    Route::get('/{slug}', [ArticleController::class, 'show'])->name('show');
});


Route::prefix('reviews')->name('reviews.')->group(function () {
    Route::get('/', [ReviewController::class, 'index'])->name('index');
    Route::post('/', [ReviewController::class, 'store'])->name('store');
});


Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
    Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [RegisterController::class, 'register']);
});
Route::post('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');


Route::prefix('dashboard')->name('dashboard.')->middleware('auth')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('index');
    Route::get('/orders', [DashboardController::class, 'orders'])->name('orders');
    Route::get('/orders/{order}', [DashboardController::class, 'orderShow'])->name('orders.show');
    Route::get('/profile', [DashboardController::class, 'profile'])->name('profile');
    Route::patch('/profile', [DashboardController::class, 'updateProfile'])->name('profile.update');
    Route::post('/subscribe', [DashboardController::class, 'subscribe'])->name('subscribe');
});


Route::prefix('admin')->name('admin.')->middleware(['auth', 'role:admin,manager'])->group(function () {
    
    Route::get('/', [AdminController::class, 'dashboard'])->name('dashboard');
    
    Route::get('/services', [AdminController::class, 'servicesIndex'])->name('services.index');
    Route::get('/services/create', [AdminController::class, 'servicesCreate'])->name('services.create');
    Route::post('/services', [AdminController::class, 'servicesStore'])->name('services.store');
    Route::get('/services/{service}/edit', [AdminController::class, 'servicesEdit'])->name('services.edit');
    Route::patch('/services/{service}', [AdminController::class, 'servicesUpdate'])->name('services.update');
    Route::delete('/services/{service}', [AdminController::class, 'servicesDestroy'])->name('services.destroy');
    
    Route::get('/orders', [AdminController::class, 'ordersIndex'])->name('orders.index');
    Route::get('/orders/{order}', [AdminController::class, 'ordersShow'])->name('orders.show');
    Route::patch('/orders/{order}/status', [AdminController::class, 'ordersUpdateStatus'])->name('orders.status');
    Route::post('/orders/{order}/notify', [AdminController::class, 'ordersNotify'])->name('orders.notify');
    
    Route::get('/articles', [AdminController::class, 'articlesIndex'])->name('articles.index');
    Route::get('/articles/create', [AdminController::class, 'articlesCreate'])->name('articles.create');
    Route::post('/articles', [AdminController::class, 'articlesStore'])->name('articles.store');
    Route::get('/articles/{article}/edit', [AdminController::class, 'articlesEdit'])->name('articles.edit');
    Route::patch('/articles/{article}', [AdminController::class, 'articlesUpdate'])->name('articles.update');
    Route::delete('/articles/{article}', [AdminController::class, 'articlesDestroy'])->name('articles.destroy');
    
    Route::get('/reviews', [AdminController::class, 'reviewsIndex'])->name('reviews.index');
    Route::patch('/reviews/{review}/approve', [AdminController::class, 'reviewsApprove'])->name('reviews.approve');
    Route::patch('/reviews/{review}/reject', [AdminController::class, 'reviewsReject'])->name('reviews.reject');
    Route::delete('/reviews/{review}', [AdminController::class, 'reviewsDestroy'])->name('reviews.destroy');
    
    Route::get('/users', [AdminController::class, 'usersIndex'])->name('users.index');
    Route::get('/users/{user}', [AdminController::class, 'usersShow'])->name('users.show');
    Route::patch('/users/{user}/role', [AdminController::class, 'usersUpdateRole'])->name('users.role')->middleware('role:admin');
    
    Route::get('/statistics', [AdminController::class, 'statistics'])->name('statistics');
});