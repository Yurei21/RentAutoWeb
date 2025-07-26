<?php

use App\Http\Controllers\Auth\AdminRegisteredUserController;
use App\Http\Controllers\Auth\AdminAuthenticatedSessionController;
use App\Http\Controllers\Auth\AdminEmailVerificationPromptController;
use App\Http\Controllers\Auth\AdminEmailVerificationNotificationController;
use App\Http\Controllers\Auth\AdminVerifyEmailController;
use App\Http\Controllers\Auth\AdminPasswordController;
use App\Http\Controllers\Auth\AdminPasswordResetLinkController;
use App\Http\Controllers\Auth\AdminNewPasswordController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->name('admin.')->middleware('guest:admin')->group(function () {
    Route::get('login', [AdminAuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('login', [AdminAuthenticatedSessionController::class, 'store']);

    Route::get('register', [AdminRegisteredUserController::class, 'create'])->name('register');
    Route::post('register', [AdminRegisteredUserController::class, 'store']);

    Route::get('forgot-password', [AdminPasswordResetLinkController::class, 'create'])->name('password.request');
    Route::post('forgot-password', [AdminPasswordResetLinkController::class, 'store'])->name('password.email');

    Route::get('reset-password/{token}', [AdminNewPasswordController::class, 'create'])->name('password.reset');
    Route::post('reset-password', [AdminNewPasswordController::class, 'store'])->name('password.update');
});

Route::prefix('admin')->name('admin.')->middleware(['auth:admin', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return inertia('Admin/Dashboard'); 
    })->name('dashboard');

    Route::put('password', [AdminPasswordController::class, 'update'])->name('password.update');

    Route::post('logout', [AdminAuthenticatedSessionController::class, 'destroy'])->name('logout');
});

Route::prefix('admin')->name('admin.')->middleware(['auth:admin'])->group(function () {
    Route::get('verify-email', AdminEmailVerificationPromptController::class)->name('verification.notice');
    Route::get('verify-email/{id}/{hash}', [AdminVerifyEmailController::class, '__invoke'])->middleware(['signed'])->name('verification.verify');
    Route::post('email/verification-notification', [AdminEmailVerificationNotificationController::class, 'store'])->middleware(['throttle:6,1'])->name('verification.send');
});