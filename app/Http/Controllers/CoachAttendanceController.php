<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use Illuminate\View\View;

class CoachAttendanceController extends Controller
{
    public function index(): View
    {
        return view('coach.dashboard', [
            'title' => 'Dashboard Pelatih',
            'attendance_today' => Attendance::whereDate('checked_in_at', today())->count(),
            'pending' => Attendance::whereNull('checked_in_at')->count(),
        ]);
    }

    public function attendance(): View
    {
        return view('coach.attendance', [
            'title' => 'Absensi Latihan',
        ]);
    }
}
