<?php

use App\Http\Middleware\AuthMiddleware;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register', [\App\Http\Controllers\RegistrationController::class, 'showForm']);
Route::post('/register', [\App\Http\Controllers\RegistrationController::class, 'register']);

Route::get('/login', [App\Http\Controllers\LoginController::class, 'showForm']);
Route::post('/login', [App\Http\Controllers\LoginController::class, 'login']);
Route::get('/logout', [App\Http\Controllers\LoginController::class, 'logout']);

Route::middleware([AuthMiddleware::class])->group(function () {
    Route::get('/applications', [App\Http\Controllers\ApplicationController::class, 'index']);
    Route::post('/applications/{id}/review', [App\Http\Controllers\ApplicationController::class, 'addReview']);
    Route::get('/applications/create', [App\Http\Controllers\ApplicationController::class, 'create']);
    Route::post('/applications/create', [App\Http\Controllers\ApplicationController::class, 'store']);
    Route::get('/dashboard', function () {
        return view('dashboard');
    });
});

Route::middleware([AdminMiddleware::class])->group(function () {
    Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index']);
    Route::post('/admin/applications/{id}/status', [App\Http\Controllers\AdminController::class, 'updateStatus']);
});


// Route::get('/dashboard', function () {
//     return view('dashboard');
// });

// Route::get('/applications', [App\Http\Controllers\ApplicationController::class, 'index']);

// Route::post('/applications/{id}/review', [App\Http\Controllers\ApplicationController::class, 'addReview']);

// Route::get('/applications/create', [App\Http\Controllers\ApplicationController::class, 'create']);

// Route::post('/applications/create', [App\Http\Controllers\ApplicationController::class, 'store']);

// Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index']);

// Route::post('/admin/applications/{id}/status', [App\Http\Controllers\AdminController::class, 'updateStatus']);
