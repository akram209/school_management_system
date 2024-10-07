<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Authenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            if (Auth::user()->role == 'student') {
                return redirect()->route('student.profile', Auth::user()->id);
            }
            if (Auth::user()->role == 'parent') {
                return redirect()->route('parent.profile', Auth::user()->id);
            }
            if (Auth::user()->role == 'teacher') {
                return redirect()->route('teacher.profile', Auth::user()->id);
            }
            if (Auth::user()->role == 'admin') {
                return redirect()->route('admin.profile', Auth::user()->id);
            }
        }
    }
}
