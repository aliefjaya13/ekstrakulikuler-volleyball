<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthController extends Controller
{
    public function showLoginForm(): View
    {
        return view('auth.login');
    }

    public function login(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended($this->redirectToDashboard());
        }

        return back()->withErrors([
            'email' => 'Kredensial yang Anda masukkan tidak valid.',
        ])->onlyInput('email');
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }

    protected function redirectToDashboard(): string
    {
        $role = Auth::user()->role;

        return match ($role) {
            'admin' => route('admin.dashboard'),
            'coach' => route('coach.dashboard'),
            'member' => route('member.dashboard'),
            default => route('dashboard'),
        };
    }
}
