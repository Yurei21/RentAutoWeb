<?php

use App\Http\Controllers\Admin\AdminConfirmablePasswordController;
use App\Http\Controllers\Admin\AdminRegisteredUserController;
use App\Http\Controllers\Admin\AdminAuthenticatedSessionController;
use App\Http\Controllers\Admin\AdminEmailVerificationPromptController;
use App\Http\Controllers\Admin\AdminEmailVerificationNotificationController;
use App\Http\Controllers\Admin\AdminVerifyEmailController;
use App\Http\Controllers\Admin\AdminPasswordController;
use App\Http\Controllers\Admin\AdminPasswordResetLinkController;
use App\Http\Controllers\Admin\AdminNewPasswordController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->name('admin.')->middleware('guest:admin')->group(function () {
    Route::get('admin-register', [AdminRegisteredUserController::class, 'create'])->name('register');
    Route::post('admin-register', [AdminRegisteredUserController::class, 'store']);

    Route::get('admin-login', [AdminAuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('admin-login', [AdminAuthenticatedSessionController::class, 'store']);

    Route::get('admin-forgot-password', [AdminPasswordResetLinkController::class, 'create'])->name('password.request');
    Route::post('admin-forgot-password', [AdminPasswordResetLinkController::class, 'store'])->name('password.email');
    Route::post('admin-forgot-password', [AdminPasswordResetLinkController::class, 'store'])->name('password.store');

    Route::get('admin-reset-password/{token}', [AdminNewPasswordController::class, 'create'])->name('password.reset');
    Route::post('admin-reset-password', [AdminNewPasswordController::class, 'store'])->name('password.store');
});

Route::prefix('admin')->name('admin.')->middleware('auth:admin')->group(function () {
    Route::get('admin-verify-email', AdminEmailVerificationPromptController::class)->name('verification.notice');
    Route::get('admin-verify-email/{id}/{hash}', [AdminVerifyEmailController::class, '__invoke'])
        ->middleware(['signed', 'throttle:6,1'])->name('verification.verify');
    Route::post('admin-email/verification-notification', [AdminEmailVerificationNotificationController::class, 'store'])
        ->middleware('throttle:6,1')->name('verification.send');

    Route::get('admin-confirm-password', [AdminConfirmablePasswordController::class, 'show'])->name('password.confirm');
    Route::post('admin-confirm-password', [AdminConfirmablePasswordController::class, 'store']);

    Route::put('admin-password', [AdminPasswordController::class, 'update'])->name('password.update');

    Route::post('admin-logout', [AdminAuthenticatedSessionController::class, 'destroy'])->name('logout');
});