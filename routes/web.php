<?php

use App\Http\Controllers\AdminProfileController;
use App\Http\Controllers\MaintenanceController;
use App\Http\Controllers\PaymentsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RentalsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VehicleController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/admin-dashboard', function() {
    return Inertia::render('AdminDashboard');
})->middleware(['auth:admin', 'verified'] )->name('admin.dashboard');

Route::middleware('auth:admin')->group( function () {
    Route::get('/admin-profile', [AdminProfileController::class, 'edit'])->name('admin.profile.edit');
    Route::patch('/admin-profile', [AdminProfileController::class, 'update'])->name('admin.profile.update');
    Route::delete('/admin-profile', [AdminProfileController::class, 'destroy'])->name('admin.profile.destroy');

    Route::resource('vehicles', VehicleController::class);
    Route::resource('users', UserController::class);
    Route::resource('vehicles.maintenances', MaintenanceController::class);
    Route::resource('rentals', RentalsController::class);
    Route::resource('payments', PaymentsController::class);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
require __DIR__.'/adminAuth.php';
