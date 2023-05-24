<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Score;
use Illuminate\Http\Request;
use App\Models\Participation;
use Illuminate\Support\Facades\Auth;

class ScoreHistoryController extends Controller
{
    public function index(Request $request) {

        $displayQty = $request->items ?? config('app.pagination');

        $score = Score::where('user_id', Auth::id())->first();
        $participation = Participation::where('user_id', Auth::id())->Approved()->paginate($displayQty)->withQueryString();
        $participation->loadMissing('challenge');

        return Inertia::render('Profile/PointsHistory', [
            'score' => $score,
            'participation' => $participation,
            'displayQty' => $displayQty
        ]);
	}
}
