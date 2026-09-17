<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\Ranking;
use Illuminate\View\View;

class RankingController extends Controller
{
    public function index(): View
    {
        return view('member.rankings.index', [
            'rankings' => Ranking::with('user')->orderBy('rank_position')->get(),
        ]);
    }
}
