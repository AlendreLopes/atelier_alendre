<?php

use Inertia\Inertia;

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Site\HomeController;
use App\Http\Controllers\Site\ContactController;

use App\Http\Controllers\Dashboard\RolesController;

use App\Http\Controllers\Dashboard\UsersController;
use App\Http\Controllers\Dashboard\EnnuyeuxController;

use App\Http\Controllers\Dashboard\PermissionsController;

use App\Http\Controllers\Dashboard\RolesPermissionRevokeController;

use App\Http\Controllers\Dashboard\UserRoleRevokeController;
use App\Http\Controllers\Dashboard\UserPermissionRevokeController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::resource('contact', ContactController::class)->only(['store']);

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
    // Route::resource('/dashboard', DashboardController::class);
});

Route::middleware(['auth', config('jetstream.auth_session'), 'verified', 'role:theCreator|admin'])->group(function () {
    Route::resource('/dashboard/users', UsersController::class);
    Route::resource('/dashboard/roles', RolesController::class);
    Route::resource('/dashboard/permissions', PermissionsController::class);
    // Delete Roles and Permissions
    Route::delete('/dashboard/roles/{role}/permissions/{permission}', RolesPermissionRevokeController::class)
        ->name('roles.permissions.revoke');
    Route::delete('/dashboard/users/{user}/role/{role}', UserRoleRevokeController::class)
        ->name('users.roles.revoke');
    Route::delete('/dashboard/users/{user}/permissions/{permission}', UserPermissionRevokeController::class)
        ->name('users.permissions.revoke');
});

Route::middleware(['auth', config('jetstream.auth_session'), 'verified', 'role:whatsapp'])->group(function () {
    Route::resource('/dashboard/ennuyeux', EnnuyeuxController::class);
});