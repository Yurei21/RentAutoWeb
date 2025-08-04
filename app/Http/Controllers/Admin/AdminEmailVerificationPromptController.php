<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Inertia\Response;

class AdminEmailVerificationPromptController extends Controller
{
    /**
     * Display the email verification prompt.
     */
    public function __invoke(Request $request): RedirectResponse|Response
    {
        /** @var \Illuminate\Contracts\Auth\MustVerifyEmail $admin */
        $admin = Auth::guard('admin')->user();
        
        return $admin->hasVerifiedEmail()
            ? redirect()->intended(route('admin.dashboard', absolute: false))
            : Inertia::render('AdminAuth/VerifyEmail', ['status' => session('status')]);
    }
}
