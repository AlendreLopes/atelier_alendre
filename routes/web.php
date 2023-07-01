<?php

use Inertia\Inertia;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;

use App\Http\Controllers\Site\HomeController;
use App\Http\Controllers\Site\ContactController;
use App\Http\Controllers\Dashboard\EnnuyeuxController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::resource('contact', ContactController::class)->only(['store']);

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
    Route::get('/dashboard/ennuyeux-quoi-de-neuf', [EnnuyeuxController::class, 'ennuyex-bavard'])->name('bavard');
    Route::get('/dashboard/quoi-de-neuf', [EnnuyeuxController::class, 'quoiDeNeuf'])->name('quoi-de-neuf');
});