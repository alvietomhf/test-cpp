<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Competency;
use App\Models\Progress;
use App\Models\Question;
use App\Models\RdFirstAnswer;
use App\Models\RdSecondAnswer;
use App\Models\RdThirdAnswer;
use App\Models\Result;
use App\Models\ResultDescription;
use App\Models\ResultDetail;
use App\Models\ResultDetailAnswer;
use App\Models\User;
use ErrorException;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Barryvdh\DomPDF\Facade\Pdf;

class TestController extends Controller
{
    public function show(Competency $competency)
    {
        $progress = Progress::where([
                                'user_id' => auth()->user()->id,
                                'competency_id' => $competency->id,
                            ])
                            ->with('competency')
                            ->first();

        $currentProgress = Progress::where([
                                'user_id' => auth()->user()->id,
                                'status' => 'unlock',
                            ])
                            ->with('competency')
                            ->first();

        if ($progress->status === 'lock') {
            flash('Tes '. $competency->title . ' terkunci! Selesaikan tes berikut terlebih dahulu')->warning();
            return redirect()->route('student.test.show', [$currentProgress->competency->slug]);
        }
                                        
        return view('test.show', compact('progress'));
    }

    public function start(Competency $competency)
    {
        $progress = Progress::where([
                                'user_id' => auth()->user()->id,
                                'competency_id' => $competency->id,
                            ])
                            ->with('competency')
                            ->first();

        $currentProgress = Progress::where([
                                'user_id' => auth()->user()->id,
                                'status' => 'unlock',
                            ])
                            ->with('competency')
                            ->first();

        if ($progress->status === 'lock') {
            flash('Tes '. $competency->title . ' terkunci! Selesaikan tes berikut terlebih dahulu')->warning();
            return redirect()->route('student.test.show', [$currentProgress->competency->slug]);
        }
        if ($progress->status === 'passed') {
            flash('Tes '. $competency->title . ' sudah selesai!')->warning();
            return redirect()->route('student.test.show', [$progress->competency->slug]);
        }

        $totalQuestion = $competency->id === 3 ? 4 : 3;
        $data = Question::where('competency_id', $competency->id)
                        ->with([
                            'descriptions',
                            'descriptions.firstAnswers',
                            'descriptions.firstAnswers.secondAnswers',
                            'descriptions.firstAnswers.secondAnswers.thirdAnswers',
                        ])
                        ->get()
                        ->shuffle()
                        ->take($totalQuestion);

        return view('test.start', compact('data', 'competency'));
    }

