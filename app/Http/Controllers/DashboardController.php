<?php

namespace App\Http\Controllers;

use App\Models\Clas;
use App\Models\Competency;
use App\Models\Progress;
use App\Models\Question;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $competency = Competency::all();
        $progress = Progress::where('user_id', auth()->user()->id)
                                ->whereHas('competency', function ($query) {
                                    $query->where('id', '!=', 6);
                                })
                                ->with('competency')
                                ->get();
        
        $passed = DB::table('results as r')
                    ->selectRaw('COUNT(r.id) as total, COALESCE(SUM(r.score), 0) / COUNT(r.id) as score')
                    ->where('r.user_id', auth()->user()->id)
                    ->where('r.passed', 1)
                    ->where('r.competency_id', '!=', 6)
                    ->first();

        $project = DB::table('results as r')
                    ->selectRaw('r.score')
                    ->where('r.user_id', auth()->user()->id)
                    ->where('r.passed', 1)
                    ->where('r.competency_id', '=', 6)
                    ->first();

        $totalClass = Clas::count();
        $totalStudent = User::role('student')->count();
        $totalMateri = Competency::where('id', '!=', 6)->count();
        $totalQuestion = Question::where('competency_id', '!=', 6)->count();

        return view('dashboard', compact('competency', 'progress', 'passed', 'project', 'totalClass', 'totalStudent', 'totalMateri', 'totalQuestion'));
    }
}
