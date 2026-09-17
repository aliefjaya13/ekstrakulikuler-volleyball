<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Models\Schedule;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AttendanceController extends Controller
{
    public function index(): View
    {
        $memberId = auth()->id();

        return view('member.attendance.index', [
            'title' => 'Absensi Saya',
            'schedules' => Schedule::where('is_active', true)->latest('schedule_date')->get(),
            'records' => Attendance::with('schedule')->where('user_id', $memberId)->latest('updated_at')->get(),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'schedule_id' => ['required', 'exists:schedules,id'],
            'attendance_status' => ['required', 'in:present,late,absent,excused'],
            'notes' => ['nullable', 'string', 'max:255'],
        ]);

        Attendance::updateOrCreate(
            [
                'schedule_id' => $validated['schedule_id'],
                'user_id' => auth()->id(),
            ],
            [
                'attendance_status' => $validated['attendance_status'],
                'notes' => $validated['notes'] ?? null,
                'checked_in_at' => now(),
                'confirmed_by' => auth()->id(),
            ]
        );

        return redirect()->route('member.attendance.index')->with('success', 'Absensi manual berhasil dicatat.');
    }
}