    public function storeResult(Request $request, Competency $competency)
    {
        try {
            $count = Result::where([
                                'user_id' => auth()->user()->id,
                                'competency_id' => $competency->id,
                            ])
                            ->count();

            $data = $request->data;
            $totalQuestion = $competency->id === 3 ? 4 : 3;
            $failedScore = 30;
            $score = 0;
            $passed = 0;
            $attempt = $count + 1;
            $trialReduction = $count * 2;

            DB::beginTransaction();

            $result = Result::create([
                'user_id' => auth()->user()->id,
                'competency_id' => $competency->id,
                'trial_reduction' => $trialReduction,
                'attempt' => $attempt,
            ]);

            foreach ($data as $key => $dataValue) {
                $question = Question::where('id', $dataValue['id'])
                                ->with([
                                    'descriptions',
                                    'descriptions.firstAnswers',
                                    'descriptions.firstAnswers.firstKeys',
                                    'descriptions.firstAnswers.secondAnswers',
                                    'descriptions.firstAnswers.secondAnswers.secondKeys',
                                    'descriptions.firstAnswers.secondAnswers.thirdAnswers',
                                    'descriptions.firstAnswers.secondAnswers.thirdAnswers.thirdKeys',
                                ])
                                ->first();

                $script = $dataValue['script'] ?? 'Tidak ada code';
                $script = preg_replace('/\s+/', '', trim($script));
                $script = strtolower($script);
                $output = $dataValue['result'] ?? 'Tidak ada output';
                $output = preg_replace('/\s+/', '', trim($output));
                $output = strtolower($output);

                // Log::info('script: '. $script);
                // Log::info('output: '. $output);

                $is_timeup = $dataValue['time']['isTimeUp'] === "true" ? 1 : 0;
                $is_success = $dataValue['success'] === "true" ? 1 : 0;

                $questionScore = 0;

                $isOutputMatch = false;

                $outputDetail = preg_replace('/\s+/', '', trim($question->output));
                $outputDetail = strtolower($outputDetail);
                // Log::info('outputDetail: '. $outputDetail);

                if (strcmp($outputDetail, $output) === 0) $isOutputMatch = true;

                $resultDetail = ResultDetail::create([
                    'result_id' => $result->id,
                    'question_id' => $question->id,
                    'answer' => $dataValue['script'] ?? 'Tidak ada code',
                    'output' => $dataValue['result'] ?? 'Tidak ada output',
                    'is_output_match' => $isOutputMatch,
                    'timeup' => +$dataValue['time']['timeUp'],
                    'is_timeup' => $is_timeup,
                    'is_success' => $is_success,
                ]);

                foreach ($question->descriptions as $key => $description) {
                    $resultDescription = ResultDescription::create([
                        'result_detail_id' => $resultDetail->id,
                        'description_id' => $description->id,
                    ]);

                    foreach ($description->firstAnswers as $key => $firstAnswer) {
                        $rdFirstAnswer = RdFirstAnswer::create([
                            'result_description_id' => $resultDescription->id,
                            'first_answer_id' => $firstAnswer->id,
                        ]);

                        foreach ($firstAnswer->firstKeys as $key => $firstKey) {
                            $firstDetail = preg_replace('/\s+/', '', trim($firstKey->detail));
                            $firstDetail = strtolower($firstDetail); 

                            if (str_contains($script, $firstDetail)) {
                                $rdFirstAnswer->update(['correct' => 1]);
                                $questionScore += $firstAnswer->score;
                                break;
                            }
                        }

                        if ($firstAnswer->nested) {
                            foreach ($firstAnswer->secondAnswers as $key => $secondAnswer) {
                                $rdSecondAnswer = RdSecondAnswer::create([
                                    'rdfirst_answer_id' => $rdFirstAnswer->id,
                                    'second_answer_id' => $secondAnswer->id,
                                ]);

                                foreach ($secondAnswer->secondKeys as $key => $secondKey) {
                                    $secondDetail = preg_replace('/\s+/', '', trim($secondKey->detail));
                                    $secondDetail = strtolower($secondDetail); 
        
                                    if (str_contains($script, $secondDetail)) {
                                        $rdSecondAnswer->update(['correct' => 1]);
                                        $questionScore += $secondAnswer->score;
                                        break;
                                    }
                                }

                                if ($secondAnswer->nested) {
                                    foreach ($secondAnswer->thirdAnswers as $key => $thirdAnswer) {
                                        $rdThirdAnswer = RdThirdAnswer::create([
                                            'rdsecond_answer_id' => $rdSecondAnswer->id,
                                            'third_answer_id' => $thirdAnswer->id,
                                        ]);

                                        foreach ($thirdAnswer->thirdKeys as $key => $thirdKey) {
                                            $thirdDetail = preg_replace('/\s+/', '', trim($thirdKey->detail));
                                            $thirdDetail = strtolower($thirdDetail); 
                
                                            if (str_contains($script, $thirdDetail)) {
                                                $rdThirdAnswer->update(['correct' => 1]);
                                                $questionScore += $thirdAnswer->score;
                                                break;
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }

                $questionScore = $is_success ? $questionScore : ($questionScore - $failedScore);
                $questionScore = max($questionScore, 0);
                $resultDetail->update(['score' => $questionScore]);
                $score += $questionScore;
            }

            $score = round($score / $totalQuestion);
            $realScore = $score;

            if ($count) $score = $realScore - $trialReduction;
            // Log::info('Score : ' . $score);
            // Log::info('Realscore : ' . $realScore);

            if ($score >= 75) {
                $passed = 1;
                $nextCompetencyId = $competency->id + 1;

                Progress::where([
                            'user_id' => auth()->user()->id,
                            'competency_id' => $competency->id,
                        ])
                        ->update(['status' => 'passed']);

                if ($competency->id < 4) {
                    Progress::where([
                                'user_id' => auth()->user()->id,
                                'competency_id' => $nextCompetencyId,
                            ])
                            ->update(['status' => 'unlock']);
                }
            }

            $result->update([
                'score' => $score,
                'real_score' => $realScore,
                'passed' => $passed,
            ]);

            DB::commit();
            
            return response()->json([
                'success' => true,
                'message' => 'Answer successfully stored',
                'url' => route('dashboard'),
            ]);
        } catch (Exception $e) {
            DB::rollBack();

            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ], $e->getCode());
        }
    }

    public function result(Competency $competency)
    {
        $progress = Progress::where([
                                'user_id' => auth()->user()->id,
                                'competency_id' => $competency->id,
                            ])
                            ->with('competency')
                            ->first();

        $currentProgress = Progress::where([
                                'user_id' => auth()->user()->id,
                                'status' => 'unlock',
                            ])
                            ->with('competency')
                            ->first();

        if ($progress->status === 'unlock') {
            flash('Tes '. $competency->title . ' belum selesai! Selesaikan terlebih dahulu')->warning();
            return redirect()->route('student.test.show', [$currentProgress->competency->slug]);
        }
        if ($progress->status === 'lock') {
            flash('Tes '. $competency->title . ' terkunci! Selesaikan tes berikut terlebih dahulu')->warning();
            return redirect()->route('student.test.show', [$currentProgress->competency->slug]);
        }

        $result = Result::where([
                        'user_id' => auth()->user()->id,
                        'competency_id' => $competency->id
                    ])
                    ->with('competency')
                    ->orderBy('created_at', 'desc')
                    ->get();

        return view('test.result', compact('competency', 'result'));
    }

    public function showResult(Competency $competency, $id)
    {
        $data = Result::where([
                        'id' => $id,
                        'user_id' => auth()->user()->id,
                    ])
                    ->with([
                        'resultDetails',
                        'resultDetails.resultDescriptions',
                        'resultDetails.resultDescriptions.description',
                        'resultDetails.resultDescriptions.rdFirstAnswers',
                        'resultDetails.resultDescriptions.rdFirstAnswers.firstAnswer',
                        'resultDetails.resultDescriptions.rdFirstAnswers.rdSecondAnswers',
                        'resultDetails.resultDescriptions.rdFirstAnswers.rdSecondAnswers.secondAnswer',
                        'resultDetails.resultDescriptions.rdFirstAnswers.rdSecondAnswers.rdThirdAnswers',
                        'resultDetails.resultDescriptions.rdFirstAnswers.rdSecondAnswers.rdThirdAnswers.thirdAnswer',
                        'resultDetails.question',
                    ])
                    ->first();

        return view('test.result-show', compact('data', 'competency'));
    }

    public function downloadResultPdf(Competency $competency, $id)
    {
        $data = Result::where([
                        'id' => $id,
                        'user_id' => auth()->user()->id,
                    ])
                    ->with([
                        'resultDetails',
                        'resultDetails.resultDescriptions',
                        'resultDetails.resultDescriptions.description',
                        'resultDetails.resultDescriptions.rdFirstAnswers',
                        'resultDetails.resultDescriptions.rdFirstAnswers.firstAnswer',
                        'resultDetails.resultDescriptions.rdFirstAnswers.rdSecondAnswers',
                        'resultDetails.resultDescriptions.rdFirstAnswers.rdSecondAnswers.secondAnswer',
                        'resultDetails.resultDescriptions.rdFirstAnswers.rdSecondAnswers.rdThirdAnswers',
                        'resultDetails.resultDescriptions.rdFirstAnswers.rdSecondAnswers.rdThirdAnswers.thirdAnswer',
                        'resultDetails.question',
                    ])
                    ->first();
                    
        $filename = 'Hasil ' . $competency->title . ' (' . $data->attempt . ') - ' . auth()->user()->username . '.pdf';
        $pdf = Pdf::loadView('test.result-download', compact('data', 'competency'));
        return $pdf->download($filename);
    }

    public function teacherDownloadResultPdf(Competency $competency, $userId, $id)
    {
        $user = User::find($userId);
        $data = Result::where([
                        'id' => $id,
                        'user_id' => $user->id,
                    ])
                    ->with([
                        'resultDetails',
                        'resultDetails.resultDescriptions',
                        'resultDetails.resultDescriptions.description',
                        'resultDetails.resultDescriptions.rdFirstAnswers',
                        'resultDetails.resultDescriptions.rdFirstAnswers.firstAnswer',
                        'resultDetails.resultDescriptions.rdFirstAnswers.rdSecondAnswers',
                        'resultDetails.resultDescriptions.rdFirstAnswers.rdSecondAnswers.secondAnswer',
                        'resultDetails.resultDescriptions.rdFirstAnswers.rdSecondAnswers.rdThirdAnswers',
                        'resultDetails.resultDescriptions.rdFirstAnswers.rdSecondAnswers.rdThirdAnswers.thirdAnswer',
                        'resultDetails.question',
                    ])
                    ->first();
                    
        $filename = 'Hasil ' . $competency->title . ' (' . $data->attempt . ') - ' . $user->username . '.pdf';
        $pdf = Pdf::loadView('test.result-download', compact('data', 'competency'));
        return $pdf->download($filename);
    }

    public function studentResult()
    {
        $result = Result::where('user_id', auth()->user()->id)
                    ->with('competency')
                    ->orderBy('created_at', 'desc')
                    ->get();

        return view('test.student-result', compact('result'));
    }

    public function teacherResult()
    {
        $result = Result::with([
                        'user',
                        'user.clas',
                        'competency',
                    ])
                    ->orderBy('created_at', 'desc')
                    ->get();

        return view('test.teacher-result', compact('result'));
    }

    public function showTeacherResult(Competency $competency, $id)
    {
        $data = Result::where([
                        'id' => $id,
                    ])
                    ->with([
                        'resultDetails',
                        'resultDetails.resultDetailAnswers',
                        'resultDetails.resultDetailAnswers.answer',
                        'resultDetails.question',
                    ])
                    ->withCount('resultDetails')
                    ->first();

        return view('test.result-show', compact('data'));
    }

    public function execute(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'script' => 'required|string',
            'stdin' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'data' => 'Nothing to execute',
            ]);
        }

        try {
            $script = $request->script;
            $stdin = $request->stdin;

            // Post request to jdoodle api endpoint
            $response = Http::post(env('JDOODLE_API_URL'), [
                'clientId' => env('JDOODLE_CLIENT_ID'),
                'clientSecret' => env('JDOODLE_CLIENT_SECRET'),
                'script' => $script,
                'stdin' => $stdin,
                'language' => 'cpp',
                'versionIndex' => '5'
            ]);
            $result = $response->json(); 

            if ($response->status() != 200) throw new ErrorException('Internal Error', 500);
            if (!$result['memory']) throw new ErrorException($result['output'], 422);

            return response()->json([
                'success' => true,
                'data' => $result,
            ]);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'data' => $e->getMessage(),
            ], $e->getCode());
        }
    }
}
