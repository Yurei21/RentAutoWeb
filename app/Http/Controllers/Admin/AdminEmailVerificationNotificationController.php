<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminEmailVerificationNotificationController extends Controller
{
    /**
     * Send a new email verification notification.
     */
    public function store(Request $request): RedirectResponse
    {
        /** @var \Illuminate\Contracts\Auth\MustVerifyEmail $admin */
        $admin = Auth::guard('admin')->user();

        if ($admin->hasVerifiedEmail()) {
            return redirect()->intended(route('admin.dashboard', absolute: false));
        }

        $admin->sendEmailVerificationNotification();

        return back()->with('status', 'verification-link-sent');
    }
}
