<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register', [\App\Http\Controllers\RegistrationController::class, 'showForm']);
Route::post('/register', [\App\Http\Controllers\RegistrationController::class, 'register']);

Route::get('/login', [App\Http\Controllers\LoginController::class, 'showForm']);
Route::post('/login', [App\Http\Controllers\LoginController::class, 'login']);
Route::get('/logout', [App\Http\Controllers\LoginController::class, 'logout']);

Route::get('/dashboard', function () {
    return view('dashboard');
});

// Личный кабинет — заявки
Route::get('/applications', [App\Http\Controllers\ApplicationController::class, 'index']);

// Добавление отзыва
Route::post('/applications/{id}/review', [App\Http\Controllers\ApplicationController::class, 'addReview']);

// Форма создания заявки
Route::get('/applications/create', [App\Http\Controllers\ApplicationController::class, 'create']);

// Обработка формы
Route::post('/applications/create', [App\Http\Controllers\ApplicationController::class, 'store']);

// Админ-панель
Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index']);

// Обновление статуса заявки
Route::post('/admin/applications/{id}/status', [App\Http\Controllers\AdminController::class, 'updateStatus']);
