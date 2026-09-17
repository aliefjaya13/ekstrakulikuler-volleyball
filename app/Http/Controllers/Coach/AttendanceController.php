<?php

namespace App\Http\Controllers\Coach;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Models\Schedule;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AttendanceController extends Controller
{
    public function index(): View
    {
        return view('coach.attendance.index', [
            'schedules' => Schedule::latest()->get(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'schedule_id' => 'required|exists:schedules,id',
            'user_id' => 'required|exists:users,id',
            'attendance_status' => 'required|in:present,late,absent,excused',
        ]);

        Attendance::updateOrCreate(
            [
                'schedule_id' => $request->schedule_id,
                'user_id' => $request->user_id,
            ],
            [
                'attendance_status' => $request->attendance_status,
                'confirmed_by' => auth()->id(),
                'notes' => $request->notes,
                'checked_in_at' => now(),
            ]
        );

        return back()->with('success', 'Absensi berhasil disimpan.');
    }
}
