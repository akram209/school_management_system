<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();
        if (Auth::user()->role == 'student') {
            return redirect()->intended(route('student.profile', Auth::user()->id));
        }
        if (Auth::user()->role == 'parent') {
            return redirect()->intended(route('parent.profile', Auth::user()->id));
        }
        if (Auth::user()->role == 'teacher') {
            return redirect()->intended(route('teacher.profile', Auth::user()->id));
        }

        if (Auth::user()->role == 'admin') {
            return redirect()->intended(route('admin.profile', Auth::user()->id));
        }
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
