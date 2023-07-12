<?php

use Inertia\Inertia;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;

use App\Http\Controllers\Site\HomeController;
use App\Http\Controllers\Site\ContactController;
use App\Http\Controllers\Dashboard\RolesController;
use App\Http\Controllers\Dashboard\UsersController;
use App\Http\Controllers\Dashboard\EnnuyeuxController;
use App\Http\Controllers\Dashboard\PermissionsController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::resource('contact', ContactController::class)->only(['store']);

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified', 'role:theCreator|admin'])->group(function () {
    Route::resource('/dashboard/users', UsersController::class);
    Route::resource('/dashboard/roles', RolesController::class);
    Route::resource('/dashboard/permissions', PermissionsController::class);
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified', 'role:whatsapp'])->group(function () {
    Route::resource('/dashboard/ennuyeux', EnnuyeuxController::class);
});