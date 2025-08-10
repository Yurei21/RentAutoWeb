<?php

namespace App\Providers;

use Illuminate\Support\Facades\Vite;
use Illuminate\Support\ServiceProvider;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Auth\Notifications\VerifyEmail;
use App\Models\Admin;
use Illuminate\Support\Facades\URL;

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

        VerifyEmail::createUrlUsing(function ($notifiable) {
            if ($notifiable instanceof Admin) {
                return URL::temporarySignedRoute(
                    'admin.verification.verify',
                    now()->addMinutes(60),
                    [
                        'id' => $notifiable->getKey(),
                        'hash' => sha1($notifiable->getEmailForVerification()),
                    ]
                );
            }

            return URL::temporarySignedRoute(
                'verification.verify',
                now()->addMinutes(60),
                [
                    'email' => $notifiable->email,
                    'hash' => sha1($notifiable->getEmailForVerification()),
                ]
            );
        });

        ResetPassword::createUrlUsing(function ($notifiable, $token) {
            if ($notifiable instanceof Admin) {
                return url(route('admin.password.reset', [
                    'id' => $notifiable->getKey(),
                    'hash' => sha1($notifiable->getEmailForVerification()),
                ], false));
            }

            return url(route('password.reset', [
                'token' => $token,
                'email' => $notifiable->email,
            ], false));
        });
    }
}
