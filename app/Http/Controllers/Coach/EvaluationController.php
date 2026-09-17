<?php

namespace App\Http\Controllers\Coach;

use App\Http\Controllers\Controller;
use App\Models\Evaluation;
use App\Models\Schedule;
use Illuminate\Http\Request;
use Illuminate\View\View;

class EvaluationController extends Controller
{
    public function index(): View
    {
        return view('coach.evaluations.index', [
            'evaluations' => Evaluation::with(['user', 'schedule'])->latest()->get(),
        ]);
    }

    public function create(): View
    {
        return view('coach.evaluations.create', [
            'schedules' => Schedule::latest()->get(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'schedule_id' => 'required|exists:schedules,id',
            'user_id' => 'required|exists:users,id',
            'attendance_score' => 'required|numeric|min:0|max:100',
            'performance_score' => 'required|numeric|min:0|max:100',
            'discipline_score' => 'required|numeric|min:0|max:100',
        ]);

        $total = $request->attendance_score + $request->performance_score + $request->discipline_score;

        Evaluation::updateOrCreate(
            [
                'schedule_id' => $request->schedule_id,
                'user_id' => $request->user_id,
            ],
            [
                'evaluator_id' => auth()->id(),
                'attendance_score' => $request->attendance_score,
                'performance_score' => $request->performance_score,
                'discipline_score' => $request->discipline_score,
                'total_score' => $total,
                'notes' => $request->notes,
            ]
        );

        return redirect()->route('coach.evaluations.index')->with('success', 'Penilaian berhasil disimpan.');
    }
}
