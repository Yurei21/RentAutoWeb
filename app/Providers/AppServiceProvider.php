<?php

namespace App\Providers;

use Illuminate\Support\Facades\Vite;
use Illuminate\Support\ServiceProvider;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Auth\Notifications\VerifyEmail;
use App\Models\Admin;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Vite::prefetch(concurrency: 3);

        VerifyEmail::createUrlUsing(function ($notifiable, $token) {
            if ($notifiable instanceof Admin) {
                return url(route('admin.verification.verify', [
                    'token' => $token,
                    'email' => $notifiable->email,
                ], false));
            }

            return url(route('verification.verify', [
                'token' => $token,
                'email' => $notifiable->email,
            ], false));
        });

        ResetPassword::createUrlUsing(function ($notifiable, $token) {
            if ($notifiable instanceof Admin) {
                return url(route('admin.password.reset', [
                    'token' => $token,
                    'email' => $notifiable->email,
                ], false));
            }

            return url(route('password.reset', [
                'token' => $token,
                'email' => $notifiable->email,
            ], false));
        });
    }
}
