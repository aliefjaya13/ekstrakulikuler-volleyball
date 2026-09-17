<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): RedirectResponse|View
    {
        $role = auth()->user()->role ?? null;

        return match ($role) {
            'admin' => redirect()->route('admin.dashboard'),
            'coach' => redirect()->route('coach.dashboard'),
            'member' => redirect()->route('member.dashboard'),
            default => view('dashboard'),
        };
    }
}
