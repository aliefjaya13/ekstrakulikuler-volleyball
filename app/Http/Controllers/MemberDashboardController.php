<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Ranking;
use Illuminate\View\View;

class MemberDashboardController extends Controller
{
    public function index(): View
    {
        $userId = auth()->id();

        return view('member.dashboard', [
            'title' => 'Dashboard Peserta',
            'attendance' => Attendance::where('user_id', $userId)->count(),
            'rank' => Ranking::where('user_id', $userId)->orderBy('rank_position')->value('rank_position') ?? 0,
        ]);
    }
}
