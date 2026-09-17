<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Ranking;
use App\Models\Schedule;
use App\Models\User;
use Illuminate\View\View;

class AdminDashboardController extends Controller
{
    public function index(): View
    {
        return view('admin.dashboard', [
            'title' => 'Dashboard Admin',
            'summary' => [
                'users' => User::count(),
                'schedules' => Schedule::count(),
                'attendance' => Attendance::count(),
                'rankings' => Ranking::count(),
            ],
        ]);
    }
}
