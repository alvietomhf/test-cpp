<?php

namespace App\Http\Controllers;

use App\Models\Clas;
use App\Models\Competency;
use App\Models\McqResult;
use App\Models\McQuestion;
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
        
        $playground = DB::table('results as r')
                    ->selectRaw('COUNT(r.id) as total')
                    ->where('r.user_id', auth()->user()->id)
                    ->where('r.competency_id', '!=', 4)
                    ->first();

        $mcq = DB::table('mcq_results as r')
                    ->selectRaw('r.score')
                    ->where('r.user_id', auth()->user()->id)
                    ->first();

        $project = DB::table('results as r')
                    ->selectRaw('r.score')
                    ->where('r.user_id', auth()->user()->id)
                    ->where('r.passed', 1)
                    ->where('r.competency_id', '=', 4)
                    ->first();

        $question = Question::where('competency_id', 4)
                    ->with([
                        'descriptions',
                        'descriptions.firstAnswers',
                        'descriptions.firstAnswers.secondAnswers',
                        'descriptions.firstAnswers.secondAnswers.thirdAnswers',
                    ])
                    ->first();

        $totalFirstAnswers = 0;
        $totalSecondAnswers = 0;
        $totalThirdAnswers = 0;
        
        foreach ($question->descriptions as $description) {
            $firstAnswers = $description->firstAnswers;
            $totalFirstAnswers += $firstAnswers->count();
        
            foreach ($firstAnswers as $firstAnswer) {
                $secondAnswers = $firstAnswer->secondAnswers;
                $totalSecondAnswers += $secondAnswers->count();
        
                foreach ($secondAnswers as $secondAnswer) {
                    $thirdAnswers = $secondAnswer->thirdAnswers;
                    $totalThirdAnswers += $thirdAnswers->count();
                }
            }
        }

        $totalClass = Clas::count();
        $totalStudent = User::role('student')->count();
        $totalMateri = Competency::where('id', '!=', 4)->count();

        $countQuestion = Question::count();
        $countMcQuestion = McQuestion::count();
        $totalQuestion = $countQuestion + $countMcQuestion;

        $maxScoreCode = $totalFirstAnswers + $totalSecondAnswers + $totalThirdAnswers;
        $maxScoreMcq = $countMcQuestion;

        return view('dashboard', compact('competency', 'playground', 'mcq', 'project', 'totalClass', 'totalStudent', 'totalMateri', 'totalQuestion', 'maxScoreCode', 'maxScoreMcq'));
    }
}