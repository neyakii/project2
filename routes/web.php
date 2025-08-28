<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\UserController;

Route::get('/', [ContentController::class, 'landing'])->name('landing');

Route::middleware(['auth'])->group(function () {
    Route::resource('categories', CategoryController::class);
    Route::resource('contents', ContentController::class)->except(['show']);
});

Route::get('/login',            [AuthController::class, 'showLogin'])->name('login');
Route::post('/login',           [AuthController::class, 'login']);

Route::get('/register',         [AuthController::class, 'showRegister'])->name('register');
Route::post('/register',        [AuthController::class, 'register']);

Route::middleware('auth')->group(function () {
    Route::get('/dashboard',    [DashboardController::class, 'index'])->name('dashboard');
    Route::post('/logout',      [AuthController::class, 'logout'])->name('logout');
    
});

Route::get('/contents/{id}', [ContentController::class, 'show'])->name('contents.show');

// admin-only routes
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('dashboard.admin');
    })->name('admin.dashboard');

    Route::resource('users', UserController::class)->only(['index']);
});

// user dashboard
Route::middleware(['auth', 'role:user'])->get('/user/dashboard', function () {
    return view('dashboard.user');
})->name('user.dashboard');